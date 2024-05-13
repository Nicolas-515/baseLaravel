<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Personagem;

define('ramApiEndpoint', 'https://rickandmortyapi.com/api/character');

class HomeController extends Controller
{
    public function fetchHomeData(){

        $instanceQuery = '/?page=1';

        $fullUrl = sprintf('%s%s', constant('ramApiEndpoint'), $instanceQuery);
        $response = Http::get($fullUrl);

        //return $response;
        return view('home.index_home');
    }
}
