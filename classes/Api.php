<?php

class Api
{
    public $currency;
    public $value;
    public $date;

    function __construct($currency,$value,$date){
        $this->currency=$currency;
        $this->value=$value;
        $this->date=$date;
    }
}