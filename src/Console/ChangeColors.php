<?php

namespace Andresdevr\LaravelComponents\Console;

use Andresdevr\LaravelComponents\ServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ChangeColors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "laravel-components:colors";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Apply the changes in colors made in your config file laravel-components.php";

    /**
     * Execute the console command.
     *
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        if(! $this->checkConfigFile())
            return 0;

        $this->changeColors();
    }

    /**
     * Check the existence of the config file
     * 
     * @return bool
     */
    protected function checkConfigFile()
    {
        if(! File::exists(config_path('laravel-components.php')))
        {
            if($this->confirm("The config file laravel-components.php is no published, do you want to publish it?", true))
            {
                $this->runCommand("vendor:publish", [
                    '--provider' => ServiceProvider::class,
                    '--tag' => 'laravel-components-config'
                ], $this->output);

                return false;
            }
            return $this->confirm("There is no changes in the config/laravel-components.php file, do you want to continue anyway?", false);
        }
    }

    /**
     * Change the colors
     * 
     * @return void
     */
    protected function changeColors()
    {
        
    }
}