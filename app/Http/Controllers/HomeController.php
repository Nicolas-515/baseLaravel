<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Personagem;
use Illuminate\Auth\Events\Validated;

use function PHPUnit\Framework\isNull;

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
        return view('home.index_home', ['characters' => $characters, 'indicators' => $indicators, 'incoming' => null]);
    }

    public function fetchCharatacterData(Request $request){

        $character_id = $request->all();

        $fullUrl = sprintf('%s/%s', constant('ramApiEndpoint'), $character_id['data-id']);
        $rapsody = Http::get($fullUrl);


        return view('home.index_character', ['idPersonagem' => $rapsody]);
    }

    public function saveCharacterToUser(Request $request){

        $incomingFields = [
            'name' => "null",
            'species' => "null",
            'image' => "null",
            'url' => "null",
            'user_id' => "null"
        ];

        if($request->isMethod('POST')){

            if(isNull($request['chara_data'])){
                $incomingFields['name'] = strip_tags($request['chara_data']['name']);
                $incomingFields['species'] = strip_tags($request['chara_data']['species']);
                $incomingFields['image'] = strip_tags($request['chara_data']['image']);
                $incomingFields['url'] = strip_tags($request['chara_data']['url']);

                $incomingFields['user_id'] = auth()->id();

                Personagem::create($incomingFields);
            }
            
        }

        //Personagem::create($incomingFields);

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

        return view('home.index_home', ['characters' => $characters, 'indicators' => $indicators, 'incoming' => $incomingFields]);
    }

    public function deleteCharacterFromUser(Request $request){

        $incomingFields = $request['data-id'];

        if(! $request->isMethod('POST')){
            
        }

        
        //Personagem::create($incomingFields);

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

        return view('home.index_home', ['characters' => $characters, 'indicators' => $indicators, 'incoming' => $incomingFields]);
    }
}
