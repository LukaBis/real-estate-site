<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make repository and repository interface';

    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    public function getRepositoryStubPath ()
    {
        return __DIR__ . '/../../../stubs/repository.stub';
    }

    public function getRepositoryInterfaceStubPath ()
    {
        return __DIR__ . '/../../../stubs/repository_interface.stub';
    }

    public function getStubVariables()
    {
        return [
            'MODEL' => $this->getSingularClassName($this->argument('modelName')),
        ];
    }


    // Replace the stub variables(key) with the desire value
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;
    }

    public function getSourceRepositoryFile()
    {
        return $this->getStubContents($this->getRepositoryStubPath(), $this->getStubVariables());
    }

    public function getSourceRepositoryInterfaceFile()
    {
        return $this->getStubContents($this->getRepositoryInterfaceStubPath(), $this->getStubVariables());
    }

    public function getRepositoryFilePath()
    {
        return base_path('app/Repositories/Eloquent') .'/' .$this->getSingularClassName($this->argument('modelName')) . 'Repository.php';
    }

    public function getRepositoryInterfaceFilePath()
    {
        return base_path('app/Repositories') .'/' .$this->getSingularClassName($this->argument('modelName')) . 'RepositoryInterface.php';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // storing repository
        $path = $this->getRepositoryFilePath();

        $contents = $this->getSourceRepositoryFile();

        if (!$this->files->exists($path)) {
           $this->files->put($path, $contents);
           $this->info("File : {$path} created");
        } else {
           $this->info("File : {$path} already exits");
        }

        // storing repository interface
        $path = $this->getRepositoryInterfaceFilePath();

        $contents = $this->getSourceRepositoryInterfaceFile();

        if (!$this->files->exists($path)) {
           $this->files->put($path, $contents);
           $this->info("File : {$path} created");
        } else {
           $this->info("File : {$path} already exits");
        }
    }
}
