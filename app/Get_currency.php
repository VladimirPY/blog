<?php


namespace App;
use DateTime, DateTimezone;
use \Nwidart\ForecastPhp\Forecast;

class Get_currency
{
    public function show_currency()
    {
        $currency = json_decode( file_get_contents( 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5' ), true );
        foreach ($currency as $curr) {
            if ($curr['ccy'] == 'BTC'){
                continue;
            }
            echo '<p>' . $curr['ccy'] . '-' . round( $curr['buy'], 2 ) . ' ₴</p>';
        }
    }
    public function get_weather()
    {
        $date = new DateTimezone("Europe/Kiev");
        $location = $date->getLocation();
        $lat = $location[ "latitude" ];
        $long = $location[ "longitude" ];

        // $ip = $_SERVER['REMOTE_ADDR'];
        // $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        // echo $details; // -> "Mountain View"

        $fc = new Forecast("e90cd36771311d3af40956e8e93751d5");
        $info =  $fc -> get("46.5" ,"30.7") ;

        return $info ;
    }
}