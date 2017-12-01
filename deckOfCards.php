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
    $this->cards = array();
    $suits = array('Clubs', 'Diamonds', 'Hearts', 'Spades');
    $ranks = array('Ace', 'King', 'Queen', 'Jack', '2', '3', '4', '5', '6', '7', '8', '9', '10');
    foreach ($suits as $suit) {
      foreach ($ranks as $rank) {
        $card = new Card($rank, $suit);
        array_push($this->cards, $card);
      }
    }
  }
  
  public function shuffleCards()
  {
    $shuffled = array();
    while (count($this->cards) > 0):
      $index = array_rand($this->cards);
      $card = array_splice($this->cards, $index, 1)[0];
      array_push($shuffled, $card);
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
  
  protected $hand;
  
  public function __construct()
  {
    $this->hand = array();
  }
  
  public function showHand()
  {
    foreach ($this->hand as $card) {
      echo $card->rank . ' of ' . $card->suit;
    }
  }
}
