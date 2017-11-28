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
    $deck = $this->cards;
    while (count($deck) > 0):
      $index = array_rand($deck);
      $card = array_splice($deck, $index, 1)[0]; // => Card > {rank: x, suit: y}
      array_push($shuffled, $card);
    endwhile;
    $deck = $shuffled;
    return $deck;
  }
}

$d = new Deck();
$d->shuffleCards();
