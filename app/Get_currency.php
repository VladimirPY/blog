<?php


namespace App;
use DateTime, DateTimezone;

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
    public function show_weather()
    {
        $date = new DateTimezone("Europe/Kiev");
        $location = $date->getLocation();
        $lat = $location[ "latitude" ];
        $long = $location[ "longitude" ];
        $request = "'https://api.gismeteo.net/v2/weather/current/?latitude=$lat&longitude=$long'";
        $data = @file_get_contents($request);
        return json_decode( $data );

    }
}