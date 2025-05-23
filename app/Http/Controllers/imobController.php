<?php

namespace App\Http\Controllers;

use App\Facades\ApiFacades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class imobController extends Controller
{
    
    public function __invoke(){

        try {
            $response = ApiFacades::get('services');
            if ($response->successful()) {
                $data = $response->json();
                $services = isset($data) && is_array($data) ? $data : [];
                $error = null;
            } else {
                 // Se a requisição falhar, define um erro
                $services = [];
                $error = "Erro ao obter detalhes imobiliarios por favor tente mais tarde";
            }

        } catch (\Exception $e) {
            $services = [];
            $error = "Erro de rede não foi possível conectar a api!";
        }
       
        return view('welcome',['data' => $services]);
    }
 
    public function login(Request $request){

        //Validação da requisição
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //Preparando o payload JSON para ser enviado
        $payload = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        //Chamando a API para fazero Login
        $response = ApiFacades::withHeaders([
           'Accept' => 'application/json',
           'Content-Type' => 'application/json', 
        ])
        ->withBody(json_encode($payload), 'application/json')
        ->post('login');

        if(! $response->successful()) {
            return back()
                ->withInput()
                ->withErrors([
                    'login' => "{$response->body()}"
                ]);
        }

        session(['authenticated' => true]);

        return redirect()->route('admin');
    }

    public function admin(){
        if (! session()->has('authenticated')) {
            return redirect()->route('login');
        }

         try {
            $response = ApiFacades::get('services');
            if ($response->successful()) {
                $data = $response->json();
                $services = isset($data) && is_array($data) ? $data : [];
                $error = null;
            } else {
                 // Se a requisição falhar, define um erro
                $services = [];
                $error = "Erro ao obter detalhes imobiliarios por favor tente mais tarde";
            }

        } catch (\Exception $e) {
            $services = [];
            $error = "Erro de rede não foi possível conectar a api!";
        }

        return response()
        ->view('admin', ['data' => $services])
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }
     
    public function createService(Request $request)
    {

        $request->validate([
            'nome'       => 'required|string',
            'tipo'       => 'required|string',
            'quartos'    => 'required_if:tipo,aluguel,compra|numeric|nullable',
            'banheiros'  => 'required_if:tipo,aluguel,compra|numeric|nullable',
            'zona'       => 'required_if:tipo,terreno|string|nullable',
            'area'       => 'required|numeric',
            'descricao'  => 'required|string',
            'valor'      => 'required|numeric',
            'foto'       => 'required|file|image|max:5120', // 5MB máx
        ]);

        $foto = $request->file('foto');

        $multipart = [
            ['name' => 'nome', 'contents' => $request->input('nome')],
            ['name' => 'tipo', 'contents' => $request->input('tipo')],
            ['name' => 'quartos', 'contents' => $request->input('quartos')],
            ['name' => 'banheiros', 'contents' => $request->input('banheiros')],
            ['name' => 'zona', 'contents' => $request->input('zona')],
            ['name' => 'area', 'contents' => $request->input('area')],
            ['name' => 'descricao', 'contents' => $request->input('descricao')],
            ['name' => 'valor', 'contents' => $request->input('valor')],
            [
                'name'     => 'foto',
                'contents' => fopen($foto->getPathname(), 'r'),
                'filename' => $foto->getClientOriginalName(),
                'headers'  => [
                    'Content-Type' => $foto->getClientMimeType(),
                ],
            ],
        ];

      

        // Pega o client HTTP configurado
        $client = ApiFacades::getClient();

        // Faz a requisição usando o client (base_uri já está configurada)
        $response = ApiFacades::asMultipart()
        ->post('/services', $multipart);
        
        if (! $response->successful()) {
            return back()
                ->withInput()
                ->withErrors([
                    'cadastro' => "Erro ao cadastrar serviço: {$response->body()}"
                ]);
        }

        return back()->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function destroy($id)
    {
         $response = ApiFacades::delete(`services/${$id}`);

        if (!$response) {
            return redirect()->back()->with('error', 'Serviço não encontrado.');
        }

        $response->delete();

        return redirect()->back()->with('success', 'Serviço eliminado com sucesso.');
    }

     public function logout(Request $request)
    {
        // Limpa completamente a sessão
        $request->session()->flush();

        // Invalida a sessão
        $request->session()->invalidate();

        // Regenera o token CSRF
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    
}
