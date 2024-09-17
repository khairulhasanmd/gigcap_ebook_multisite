<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Artisan;


class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install {--seed=all} {--migrate=true} {--dummydata=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('migrate')) {
            $this->call('migrate:fresh');
            $this->info('Database migrated successfully.');
        }

        $this->mainAppSeed();
        $this->moduleSeed();

        $this->info('Database seeding completed successfully.');

        $this->warn('Copying seed files...');
        $this->copySeedFiles();
        $this->info('Copied seed files successfully.');

        $this->call('passport:install', ['--force' => true]);

        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('config:clear');
        $this->call('route:clear');
    }

    /*
    * Main App Seed
    *
    * @return void
    */
    protected function mainAppSeed()
    {
        $this->call('db:seed');
    }

    /*
    * Module Seed
    *
    * @return void
    */
    protected function moduleSeed()
    {
        $this->warn('Module Seeding: ');

        foreach ($this->modulesName() as $module) {

            $moduleSeederClass = 'Modules\\' . $module . '\\Database\\Seeders\\' . $module .'DatabaseWithoutDummyDataSeeder';

            if ($this->option('dummydata') == 'false' && class_exists($moduleSeederClass)) {
                Artisan::call('db:seed', ['--class' => $moduleSeederClass]);
            } else {
                Artisan::call('module:seed ' . $module);
            }

            $this->line('   ✔ ' . $module);
        }

        $this->info('Module seeding completed successfully.');
    }

    /*
    * Modules Name
    *
    * @return array
    */
    protected function modulesName()
    {
        if ($this->option('seed') != 'all') {
            return explode(',', $this->option('seed'));
        }

        $modules = [];

        foreach (Module::getOrdered() as $module) {
            array_push($modules, $module->getName());
        }

        return $modules;
    }

    /*
    * Copy Seed Files
    *
    * @return void
    */
    protected function copySeedFiles()
    {
        File::copyDirectory( public_path('seeder/') , public_path('uploads/'));
    }
}
