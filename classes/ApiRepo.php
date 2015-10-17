<?php

class ApiRepo
{
    public function getCurrency($base_currency){

        $currency_repo=(new CurrencyRepo())->getCurrency();

        $json= file_get_contents("http://api.fixer.io/latest?base={$base_currency}");
        $ar=json_decode($json,1);
        foreach($currency_repo as $currency_obj){
            $cur=$currency_obj->currency;
            if(array_key_exists($cur,$ar['rates'])) {
                //$arr[$cur]=$ar['rates'][$cur];
                $arr[$cur]=new Api($cur,$ar['rates'][$cur],$ar['date']);
            }
        }
        return $arr;
    }

    public function getCurrencyHistory($days,$cur,$base_currency){

        for($i=1;$i<=$days;$i++) {
            $date=date('Y-m-d',time()-3600*24*$i);
            $json = file_get_contents("http://api.fixer.io/{$date}?base={$base_currency}");
            $ar = json_decode($json, 1);
            if (array_key_exists($cur, $ar['rates'])) {
                $arr[$i][$cur] = new Api($cur, $ar['rates'][$cur], $ar['date']);
            }
        }
        return $arr;
    }

    public function getAllCurrency(){
        $json= file_get_contents("http://api.fixer.io/latest?base=USD");
        $ar=json_decode($json,1);
        $arr=array_keys($ar['rates']);
        array_push($arr,$ar['base']);
        return $arr;
    }

}