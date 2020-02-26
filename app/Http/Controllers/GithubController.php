<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp as HTTP;

class GithubController extends Controller
{
    
     private function validateRequest() {
        return request()->validate([
                    'value' => 'required',
                    'type' => 'required',
        ]);
    }
    
    public function getApiData() {
        $search = $this->validateRequest()['value'];
        $type = $this->validateRequest()['type'];
         $client = new \GuzzleHttp\Client();
         $endPoint = "https://api.github.com/{$type}/{$search}";
        $response = $client->request('GET', $endPoint, ['query'=>[]]);
//        dd(json_decode($response->getBody()));
        return view('welcome', ['search'=>$search, 'type'=>$type, 'response'=>(array)json_decode($response->getBody())]);
    }
}
