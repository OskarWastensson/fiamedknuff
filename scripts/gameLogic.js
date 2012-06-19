var player, bricks;

$(document).ready(function() {
	
	bricks = [];

	// Puts every game-brick ordered in array bricks.
	$(".boardWrapper span.outer-bricks").each(function() {
		var span = $(this);
		var val = $(this).attr("value");
		
		bricks[val] = span;

	})

	// Defines class Game, here you can get previous and next brick.
	function Game(currentValue) {
		this.currentValue = currentValue;
		this.nextBrick = function() {
			var nextValue = currentValue
			if( currentValue == 39 ){
				nextValue = 0;
			}else{
				nextValue = parseInt(currentValue)+1;
			}
			return bricks[nextValue];
		};
		this.prevBrick = function() {
			var prevValue = currentValue;
			if( currentValue == 0 ){
				prevValue = 39;
			}else{
				prevValue = parseInt(currentValue)-1;
			}
			return bricks[prevValue];
		}
	}


	var currentBrick = $('.boardWrapper').find('.current');
		currentValue = currentBrick.attr('value');

	var game = new Game(currentBrick, currentValue);

})