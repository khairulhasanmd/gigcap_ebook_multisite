<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Service\PlaceholderTransformer;
use App\Models\Concept;

class ExtractBladeTexts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'texts:extract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract texts from Blade files and store in an array';

    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $outputFilePath = resource_path('lang/en/translation.php');
        $bladeFiles = File::allFiles(resource_path('views/templates/qwerdybookscom'));
        // dd($bladeFiles);
        $bFiles = $bladeFiles; // 37 inedex for picing file
        
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $extractedTexts = [];
        $excluded = [
            'coming-soon.blade.php',
            'illustrated-layout.blade.php',
            'master.blade.php',
            'welcome.blade.php',
            'meta.blade.php',
            'layout.blade.php',
            'styles.blade.php',
            'scripts.blade.php',
            'app.blade.php',
        ];
        foreach ($bFiles as $file) {
            //dd($file);
            $contentsRead = $file->getContents();
            if((strlen($contentsRead) > 0) && !in_array($file->getFilename(), $excluded)){//if not empty or not excluded
                var_dump($file->getPathname()); 
                $placeholderTransformer = new PlaceholderTransformer();
                $html = $placeholderTransformer->transformPlaceholdersToXmlTags($contentsRead);
                var_dump($file->getPathname());
                // var_dump($file->getFilename());
    
                $html_entity = preg_replace_callback('/[\x{80}-\x{10FFFF}]/u', function ($m) {
                    $char = current($m);
                    $utf = iconv('UTF-8', 'UCS-4', $char);
                    return sprintf("&#x%s;", ltrim(strtoupper(bin2hex($utf)), "0"));
                }, $html[0]);

                // dd($$html_entity, LIBXML_HTML_NODEFDTD);
                $dom->loadHTML($html_entity, LIBXML_HTML_NODEFDTD);
                // var_dump($dom);die();
                $xpath = new \DOMXPath($dom);
                foreach ($xpath->query('//text()') as $text) {
                    if (trim($text->nodeValue) && !str_contains($text->data, '$')) {  
                        $text_data = (trim($text->data));
                        $extractedTexts[$text_data] = $text_data;
                        $langKey = 'trans_'.$this->theme.'.'.addslashes($text_data);
                        $text->nodeValue = "@lang('{$langKey}')";
                    }
                }
                
                // with this we are fetching the updated html
                $body = $dom->getElementsByTagName('body')->item(0);
                $data = '';
                if(isset($body->childNodes)){
                    $content = implode(
                        "",
                        array_map([$dom, 'saveHTML'], iterator_to_array($body->childNodes))
                    );
                    // get first occurance of </p>
                    // remove </p> if there is no occurance of <p> and </p> or if <p> > </p>
                    if(strpos($content, '<p>') == 0){
                        $content = ltrim($content, '<p>');
                        // $content = rtrim($content, '</p>');
                        $pos = strpos($content, '</p>');
                        if ($pos !== false) {
                            $content = substr_replace($content, '', $pos, strlen('</p>'));
                        }
                    }
                    $data = html_entity_decode($content);
                }
                // here are replacing $101 with  balde syntax again
                $_html = $placeholderTransformer->transformXmlTagsToPlaceholders($data, $html[1]);

                // with this we are updating balde file content
                file_put_contents($file->getRealPath(), rawurldecode($_html));
            }
        }

        // code to add array in route.php file
        $phpArrayCode = "<?php\n\nreturn " . var_export($extractedTexts, true) . ";\n";

        // Write to the output file
        File::put($outputFilePath, $phpArrayCode);

        $this->info('Plain text updated to @lang() format.');
        $this->info('Plain texts extracted and stored in ' . $outputFilePath);

    }
}

