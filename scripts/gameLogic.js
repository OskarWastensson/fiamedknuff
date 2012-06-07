$(document).ready(function() {
	


	var bricks = {};

	$(".boardWrapper span.outer-bricks").each(function() {
		var span = $(this);
		var val = $(this).attr("value");
		
		bricks[val] = span;

	})
	
	//Varje bricka måste veta vilka grannar den har.


	function GameBoard() {
		this.next = current+1;
	}


	var bricks = [];

	$('.boardWrapper span').each(function() {
		
		if( $(this).has('value') ){
			
			bricks.push($(this));	

		}

	});


	// function Game (){
		
	// }

	// var bricks = [];
	// var attr = $(".gameBoard span").hasAttr('class');
	// console.log(attr);



	// function Brick(steps, direction){
	// 	this.classAttr = $(".boardWrapper span").attr("class");
	// 	console.log(this.classAttr);

	// 	// this.nextBrick = this+1;
	// 	// this.previousBrick = this-1;
	// 	// document.getElementsByTagName("");
	// }

	// 	console.log($('.boardWrapper span'));

})