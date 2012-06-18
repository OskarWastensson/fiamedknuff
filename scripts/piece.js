// This file conatins all logic relating to a peice

var Piece = function (brick, player, elementName) {

	return {
		// Properties
		currentBrick: brick,
		
		element: $('<span />')
			.attr('id', elementName)
			.addClass('piece')
			.addClass(player.colorName + 'Piece')
			.offset(brick.element.offset()),
		
		// Methods
		showElement: function () {
			$('.boardWrapper').append(this.element);
			this.currentBrick.pieces.push(this); 
		},
		
		canMove: function (steps) {
			var brick, exit = false;
			// Test if the piece is at home
			if (this.currentBrick.name === 'home' + player.colorName) {
				if (steps === 1 || steps === 6) {
					return true;
				} else {
					return false;
				}
			};

			// Test if any of the bricks on the path contains 
			// a peice of the same player
			brick = this.currentBrick;
			for (var i = 1; i <= steps; i += 1) {
				brick = brick.next();
				console.log(brick.pieces);
				$.each(brick.pieces, function (key, piece) {
					if (piece.player == player) {
						exit = true;
					};
				});
				if(exit) {
					return false;
				}
			}
			return true;
		},

		isCrash: function () {

		},

		canSprint: function () {

		},

		isAtGoal: function () {

		},

		move: function (steps) {

		},

		crash: function () {

		},

		sprint: function () {

		},

		makeGoal: function () {

		}
	};
} 

