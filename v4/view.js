function upd() {
	$.ajax({
	  url: 'get.php',
	  success: function(data) {
		// alert(data);
		if (data == '-1') {
			$('.results').html('No answer');
		}
		$('.results').html(data);
	  }
	});
}

setInterval(upd, 0.5);