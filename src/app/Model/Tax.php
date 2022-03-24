<?php

namespace App\Model;

use Interfaces\IntTax;
use Model\Players;

class Tax implements IntTax 
{
    protected $index;
    protected $name;
    protected $taxAmount;

    public function __construct($index, $money, $taxAmount)
    {
    	$this->index = $index;
	$this->money = $money;
	$this->taxAmount = $taxAmount;
    }

    public function actOnPlayer(Players $player)
    {
	$this->player->decrementMoney($this->taxAmount);
	return $this->name . ': ' . $this->taxAmount; 
    }

}
