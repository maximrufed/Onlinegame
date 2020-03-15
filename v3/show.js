function ok1() {
	alert("ckick 1");
}

function ok2() {
	// horisontal
	alert("ckick 2");

}

function ok3() {
	// vertical
	alert("ckick 3");
}

let smap1 = [];
let smap2 = [];
let smap3 = [];

function start() {
	$.ajax({
		url: 'get.php',
		success: function(data) {
			// alert(data);
			if (data == '-1') {
				$('.results').html('No answer');
			}
			// $('.results').html(data);
			let json = JSON.parse(data);
			let side = 500;
			let in_one = 3;
			let n = parseInt(json['n']);
			// alert(n);
			// exit;
			let sq_side = side / (n * in_one + n + 1);
			// console.log(sq_side);
			let map1 = json['map1'];
			let map3 = json['map2'];
			let map2 = json['map3'];
			// let a = '<div style="position: absolute; left: ' + toString(100) + 'px; top: ' + toString(100) + 'px">go</div>';
			// $('#mapid').append(a);
			// $('#mapid').append('<div style="position: absolute; left: ' + toString(200) + 'px; top: ' + toString(100) + 'px">go</div>');

			imge = '<img src="0e.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgg = '<img src="0g.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgr = '<img src="0r.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			let arr = {
				'e': imge,
				'g': imgg,
				'r': imgr
			};
			// alert(2);
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n; j++) {
					// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
					// console.log((i * sq_side * 5));
					// console.log(j * sq_side * 5);
					// alert(1);
					// alert(arr[map[i][j]]);
					let $o = $('<div style="position: absolute; left: ' + (i * sq_side * (in_one + 1) + sq_side).toString() + 'px; top: ' + (j * sq_side * (in_one + 1) + sq_side).toString() + 'px">' + arr[map1[i][j]] + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.click(ok1);
					// smap1[i][j] = $o;
					// $('#mapid').append(smap1[i][j]);
					$('#mapid').append($o);
				}
				$('#mapid').append('<br>');
			}
			//horisontal
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
					$o.click(ok2);
					// smap2[i][j] = $o;
					// $('#mapid').append(smap2[i][j]);
					$('#mapid').append($o);
				}
				$('#mapid').append('<br>');
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
					// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
					// console.log((i * sq_side * 5));
					// console.log(j * sq_side * 5);
					let $o = $('<div style="position: absolute; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px">' + arr[map2[i][j]] + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.click(ok3);
					// smap3[i][j] = $o;
					// $('#mapid').append(smap3[i][j]);
					$('#mapid').append($o);
				}
				$('#mapid').append('<br>');
			}
		}
	});
}

$(document).ready(start);

function upd() {
	$.ajax({
		url: 'get.php',
		success: function(data) {
			// alert(data);
			if (data == '-1') {
				$('.results').html('No answer');
			}
			$('.results').html(data);
			let json = JSON.parse(data);
			let side = 500;
			let in_one = 3;
			let n = parseInt(json['n']);
			// alert(n);
			// exit;
			let sq_side = side / (n * in_one + n + 1);
			// $('#mapid').append(a);
			// $('#mapid').append('<div style="position: absolute; left: ' + toString(200) + 'px; top: ' + toString(100) + 'px">go</div>');

			imge = '<img src="0e.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgg = '<img src="0g.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			imgr = '<img src="0r.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
			let arr = {
				'e': imge,
				'g': imgg,
				'r': imgr
			};
			// alert(2);
			for (let i = 0; i < n; i++) {
				for (let j = 0; j < n; j++) {
					// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
					// console.log((i * sq_side * 5));
					// console.log(j * sq_side * 5);
					// alert(1);
					// alert(arr[map[i][j]]);
					let $o = arr[map1[i][j]];
					$o.attr('x', i);
					$o.attr('y', j);
					$o.click(ok1);
					smap1[i][j].find('img').attr('src') = $o;
					// smap1[i][j] = $o;
					// $('#mapid').append($o);
				}
				$('').append('<br>');
			}
			//horisontal
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
					let $o = $('<div style="position: absolute; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px">' + imge + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.click(ok2);
					// $('#mapid').append($o);
				}
				$('#mapid').append('<br>');
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
					// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
					// console.log((i * sq_side * 5));
					// console.log(j * sq_side * 5);
					let $o = $('<div style="position: absolute; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px">' + imge + '</div>');
					$o.attr('x', i);
					$o.attr('y', j);
					$o.click(ok3);
					$('#mapid').append($o);
				}
				$('#mapid').append('<br>');
			}
		}
	});
	
}

// setInterval(upd, 200);