<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Memory Game - HTML5, JS and SCSS</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Coda'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css'>

<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v=1000') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.min.css?v=1000') }}">
<script src="{{ asset('vitecss/js/app.min.js?v=1000') }}"></script>
<style>
    html,
body {
  width: 100%;
  height: 100%;
}
*{
    box-sizing: border-box;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background: #FF9090;
  overflow: hidden;
  font-family: "Coda", 'Vite Sans Display';
  background: blueviolet;
  color:white;
}

.deck {
  width: min(345px,100%);
  margin: 0 auto;
  background: #FFFA62;
  padding: 16px;
  border-radius: 10px;
  box-shadow: 14px 14px 0 0 #000000;
  display:grid;
  grid-template-columns: repeat(auto-fit,minmax(75px,1fr));
  gap:2px;
}
.deck .card {
  height: 75px;
  width: 75px;
  background: #FFCF7F;
  display: inline-block;
  margin: 0 15px 15px 0;
  line-height: 140px;
  font-size: 0;
  color: #ffffff;
  text-align: center;
  border-radius: 8px;
  vertical-align: top;
  cursor: pointer;
  transform: rotateY(180deg);
  transform-style: preserve-3d;
  transition: transform 0.3s ease;
  font-family: FontAwesome;
  line-height: 75px;
}
.deck .card:nth-child(4n) {
  margin: 0 0 15px 0;
}
.deck .card:nth-child(n+13) {
  margin: 0 15px 0 0;
}
.deck .card:nth-child(n+13):nth-child(4n) {
  margin: 0;
}
.deck .card.open {
  transform: rotateY(0);
  background: #89C4FF;
  cursor: default;
}
.deck .card.show {
  font-size: 33px;
}
.deck .card.match {
  transform: rotateY(0);
  cursor: default;
  background: #9BCB3C;
  font-size: 33px;
}
.deck .card.notmatch {
  background: #EE0E51;
}

#score-panel {
  text-align: left;
  width: 345px;
  margin-bottom: 10px;
}
#score-panel .stars {
  margin: 0;
  padding: 0;
  display: inline-block;
  margin: 0 5px 0 0;
}
#score-panel .stars li {
  list-style: none;
  display: inline-block;
}
#score-panel .restart {
  float: right;
  cursor: pointer;
}

*::-moz-selection {
  background: transparent;
}

*::selection {
  background: transparent;
}

.swal2-overlay {
  background-color: white;
}

