class Card
{
  public function __construct($rank, $suit)
  {
    $this->rank = $rank;
    $this->suit = $suit;
  }
}

class Deck
{
  public $cards;
  
  public function __construct()
  {
    $this->cards = [];
    $suits = array('Clubs', 'Diamonds', 'Hearts', 'Spades');
    $ranks = array('Ace', 'King', 'Queen', 'Jack', '2', '3', '4', '5', '6', '7', '8', '9', '10');
    foreach ($suits as $suit) {
      foreach ($ranks as $rank) {
        $card = new Card($rank, $suit);
        $this->cards[] = $card;
      }
    }
  }
  
  public function shuffleCards()
  {
    $shuffled = [];
    while (count($this->cards) > 0):
      $index = array_rand($this->cards);
      $card = array_splice($this->cards, $index, 1)[0];
      $shuffled[] = $card;
    endwhile;
    $this->cards = $shuffled;
  }
  
  public function printCards()
  {
    foreach ($this->cards as $card) {
      echo $card->rank . ' of ' . $card->suit . "\n";
    }
  }
}

class Player 
{
  
  public $hand;
  
  public function __construct()
  {
    $this->hand = [];
  }
  
  public function showHand()
  {
    if (count($this->hand) > 0) {
      foreach ($this->hand as $card) {
        echo $card->rank . ' of ' . $card->suit . "\n";
      }
      echo "___________________ \n\n";
    } else {
    echo "no cards here bro\n";   
    }
  }
}

function dealCards($cards, $players) {
  foreach ($players as $player) {
    while (count($player->hand) !== 5):
      $card = array_splice($cards, 0, 1)[0];
      $player->hand[] = $card;
    endwhile;
  }
}

function createPlayers($array, $n) {
  while (count($array) !== $n):
    $p = new Player();
    array_push($array, $p);
  endwhile;
  return $array;
}

function playGame(){
  $deck = new Deck();
  $deck->shuffleCards();
  $players = [];
  $players = createPlayers($players, 4);
  $communityCards = [];

  dealCards($deck->cards, $players);
  
  foreach ($players as $p) {
    $p->showHand();
  }
  
}

playGame();


