<?php

namespace MCDev\ServiceGenerator\Console\Commands;

use Illuminate\Console\Command;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {path} {--title=} {--resource=}';

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
     * @return int
     */
    public function handle()
    {
        $files = array_slice(scandir(__DIR__.'/stubs/views/crud'),2);
        $path = $this->argument('path');
        $title = $this->option('title');
        $resource = $this->option('resource');
        $dir = base_path("resources/views/app/$path");

        if(!file_exists($dir)){
            mkdir($dir);
        }

        foreach($files as $file){
            $f = file_get_contents(__DIR__.'/stubs/views/crud/'.$file);
            $result = str_replace(
                ['[[title]]', '[[resource]]' , '[[path]]'],
                [$title, $resource, $path],
                $f
            );
            file_put_contents("$dir/$file", $result);
        }
        return 0;
    }
}
