Player = function (no) {

	var pieces, colorName;

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

	// Piece objects
	pieces = [
		new Piece(
			bricks['start' + colorName + '0'], 
			this, 
			'piece' + colorName + '0'
		),
		new Piece(
			bricks['start' + colorName + '1'], 
			this,
			'piece' + colorName + '1'
		),
		new Piece(
			bricks['start' + colorName + '2'], 
			this,
			'piece' + colorName + '2'
		),
		new Piece(
			bricks['start' + colorName + '3'], 
			this,
			'piece' + colorName + '3'
		)
	];
	
	// Object functions
	return {

		// Puts a glow around pieces that can be moved and 
		// waits for the player to click.
		markOptions: function (steps) {
			$.each(pieces, function (piece) {
				if (piece.canMove(steps)) {
					piece.element.addClass('glow');
					piece.element.click(function () {
						unMarkOptions();
						piece.move(steps);
					});
				}
			});
		},

		// Removes the glow around pieces that can be moved and 
		// stops waiting for the player to click.
		unMarkOptions: function () {
			$.each(pieces, function (piece) {
				piece.element.removeClass('glow');
				piece.element.unbind('click');
			});
		},
		
		// Checks if player has won the game
		isWin: function () {
			
		}	
	}	
}
