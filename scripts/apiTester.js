// Tests that the API is fully functional

$(document).ready(function() {
	var send;
	// Posting a game
	send = { 
		status: 0 
	};

	$.post('api/?/games/', send, function(data) {
		console.log('Post of Game returned positive');
		console.log(data);
	}, 'json');
	
	// Posting a user
	send = { 
		name: 'Gusten Grodslukare',
		email: 'gusten@grodslukare.se'
	};
	
	$.post('api/?/users/', send, function(data) {
		console.log('Post of User returned positive');
		console.log(data);
	}, 'json');
	
	// Creating a player and adding that player to the game
	send = {
		games_id: 4,
		users_id: 15,
		color: 1
	};
	
	$.post('api/?/players/', send, function(data) {
		console.log('Post of Player returned positive');
		console.log(data); 
	}, 'json');	
	
	// Making a move
	send = {
		players_id: 2,
		date_moved: '2012-06-12 14:20:00',
		steps: 3,
		piece: 2
	};
	
	$.post('api/?/moves/', send, function(data) {
		console.log('Post of Player returned positive');
		console.log(data); 
	}, 'json');		
	
	// Getting a player
	$.get('api/?/players/2', function(data) {
		console.log('Get player returned positive');
		console.log(data);
	});
	
	// Getting a game
	$.get('api/?/games/2', function(data) {
		console.log('Get game returned positive');
		console.log(data);
	});
	
	// Getting moves for a player
	$.get('api/?/players/2/moves/', function(data) {
		console.log('Get moves returned positive');
		console.log(data);
	});
	
	
	// Getting moves for a player with offset
	$.get('api/?/players/2/moves/offset/moves/2', function(data) {
		console.log('Get moves with offset returned positive');
		console.log(data);
	});
	
	// Changing the status of a game
	$.ajax('api/?/games/1', {
		method: 'PUT',
		data: {
			status: 1
		},
		success: function(data) {
			console.log('Put game returned positive');
			console.log(data);
		}
	});
	
	// DELETE requests are not tested, as we won't use them.	
});

