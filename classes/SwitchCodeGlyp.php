<?php
class SwitchCodeGlyp {
	public $glyphiconBase;
	public $glyphicon;
	public $base;
	public $in;

	public $baseCurrencyCode;
	public $currencyCode;

	public function __construct($baseCurrencyCode, $currencyCode) {
		$this->baseCurrencyCode = $baseCurrencyCode;
		$this->currencyCode = $currencyCode;

	    if ($this->baseCurrencyCode == 'RUB' || 
            $this->baseCurrencyCode == 'USD' || 
            $this->baseCurrencyCode == 'EUR' || 
            $this->baseCurrencyCode == 'GBP'
            )
        {
          $this->glyphiconBase = $baseCurrencyCode;
          $this->base = '';
        }
        else {
          $this->glyphiconBase = '';
          $this->base = $baseCurrencyCode;
        }
        if ($this->currencyCode == 'RUB' || 
            $this->currencyCode == 'USD' || 
            $this->currencyCode == 'EUR' || 
            $this->currencyCode == 'GBP'
            )
        {
          $this->glyphicon = $currencyCode;
          $this->in = '';
        }
        else {
          $this->glyphicon = '';
          $this->in = $currencyCode;
        }
	}
}