namespace ManagersClub

trait ManagersGame
{
	//...
}

# EnrtyPoint 
class ManagerGame
{
	use ManagersGame;

	function runGame() {
		echo 'Start!'
	}		
}

$game = new ManagerGame();
$game->runGame();

