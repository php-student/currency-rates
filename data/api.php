<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.10.2015
 * Time: 20:21
 */
function currencyExchange($CurrentValue, $curr){
	if($curr !=$CurrentValue){
		$api = 'http://api.fixer.io/latest?base=';
		$json = file_get_contents($api . $CurrentValue);
		$data = json_decode($json, 1);
		return round($data['rates'][$curr], 2);
	}
	else return 1;
}
function currencyExchange5 ($CurrentValue, $curr, $date){
    if($curr !=$CurrentValue){
        $api = 'http://api.fixer.io/latest?';
        $json = file_get_contents($api .'base='. $CurrentValue . '&date=' . $date);
        $data = json_decode($json, 1);
        return round($data['rates'][$curr], 2);
    }
    else return 1;
}
