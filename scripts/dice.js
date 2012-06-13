onload = function(){
	
	var dice = document.getElementById('dice');
	var diceDrawArea = document.getElementById('diceValue');
	
	var diceRoll = 2;
	
	dice.style.cursor = 'pointer';
	dice.onclick = function() {
		if(getGameState()){
			updateDice();
			returnDiceValue();
		}else{
			updateMessage('You cannot click now.')
		}
	};
	
	function updateDice(){
		diceRoll = Math.floor((Math.random()*6)+1);
	    diceDrawArea.innerHTML = diceRoll;
	}
	
	function returnDiceValue(){
		return diceRoll;
	}

	function getGameState(){
		
		//Yaddayadda, hämta vem som spelar just nu, är det rätt, har han redan klickat på tärningen?
		var correctPlayer = true;
		
		return correctPlayer;
		
	}
	
	function updateMessage(text){
		var messageBox = document.getElementById('diceMessage');
		
		messageBox.innerHTML = text;
	}
	
	
};