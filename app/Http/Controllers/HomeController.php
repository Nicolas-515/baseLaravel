<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use Illuminate\Auth\Events\Validated;

use App\Models\Characters;

use function PHPUnit\Framework\isNull;

define('ramApiEndpoint', 'https://rickandmortyapi.com/api/character');

class HomeController extends Controller
{
    public function fetchHomeData(Request $request){

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

        return view('home.index_home', ['characters' => $characters, 'indicators' => $indicators, 'incoming' => null]);
    } //End Method

    public function fetchCharatacterData(Request $request){

        $character_id = $request->all();
        $fullUrl = sprintf('%s/%s', constant('ramApiEndpoint'), $character_id['data-id']);
        $rapsody = Http::get($fullUrl);

        return view('home.index_character', ['idPersonagem' => $rapsody]);
    } //End Method

    public function saveCharacterToUser(Request $request){

        if($request->isMethod('POST')){
            if($request['status'] === 'Save'){
                $data = $request->validate([
                    'name' => 'required',
                    'species' => 'required',
                    'image' => 'required|url',
                    'url' => 'required|url'
                ]);

                $data['user_id'] = auth()->id();
    
                $newCharacter = Characters::create($data);
    
                return redirect(route('home'));
            }elseif($request['status'] === 'Delete'){
                dd($request);
            }else{
                return redirect(route('home'));
            }
            
        }
    }

    public function showUserCharacters(Request $request){

        $query = Characters::where('user_id', auth()->id())->get();

        return  view('home.index_userCharacters', [ 'personagens' =>  $query]);
    }

    public function editCharacterFromUser(Characters $character){

        return  view('home.index_userCharacterEdit', [ 'personagem' =>  $character]);
    }

    public function deleteCharacterFromUser(Request $request, Characters $character){

        //dd($character);

        if($request->isMethod('POST')){
            if($request['status'] === 'Delete'){
                if($character['user_id'] == auth()->id()){

                    $character->delete();
                    return redirect(route('home.showUserCharacters'));
                }
    
                return redirect(route('home'));
            }elseif($request['status'] === 'Delete'){
                dd($request);
            }else{
                return redirect(route('home'));
            }
            
        }
    }
}
