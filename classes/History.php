<?php
class History {
    public $daysDepth;

    public function __construct($baseCurrencyCode, $daysDepth) {
        $this->daysDepth = $daysDepth;
        $this->baseCurrencyCode = $baseCurrencyCode;
    }
    public function getHistoryArr($inCurrency) {
        $result = array();
        $baseCurrencyCode = $this->baseCurrencyCode;

        $today = date('Y-m-d');
        $days = $this->daysDepth = 5;
        $i = 1;
        while ($i <= $days) {
            $day = date('Y-m-d', strtotime("{$today} -$i day"));
            $api = "http://api.fixer.io/{$day}?base={$baseCurrencyCode}";
            $json_string = file_get_contents($api);
            $ar = json_decode($json_string, true);
            if ( $ar['rates'][$inCurrency] ) $result[$day] = $ar['rates'][$inCurrency];
            $i++;
        }
        return $result;
    }
}















