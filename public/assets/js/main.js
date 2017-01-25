$(document).ready(function(){
	$('.sikd-btn-sidedrawer').sideNav({
		menuWidth: 250,
	});
	$('.sikd-account').dropdown();

	listProvinsi('listProvinsi');
});
function abbr(number, decimal) {
	decimal = Math.pow(10,decimal);
	var abbrev = [ " K", " M", " B", " T" ];
	for (var i=abbrev.length-1; i>=0; i--) {
		var size = Math.pow(10,(i+1)*3);
		if(size <= number) {
			number = Math.round(number*decimal/size)/decimal;
			if((number == 1000) && (i < abbrev.length - 1)) {
				number = 1;
				i++;
			}
			number += abbrev[i];
			break;
		}
	}
	return number;
}

function listProvinsi(id) {
	$.ajax({
		url : 'assets/js/pages/indonesia.json',
		success : function(result) {
			var data = result.features;
			var $ul = $( '<ul></ul>' );
			for ( var i = 0; i < data.length; i++ ) {
				var prov = data[i].properties;
				var $li = $( '<li></li>' );
				$li.append( $( '<a href="/level-2?id='+prov.id+'"></a>' ).html( prov.name ) );
				$ul.append( $li );
			}
			$ul.appendTo( $( '#'+id ) );
		}
	});
}