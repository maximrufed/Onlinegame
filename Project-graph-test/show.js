var nn = 0;

function ok1() {
	// alert("ckick 1");
}

function ok2() {
	// horisontal
	// alert("ckick 2");
}

function ok3() {
	// vertical
	alert("ckick 3");
}

function upd() {
	// $('.map').css('left', $(window).width() / 2 - 250 + 'px');
	$.ajax({
		url: 'get.php',
		success: function(data) {
			if (data == '-1') $('.results').html('No answer');
			// $('#res').html(data);
			let json = JSON.parse(data);
			let n = parseInt(json['n']);
			$('#l').html(json['p1']);
			$('#r').html(json['p2']);
			let text = json['msg'];
			if (text == '') text = 'Game is in process';
			if ($('#res').text() != text) {
				$('#res').text(text);
			}
			// alert(1);
			// alert(n + ' ' + window.nn);
			if (n !== window.nn) {
				$('#mapid').text('');
				start();
				// alert("INCORRECT");
				// location.reload(true);
			}
			let map1 = json['map1'];
			let map3 = json['map2'];
			let map2 = json['map3'];
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n; j++) {
					let $o = '0' + map1[j][i] + '.png';
					$('div[x=' + i + '][y=' + j + '][t=1]').find('img').attr('src', $o);
				}
			}
			for (let i = 0; i < n + 1; i++) {
				for (let j = 0; j < n; j++) {
					let $o = '1' + map2[i][j] + '.png';
					$('div[x=' + i + '][y=' + j + '][t=2]').find('img').attr('src', $o);
				}
			}
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n + 1; j++) {
					let $o = '2' + map3[i][j] + '.png';
					$('div[x=' + i + '][y=' + j + '][t=3]').find('img').attr('src', $o);
				}
			}
			// $('.results').text(json['msg']);
		}
	});

}

function start2() {
	start();
	setInterval(upd, 1000);
}

function start() {
	// $('.map').css('left', $(window).width() / 2 - 250 + 'px');
	$.ajax({
		url: 'get.php',
		success: function(data) {
			// if (data == '-1') {	$('.results').html('No answer'); }
			let json = JSON.parse(data);
			$('#l').html(json['p1']);
			$('#r').html(json['p2']);
			let text = json['msg'];
			if (text == '') text = 'Game is in process';
			if ($('#res').text() != text) {
				$('#res').text(text);
			}
			let side = 500;
			let in_one = 3;
			let n = parseInt(json['n']);
			window.nn = n;
			let sq_side = side / (n * in_one + n + 1);
			let map1 = json['map1'];
			let map3 = json['map2'];
			let map2 = json['map3'];
			imge = '<img src="0e.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgg = '<img src="0g.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgr = '<img src="0r.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			let arr = {
				'e': imge,
				'g': imgg,
				'r': imgr
			};
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n; j++) {
					let $o = $('<div style="position: absolute; left: ' + (i * sq_side * (in_one + 1) + sq_side).toString() + 'px; top: ' + (j * sq_side * (in_one + 1) + sq_side).toString() + 'px">' + arr[map1[j][i]] + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.attr('t', 1);
					$o.click(ok1);
					$('#mapid').append($o);
				}
			}
			imge = '<img src="1e.png" width="' + (sq_side * (in_one + 2)).toString() + '" height="' + (sq_side).toString() + '" alt="no img">';
			imgg = '<img src="1g.png" width="' + (sq_side * (in_one + 2)).toString() + '" height="' + (sq_side).toString() + '" alt="no img">';
			imgr = '<img src="1r.png" width="' + (sq_side * (in_one + 2)).toString() + '" height="' + (sq_side).toString() + '" alt="no img">';
			arr = {
				'e': imge,
				'g': imgg,
				'r': imgr
			};
			for (let i = 0; i < n + 1; i++) {
				for (let j = 0; j < n; j++) {
					let $o = $('<div style="position: absolute; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px">' + arr[map2[i][j]] + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.attr('t', 2);
					$o.click(ok2);
					$('#mapid').append($o);
				}
			}
			//vertical
			imge = '<img src="2e.png" height="' + (sq_side * (in_one + 2)).toString() + '" width="' + (sq_side).toString() + '" alt="no img">';
			imgg = '<img src="2g.png" height="' + (sq_side * (in_one + 2)).toString() + '" width="' + (sq_side).toString() + '" alt="no img">';
			imgr = '<img src="2r.png" height="' + (sq_side * (in_one + 2)).toString() + '" width="' + (sq_side).toString() + '" alt="no img">';
			arr = {
				'e': imge,
				'g': imgg,
				'r': imgr
			};
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n + 1; j++) {
					let $o = $('<div style="position: absolute; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px">' + arr[map3[i][j]] + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.attr('t', 3);
					$o.click(ok3);
					$('#mapid').append($o);
				}
			}
		}
	});

}

$(document).ready(start2);
