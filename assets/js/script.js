$x = jQuery.noConflict();
$x(function(){
	console.log('Loaded....................100%');
	
	//popUpConsent();
});
function popUpConsent(){
	$x('button#add-to-cart-btn').click(function(e){
		e.preventDefault();
		if (confirm('I have thoroughly reviewed the artwork and confirm that it is correct and is ready for engraving. I understand that I will be responsible for reproduction costs if artwork mistakes are found after the order has been produced.')) {
			return true;
		} else {
			return false;
		}
	});	
}