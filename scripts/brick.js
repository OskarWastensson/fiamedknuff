	function Brick (id, element) {
		var newId;
		
		return {
			id: id,
			element: element,
			pieces: [],
			
			next: function () {
				
				switch (+this.id) {
				case 39:
					newId = 0;
					break;
				case 43:
					newId = 100;
					break;
				case 53:
					newId = 100;
					break;
				case 63:
					newId = 100;
					break;
				case 73:
					newId = 100;
					break;
				case 100:
					newId = 100;
					break;
				default:
					newId = +this.id + 1;
				}
				return bricks['brick' + newId];
			}			
		}
	}