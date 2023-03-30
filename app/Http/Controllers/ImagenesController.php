<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ImagenesController extends Controller
{
    public function buscarImagenes(Request $request)
    {
        $query = $request->input('q'); // obtener la consulta de búsqueda del usuario

        $client = new Client([
            'base_uri' => 'https://www.googleapis.com',
        ]);

        $response = $client->request('GET', '/customsearch/v1', [
            'query' => [
                'key' => 'AIzaSyD5gPMEATIpQyaFjKp9QPmEZ03rsVoR_kw',
                'cx' => '906687006f3b94d34',
                'q' => $query,
                'searchType' => 'image',
            ],
        ]);

        $results = json_decode($response->getBody(), true);

        return response()->json($results);
    }
}
