// This script shows & the wide menu when the menu-button is toggled on mobile & mini-tablets

// Note that if the wide menu is hidden using the below script and then the user's window increases to a larger size, the wide menu will still remainh hidden.

$(document).ready(function() {
 $('#menu-button').toggle(
		function() {
		   $('#widemenu').slideDown();
		},
		function() {
		   $('#widemenu').slideUp();		   
	  }
	); // end toggle
}); // end ready