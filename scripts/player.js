var Player = function (no) {
	var colorName;

	// Constructor actions
	switch(no) {
	case 0: 
		colorName = 'green';
		break;
	case 1:
		colorName = 'yellow';
		break;
	case 2: 
		colorName = 'blue';
		break;
	case 3:
		colorName = 'red';
		break;
	default:
		return false;
	}
	
	return {
		// Properties
		colorName: colorName,
		pieces: [],

		// Methods
	
		// Puts a glow around pieces that can be moved and 
		// waits for the player to click.
		markOptions: function (steps) {
			var playerObject = this;
			$.each(this.pieces, function (key, piece) {
				if (piece.canMove(steps)) {
					piece.element.addClass('glow');
					piece.element.click(function () {
						playerObject.unMarkOptions();
						piece.move(steps);
					});
				}
			});
		},

		// Removes the glow around pieces that can be moved and 
		// stops waiting for the player to click.
		unMarkOptions: function () {
			$.each(this.pieces, function (key, piece) {
				piece.element.removeClass('glow');
				piece.element.unbind('click');
			});
		},
		
		// Checks if player has won the game
		isWin: function () {
			
		},
		
		start: function () {
			this.pieces = [
				new Piece(
					bricks.brick20, 
					this, 
					'piece' + colorName + '0'
				),
				new Piece(
					bricks.brick21, 
					this,
					'piece' + colorName + '1'
				),
				new Piece(
					bricks.brick22, 
					this,
					'piece' + colorName + '2'
				),
				new Piece(
					bricks.brick23, 
					this,
					'piece' + colorName + '3'
				)
			]
			
			
			$.each(this.pieces, function (key, piece) {
				
				piece.showElement();
			})
		}
	}	
}
