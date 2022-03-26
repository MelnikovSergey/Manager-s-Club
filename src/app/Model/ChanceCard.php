<?php

namespace App\Model;

use Factories\HasFactory;
use Interfaces\IntPlayer;
use GUI\Tiles;

class Player implements Tiles 
{
    use HasFactory;

    protected $index;
    protected $name;

    public function __construct($index, $name)
    {
    	$this->index = $index;
	$this->name = $name;
    }

    public function actOnPlayer(Player $player)
    {
    	return ChanceCardGenerator::GenerateRandomCard($player);
	
    }

}


