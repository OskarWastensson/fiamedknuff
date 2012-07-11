
function Game () {
	var board;

	return {
		
		// The game loop 
		play: function () {
			
		},
		
		// 
		init: function () {
			board = new Board();
			board.init();
			
			
			player = new Player(0);
	
		},
		
		load: function () {
			
		},
		
		close: function () {
			
		}
	}
}

function Board () {
	return {
		bricks: [],
		
		// Populates the bricks property with brick objects
		init: function () {
			var val, bricks;
			$('.boardWrapper span.bricks').each(function() {
				val = 'brick' + $(this).attr("value");
				bricks[val] = new Brick($(this).attr("value"), $(this));
			})
			this.bricks = bricks;
		}
	}
}

