<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use App\Services\ApiImobiliariaService;

class ApiServiceProvider extends ServiceProvider
{
    
    public function register()
{
    $this->app->singleton('api-imobiliaria', function () {
        return new \App\Services\ApiImobiliariaService();
    });
}


   
}
