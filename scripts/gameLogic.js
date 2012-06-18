var player, bricks;

$(document).ready(function() {
	

	var bricks = [];

	$(".boardWrapper span.outer-bricks").each(function() {
		var span = $(this);
		var val = $(this).attr("value");
		
		bricks[val] = span;

	})


	// Varje bricka måste veta vilka grannar den har.

	var current 		= bricks[0],
		currentValue 	= current.attr('value'),
		nextValue		= parseInt(currentValue)+1;


		console.log(nextValue);

	
	//Vi måste vilken som är current brick
	//Varje bricka måste veta vilka grannar den har. 
	//När man kommer in på sprint så ändras reglerna.


	function GameBoard() {
		this.next = current+1;
	}



	$('.boardWrapper span').each(function() {
		
		if( $(this).has('value') ){
			
			bricks.push($(this));	

		}

	});


})