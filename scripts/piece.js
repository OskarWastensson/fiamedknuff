// This file conatins all logic relating to a peice

var Piece = function (brick, player, elementName) {
	var element, canMove, isCrash, canSprint, isAtGoal, 
		move, Crash, startSprint, makeGoal,
		createElement, currentBrick = brick;
	
	// Constructor actions
	element = $('<span />')
		.attr('id', elementName)
		.addClass('piece')
		.addClass(player.colorName + '_piece')
		.offset(brick.position);
	
	$('#boardWrapper').append(element);
	
	// Functions
	canMove = function (steps) {
		var brick, exit = false;
		// Test if the piece is at home
		if (currentBrick.name === 'home' + player.colorName) {
			if (steps === 1 || steps === 6) {
				return true;
			} else {
				return false;
			}
		};

		// Test if any of the bricks on the path contains 
		// a peice of the same player
		brick = currentBrick;
		for (var i = 1; i < steps; i += 1) {
			brick = brick.nextBrick; // OR something..
			$.foreach(brick.pieces, function (piece) {
				if (piece.player == player) {
					exit = true;
				};
			});
			if(exit) {
				return false;
			}
		}
		return true;
	};
	
	isCrash = function () {
		
	};
	
	canSprint = function () {
		
	};
	
	isAtGoal = function () {
		
	};
	
	move = function (steps) {
		
	};
	
	crash = function () {
		
	};
	
	sprint = function () {
		
	};
	
	makeGoal = function () {
		
	};
	
} 

