<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Personagem;

define('ramApiEndpoint', 'https://rickandmortyapi.com/api/character');

class HomeController extends Controller
{
    public function fetchHomeData(Request $request){

        $incomingData = $request;

        $randPage = rand(1,41);

        $instanceQuery = sprintf('%s%d','/?page=',$randPage);

        $fullUrl = sprintf('%s%s', constant('ramApiEndpoint'), $instanceQuery);
        $rapsody = Http::get($fullUrl);

        $randStartPoint = rand(1,11);

        $characters = [
            array_slice($rapsody["results"],$randStartPoint,$randStartPoint+3),
            array_slice($rapsody["results"],$randStartPoint+3,$randStartPoint+6),
            array_slice($rapsody["results"],$randStartPoint+6,$randStartPoint+9),
        ];

        $indicators = [
            "carouselExampleIndicators0",
            "carouselExampleIndicators1",
            "carouselExampleIndicators2",
            "carouselExampleIndicators3",
            "carouselExampleIndicators4"
        ];

        //return $response; 'DiseaseDiagnosed'=>json_decode($DiseaseDiagnosed])
        return view('home.index_home', ['characters' => $characters, 'indicators' => $indicators]);
    }

    public function fetchCharatacterData(Request $request){

        $character_id = $request->all();

        $fullUrl = sprintf('%s/%s', constant('ramApiEndpoint'), $character_id['data-id']);
        $rapsody = Http::get($fullUrl);


        return view('home.index_character', ['idPersonagem' => $rapsody]);
    }

    public function saveCharaterToUser(Request $request){

        $incomingFields = $request;

        $incomingFields = $incomingFields['nome'];

        //Personagem::create($incomingFields);

        return view('home.index_character', ['data' => $incomingFields]);
    }
}
