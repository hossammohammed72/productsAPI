<?php

namespace App\Providers;

use App\DataSources\JsonFilesDataSource;
use App\Interfaces\DataSourceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // could be changed later when adding multiple data sources
        $interfacePath  = DataSourceInterface::class;
        $concretePath  = JsonFilesDataSource::class;
        $this->app->bind($interfacePath, $concretePath);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
