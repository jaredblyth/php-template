<div id="header">
	

<script>
if( $(window).width() > 720) // This header slideshow only loads on devices wider than 720px - so the following html only loads if required
{
	
	
	document.write('<div id="slideshow">');
		document.write('<a href="index.php"><img src="/img/design/header/headerimage01.jpg" alt="Headshot"/></a>');
	document.write('</div>');
		
}

else {$(header).css( "height", "0px" );} // Removes header spacing which is otherwise set in the css stylesheet to best suit the images to the height of the particular device
</script>

</div>