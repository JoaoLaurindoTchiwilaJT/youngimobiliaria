<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ApiFacades extends Facade
{
   
    protected static function getFacadeAccessor()
    {
        return 'api-imobiliaria';
    }

     public static function __callStatic($method, $args)
    {
        /** @var \App\Services\ApiImobiliariaService $instance */
        $instance = static::resolveFacadeInstance(static::getFacadeAccessor());

        // Se for getClient ou getBaseUrl, devolve diretamente
        if (in_array($method, ['getClient', 'getBaseUrl'], true)) {
            return $instance->$method(...$args);
        }

        // Encaminha para o client HTTP retornado por getClient()
        $client = $instance->getClient();
        return $client->$method(...$args);
    }

   
}
