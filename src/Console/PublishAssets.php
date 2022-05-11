<?php

namespace Andresdevr\LaravelComponents\Console;

use Andresdevr\LaravelComponents\ServiceProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PublishAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "laravel-components:publish";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Publish the assets required for the components";

    /**
     * Execute the console command.
     *
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle()
    {
        $this->runCommand("vendor:publish", [
            '--provider' => ServiceProvider::class,
            '--tag' => 'laravel-components-assets'
        ], $this->output);
    }
}