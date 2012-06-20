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
		diceDrawArea.style.backgroundImage = "url('images/dice"+diceRoll+".png')"
		player.markOptions(diceRoll);
	}
	
	function returnDiceValue(){
		return diceRoll;
	}

	function getGameState(){
		
		//Yaddayadda, h�mta vem som spelar just nu, �r det r�tt, har han redan klickat p� t�rningen?
		var correctPlayer = true;
		
		return correctPlayer;
		
	}
	
	function updateMessage(text){
		var messageBox = document.getElementById('diceMessage');
		
		messageBox.innerHTML = text;
	}
	
	
};