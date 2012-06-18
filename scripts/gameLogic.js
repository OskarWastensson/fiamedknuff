var player, bricks = {};

$(document).ready(function() {

	$(".boardWrapper span.outer-bricks").each(function() {
		var val = 'brick' + $(this).attr("value");
		bricks[val] = new Brick($(this).attr("value"), $(this));
	})
	
	// Varje bricka måste veta vilka grannar den har.

	function Brick (id, element) {
		var newId;
		
		return {
			id: id,
			element: element,
			pieces: [],
			next: function () {

				if (this.id === 39) {
					newId = 0;
				} else {
					newId = +this.id + 1;
				}
				return bricks['brick' + newId];
			}			
		}
	}

	player = new Player(0);
	player.start();
	
})