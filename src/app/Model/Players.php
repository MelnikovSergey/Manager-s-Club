<?php

namespace App\Model;

use Factories\HasFactory;
use Interfaces\IntPlayer;
use GUI\Tiles;

class Player implements IntPlayer 
{
    use HasFactory;

    protected $money;
    protected $currentPosition;
    protected $initialPlayerMoney = 200;
    protected $totalNumberOfTiles = 40;

    public function __construct($index, $money, $currentPosition)
    {
    	$this->index = $index;
	$this->money = $initialPlayerMoney;
	$this->currentPosition = $currentPosition;
    }

    public function setPosition($newPosition)
    {
    	$modifiedPosition = $newPosition;
	
	if($newPosition < 0) 
	{
		$this->modifiedPosition += $this->totalNumberOfTiles; 	
	}

	if($newPosition >= $this->totalNumberOfTiles) 
	{
		$this->modifiedPosition -= $this->totalNumberOfTiles;
		$this->incrementMoney(200); 	
	}

	$this->currentPosition = $this->modifiedPosition;
    }

    public function incrementMoney($amount)
    {
	$this->money += $amount;
    }

    public function decrementMoney($amount)
    {
	$this->money -= $amount;
    }
}
