/*
 * All functions and drivers need jQuery. The jQuery library is included (or should be included) in the JS folder.
 * 
 */

//functions
//function for loading a file, usually PHP, into another file under the div tag with the id of "main".
function loadPage(){
	var dir = "../website/";
	if(arguments.length > 1) dir = arguments[0]+arguments[1];
	else dir += arguments[0];
	$("#main").load(dir);
}

//drivers
//driver for highlighting buttons
$('.nav li a').click(
	function(e) {
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	}
);
