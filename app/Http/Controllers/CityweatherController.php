<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class CityweatherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCityweather(Request $request)
    {
        $error = $weather_detail = "";

        $cityname = $request->input('cityname');

        //get weather API Key.
        $weather_api_key = getenv('WEATHER_API');
      
        if(!empty($cityname)){

            //call a third party apc_inc(key) we can also use CURL for it. we need to install third party packege to handle curl request like Guzzlehttp
            try{
                $raw_weahter_data = @file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$cityname."&APPID=".$weather_api_key);

                if(isset($raw_weahter_data)){

                    //json decode api response data
                    $weather_data = json_decode($raw_weahter_data, true);

                    if($weather_data["cod"] == 200){
                        if(isset($weather_data["weather"][0]["main"])){
                            $weather_detail = $weather_data["weather"][0]["main"];    
                        }                    
                    }else{
                        $error = "Something went wrong. please try again later.";
                    }
                }  
            }catch(Exception $e){                  
            }
        }
        return view('city-weather', ["weather_detail" => $weather_detail, "error" => $error]);
    }
}
