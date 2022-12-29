<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BdController extends Controller
{

    public function index()
    {
        $response = Http::withHeaders([
            'api-token'=>'h-MP2MM1oGaEkInXCOihAWvwykcvRrwgRIf5kpQinXdxvdN6tE4_w6F37MrjjpDUTuw',
            'user-email'=>'befehip221@octovie.com'

        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

        $data =(array)json_decode($response->body());
        $auth_token = $data['auth_token'];
       $countryResponse = Http::withHeaders([
            'Authorization'=>'Bearer '. $auth_token,
        // ])->get('https://www.universal-tutorial.com/api/countries/');
        ])->get('https://www.universal-tutorial.com/api/states/bangladesh');


      $countries = (array)json_decode($countryResponse->body());

    //   dd($countries);
        // return view('universe.form');
        return view('bd.form',['token'=>$auth_token,'countries'=> $countries] );
        // return view('bd.form');

    }


    public function bdcities(Request $req){
        $citiesResponse = Http::withHeaders([
            'Authorization'=>'Bearer '. $req->token,
        ])->get('https://www.universal-tutorial.com/api/cities/'.$req->state);


      $cities = ($citiesResponse->body());
      return $cities;

    }


    public function store(Request $request)
    {
        return('ok');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