</style>
  </head>
     
  <body x-data="{ 
    GameRules : false,
    StartGame : true,
    GamingBalance : {{ Auth::guard('users')->user()->gaming_balance }},
    ErrorMessage : false,
    SessionID : false
   }">
   {{-- balance --}}
 
  <div style="box-shadow:5px 5px 0px rgb(200, 230, 92);" class="p-5px pos-fixed top-20px right-20px no-select no-pointer no-select p-x-10px bg-white br-5px box-shadow p-x-20px c-blueviolet font-weight-900">Gaming Balance: &#8358;<span x-text="FormatNumber(GamingBalance)"></span></div>

    {{-- loader --}}
    <section x-data="{ 

     }" x-on:load.window="$el.remove()" class="pos-fixed loader z-index-3000 g-10px column align-center justify-center p-20px inset-0 bg-blueviolet">
      <div style="border-top-color: white;" class="spinner"></div>
      <span>Initializing game, please wait...</span>
    </section>
    {{-- start game --}}
    <section x-show="StartGame" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all inset-0 bg-black-transparent z-index-1000 p-20px column align-center justify-center">
       <div x-on:click="window.location.href='{{ url('users/games') }}'" style="box-shadow:5px 5px 0px rgb(200, 230, 92);" class="p-5px pos-fixed top-20px left-20px no-select no-select p-x-10px bg-white br-5px box-shadow p-x-20px c-blueviolet font-weight-900">
 Back

  </div>
      <div x-on:click.stop="" class="column w-full c-black max-w-500px bg-white br-10px p-20px">
        <strong class="font-weight-900 m-x-auto font-size-1-3">Game Rules</strong>
        <div style="font-family:'Vite Sans Display', 'Vite Sans Display';" class="w-full column g-10px">
        <span>&bull; Entry cost: &#8358;2,500 per game session.</span>
        <span>&bull; Reward: &#8358;7,000 upon winning a session.</span>
        <span>&bull; Objective: Match all pairs of identical cards by flipping two at a time.</span>
        <span>&bull; Restriction: Only two cards may be face-up at once; you cannot flip a third.</span>
        <span>&bull; Scoring: You are to flip all cards with a maximum of 18 moves for a win.</span>
        <span>&bull; Timer / Levels: Rounds may be timed or increase board size for higher rewards.</span>
        <span>&bull; End Condition: Win by matching all pairs; final score combines moves, stars, and bonuses.</span>
        <span>&bull; Strategy Tip: Scan systematically and remember card positions to minimize moves.</span>
        <div x-show="ErrorMessage" class="bg-red-transparent br-10px p-15px border-style-solid border-color-red border-width-1px c-red">
          <span x-html="ErrorMessage"></span>
          <a href="{{ url('vendors') }}" class="u no-select c-blueviolet">Click to purchase</a>
        </div>
        </div>
        
        <button x-on:click="
        SendPostRequest('{{ url('users/post/debit/game/process') }}',{
          '_token' : '{{ @csrf_token() }}'
        },function(response){
          let data=JSON.parse(response);
          if(data.status == 'error'){
            ErrorMessage = data.message;
          }else{
            GamingBalance = data.balance;
            SessionID = data.session_id;
            StartGame = false;
          }
        })
        " class="p-10px m-top-10px w-full pointer br-10px border-none bg-blueviolet c-white no-select">Start Game</button>
      </div>
    </section>
     {{-- rules --}}
    <section x-on:click="GameRules = false;" x-show="GameRules" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all inset-0 bg-black-transparent z-index-1000 p-20px column align-center justify-center">
      <div x-on:click.stop="" class="column w-full c-black max-w-500px bg-white br-10px p-20px">
        <strong class="font-weight-900 m-x-auto font-size-1-3">Game Rules</strong>
        <div style="font-family:'Vite Sans Display', 'Vite Sans Display';" class="w-full column g-10px">
        <span>&bull; Objective: Match all pairs of identical cards by flipping two at a time.</span>
        <span>&bull; Setup: Cards are shuffled and placed face-down; every image appears twice.</span>
        <span>&bull; Turn: Reveal one card, then a second; matching pairs remain revealed.</span>
        <span>&bull; Scoring: Points awarded per match; fewer moves yield a higher star rating.</span>
        <span>&bull; Timer / Levels: Rounds may be timed or increase board size for higher rewards.</span>
        <span>&bull; End Condition: Win by matching all pairs; final score combines moves, stars, and bonuses.</span>
        <span>&bull; Scoring: You are to flip all cards with a maximum of 18 moves for a win.</span>
        <span>&bull; Strategy Tip: Scan systematically and remember card positions to minimize moves.</span>
        <span>&bull; Entry cost: &#8358;2,500 per game session.</span>
        <span>&bull; Reward: &#8358;7,000 upon winning a session.</span>

        </div>
        <button x-on:click="GameRules=false;" class="p-10px m-top-10px w-full pointer br-10px border-none bg-blueviolet c-white no-select">Understood</button>
      </div>
    </section>
  <div id="score-panel" class="row g-5px align-center space-between">
	<ul class="stars">
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
	</ul>
	<span class="m-right-auto row align-center g-2px">
    <span class="moves">0</span> Moves
  </span>
	{{-- <div class="restart">
		<i class="fa fa-repeat"></i>
	</div> --}}
  <div x-on:click="GameRules = true;" style="box-shadow:5px 5px 0px black;" class="p-5px no-select pointer  p-x-10px bg-white br-5px box-shadow p-x-20px c-blueviolet">Game Rules</div>
</div>
<ul class="deck"></ul>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/sweetalert2/3.0.3/sweetalert2.min.js'></script>
<script>

const audio=new Audio('{{ asset('sounds/success.mp3') }}');
    var symbols = ['bicycle', 'bicycle', 'leaf', 'leaf', 'cube', 'cube', 'anchor', 'anchor', 'paper-plane-o', 'paper-plane-o', 'bolt', 'bolt', 'bomb', 'bomb', 'diamond', 'diamond'],
		opened = [],
		match = 0,
		moves = 0,
		$deck = $('.deck'),
		$scorePanel = $('#score-panel'),
		$moveNum = $scorePanel.find('.moves'),
		$ratingStars = $scorePanel.find('i'),
		$restart = $scorePanel.find('.restart'),
		delay = 800,
		gameCardsQTY = symbols.length / 2,
		rank3stars = gameCardsQTY + 2,
		rank2stars = gameCardsQTY + 6,
		rank1stars = gameCardsQTY + 10;

