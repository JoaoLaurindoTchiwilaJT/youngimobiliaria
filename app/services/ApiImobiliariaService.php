<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiImobiliariaService 
{
    protected $client;
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = env('API_URL', 'http://localhost:3000/imobiliaria/');
        $this->client = Http::withOptions([
            'verify' => false,
            'base_uri' => $this->baseUri,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . env('API_TOKEN', ''),
        ]);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getBaseUrl()
    {
        return $this->baseUri;
    }
}
