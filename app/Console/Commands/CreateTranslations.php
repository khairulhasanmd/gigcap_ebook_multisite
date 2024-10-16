<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Services\CmpApi;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\File;
use League\Flysystem\Filesystem;
use App\Models\Concept;




class CreateTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:translation';
    public $cmp;


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command translate english to various languages';


    protected $translate;

    public function __construct()
    {
        parent::__construct();
        $this->currentDomain = request()->getHttpHost();
        $this->concept = Concept::where('domain_name', explode(':', $this->currentDomain)[0])->first();
        if (!$this->concept) {
            $this->concept = Concept::whereIn('domain_name', ['localhost', '127.0.0.1'])->first();
        }
        $this->theme = $this->concept->service_name;
        $this->cmp = new CmpApi($this->concept);

        // dd($this->currentDomain );
        // dd($this->theme);
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->makeAllTranslations('trans_01_Fitlivia_v3.php');
        // $this->makeAllTranslations('trans_02_Marathon.php');
        // $this->makeAllTranslations('trans_03_HIITXpertise.php');
        // $this->makeAllTranslations('trans_04_Get_Your_New_Physique.php');
        // $this->makeAllTranslations('trans_05_FittiBooks.php');
        // $this->makeAllTranslations('trans_06_Entrenovate.php');
        // $this->makeAllTranslations('trans_07_Ironfueltv.php');
        // $this->makeAllTranslations('trans_08_watchingyoga.php');
        // $this->makeAllTranslations('trans_09_runrhythmtv.php');
        // $this->makeAllTranslations('trans_10_Watchseniorfit.php');
        $this->makeAllTranslations('trans_mentoringlibrarycom.php');
        // $this->makeAllTranslations('translation.php');
        // $this->makeAllTranslations('validation.php');
    }

    public function makeAllTranslations($fname) {
        foreach (config('laravellocalization.supportedLocales') as $key => $value) {
            if($key != 'en'){
                // $translate = $this->argument('filename');
                $translate = $key;
                $arrayFilePath = resource_path('lang/en/'.$fname);
                // dd($arrayFilePath);
                $arrayData = include $arrayFilePath;

                $jsonData = [
                    "source" => "en",
                    "target" => $translate,
                    "sentences" => []
                ];

                $i = 0;
                foreach ($arrayData as $key => $value) {
                    $jsonData['sentences'][$i] = [
                        "sentence" => $value,
                        "translationKey" => $key,
                        "tag" => $i
                    ];
                    $i++;
                }
                // dd($jsonData);
                $translations = $this->cmp->getTranslations($jsonData);
                // dd($translations);
                $filePath = resource_path('lang/'.$translate);

                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0777, true);
                }
                // dd($translations);

                foreach ($translations->data as $data) {
                    $content[$data->translation->source_content] = $data->translation->translated_content;
                }
                $phpArrayCode = "<?php\n\nreturn " . var_export($content, true) . ";\n";
                File::put($filePath.'/'.$fname, $phpArrayCode);

                $this->info($fname. ' # translated to => ' . $translate);
                // return "Texts added sucessfully";
            }
        }
    }


}