// Shuffle function From http://stackoverflow.com/a/2450976
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;
	
  while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

// Initial Game
function initGame() {
	var cards = shuffle(symbols);
  $deck.empty();
  match = 0;
  moves = 0;
  $moveNum.html(moves);
  $ratingStars.removeClass('fa-star-o').addClass('fa-star');
	for (var i = 0; i < cards.length; i++) {
		$deck.append($('<li class="card"><i class="fa fa-' + cards[i] + '"></i></li>'))
	}
};

// Set Rating and final Score
function setRating(moves) {
	var rating = 3;
	if (moves > rank3stars && moves < rank2stars) {
		$ratingStars.eq(2).removeClass('fa-star').addClass('fa-star-o');
		rating = 2;
	} else if (moves > rank2stars && moves < rank1stars) {
		$ratingStars.eq(1).removeClass('fa-star').addClass('fa-star-o');
		rating = 1;
	} else if (moves > rank1stars) {
		$ratingStars.eq(0).removeClass('fa-star').addClass('fa-star-o');
		rating = 0;
	}	
	return { score: rating };
};

// End Game - Win
function endGameWin(moves, score) {
  SendPostRequest('{{ url('users/post/credit/game/process') }}',{
    '_token' : '{{ @csrf_token() }}',
    'session_id' : Alpine.$data(document.querySelector('body')).SessionID
  },function(response){
    let data=JSON.parse(response);
    if(data.status == 'success'){
      Alpine.$data(document.querySelector('body')).GamingBalance= data.balance;

       swal({
 		allowEscapeKey: false,
 		allowOutsideClick: false,
 		title: 'Congratulations! You Won!',
 		text: 'With ' + moves + ' Moves and ' + score + ' Stars.\nYou have earned the session reward.',
 		type: 'success',
 		confirmButtonColor: '#9BCB3C',
 		confirmButtonText: 'Play again!'
 	}).then(function(isConfirm) {
 		if (isConfirm) {
      Alpine.$data(document.querySelector('body')).StartGame= true;
 			initGame();
 		}
 	})
    }
  })
 
}

// End Game - Lose (matched all but exceeded allowed moves)
function endGameLose(moves, score) {
  swal({
 		allowEscapeKey: false,
 		allowOutsideClick: false,
 		title: 'Good effort!',
 		text: 'You matched all pairs but used ' + moves + ' moves (more than the 18-move limit). You did not secure the guaranteed win. Try again to claim the reward.',
 		type: 'warning',
 		confirmButtonColor: '#9BCB3C',
 		confirmButtonText: 'Play again!'
 	}).then(function(isConfirm) {
 		if (isConfirm) {
      Alpine.$data(document.querySelector('body')).StartGame= true;
 			initGame();
 		}
 	})
}

// Restart Game
$restart.on('click', function() {
  swal({
    allowEscapeKey: false,
    allowOutsideClick: false,
    title: 'Are you sure?',
    text: "Your progress will be Lost!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#9BCB3C',
    cancelButtonColor: '#EE0E51',
    confirmButtonText: 'Yes, Restart Game!'
  }).then(function(isConfirm) {
    if (isConfirm) {
      initGame();
    }
  })
});

// Card flip
$deck.on('click', '.card:not(".match, .open")', function() {
	if($('.show').length > 1) { return true; }
	var $this = $(this),
			card = $this.context.innerHTML;
  $this.addClass('open show');
	opened.push(card);

	// Compare with opened card
  if (opened.length > 1) {
    if (card === opened[0]) {
      $deck.find('.open').addClass('match animated infinite rubberBand');
	audio.play();
      setTimeout(function() {
        $deck.find('.match').removeClass('open show animated infinite rubberBand');
      }, delay);
      match++;
    } else {
      $deck.find('.open').addClass('notmatch animated infinite wobble');
			setTimeout(function() {
				$deck.find('.open').removeClass('animated infinite wobble');
			}, delay / 1.5);
      setTimeout(function() {
        $deck.find('.open').removeClass('open show notmatch animated infinite wobble');
      }, delay);
    }
    opened = [];
		moves++;
		setRating(moves);
		$moveNum.html(moves);
  }
	
  // End Game if match all cards
  if (gameCardsQTY === match) {
    setRating(moves);
    var score = setRating(moves).score;
    setTimeout(function() {
      if (moves <= 18) {
        endGameWin(moves, score);
      } else {
        endGameLose(moves, score);
      }
    }, 500);
  }
});

initGame();

</script>
  </body>
  
</html>
