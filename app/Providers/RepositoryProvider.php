<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use App\Repository\Interfaces\StudentRepositoryInterface; 
use App\Repository\Classes\StudentRepositoryClass; 
class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(StudentRepositoryInterface::class,StudentRepositoryClass::class);

        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
