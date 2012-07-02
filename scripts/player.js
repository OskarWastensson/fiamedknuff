var Player = function (no) {
	var colorName, sprintStart, lapStart, lapEnd;

	// Constructor actions
	switch(no) {
	case 0: 
		colorName = 'green';
		lapEnd = 39;
		lapStart = 0;
		sprintStart = 70;
		break;
	case 1:
		colorName = 'yellow';
		lapEnd = 9;
		lapStart = 10;
		sprintStart = 50;
		break;
	case 2: 
		colorName = 'blue';
		lapEnd = 19;
		lapStart = 20;
		sprintStart = 40;
		break;
	case 3:
		colorName = 'red';
		lapEnd = 29;
		lapStart = 30;
		sprintStart = 60;
		break;
	default:
		return false;
	}
	
	return {
		// Properties
		colorName: colorName,
		sprintStart: sprintStart,
		lapStart: lapStart,
		lapEnd: lapEnd,
		pieces: [],

		// Methods
	
		// Puts a glow around pieces that can be moved and 
		// waits for the player to click.
		markOptions: function (steps) {
			var playerObject = this;
			$.each(this.pieces, function (key, piece) {
				if (piece.canMove(steps)) {
					piece.element.addClass('moveable');
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
				piece.element.removeClass('moveable');
				piece.element.unbind('click');
			});
		},
		
		// Checks if player has won the game
		isWin: function () {
			
		},
		
		start: function () {
			this.pieces = [
				new Piece(
					bricks.brick0, 
					this, 
					'piece' + colorName + '0'
				),
				new Piece(
					bricks.brick3, 
					this,
					'piece' + colorName + '1'
				),
				new Piece(
					bricks.brick10, 
					this,
					'piece' + colorName + '2'
				),
				new Piece(
					bricks.brick39, 
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
