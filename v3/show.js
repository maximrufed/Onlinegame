function ok1() {
	// alert("ckick 1");
}

function ok2() {
	// horisontal
	alert("ckick 2");

}

function ok3() {
	// vertical
	alert("ckick 3");
}

function upd() {
	// $.ajax({
	// 	url: 'get.php',
	// 	success: function(data) {
	// 		let mas = JSON.parse(data);
	// 		console.log(data);
	// 		console.log(mas);
	// 		let n = mas['n'];
	// 		let m = mas['k'];
	// 		let map = mas['map'];
	// 		console.log(n);
	// 		for (let i = 0; i < n; i++) {
	// 			$('#mapid').append('<div >text</div>');
	// 		}
	// 		$('#mapid').append('<br>');
	// 	}
	// });
	let side = 500;
	let in_one = 3;
	let n = 4;
	let sq_side = side / (n * in_one + n + 1);
	console.log(sq_side);
	let map = ((0, 0, 0), (0, 0, 0), (0, 0, 0));

	// let a = '<div style="position: absolute; left: ' + toString(100) + 'px; top: ' + toString(100) + 'px">go</div>';
	// $('#mapid').append(a);
	// $('#mapid').append('<div style="position: absolute; left: ' + toString(200) + 'px; top: ' + toString(100) + 'px">go</div>');

	img = '<img src="0e.png" width="' + (sq_side * (in_one)).toString() + '" height="' + (sq_side * (in_one)).toString() + '" alt="no img">';
	for (let i = 0; i < n; i++) {
		for (let j = 0; j < n; j++) {
			// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
			// console.log((i * sq_side * 5));
			// console.log(j * sq_side * 5);
			let $o = $('<div style="position: absolute; left: ' + (i * sq_side * (in_one + 1) + sq_side).toString() + 'px; top: ' + (j * sq_side * (in_one + 1) + sq_side).toString() + 'px">' + img + '</div>');
			$o.attr('x', i);
			$o.attr('y', j);
			$o.click(ok1);
			$('#mapid').append($o);
		}
		$('#mapid').append('<br>');
	}
	//horisontal
	img = '<img src="1e.png" width="' + (sq_side * (in_one + 2)).toString() + '" height="' + (sq_side).toString() + '" alt="no img">';
	for (let i = 0; i < n + 1; i++) {
		for (let j = 0; j < n; j++) {
			let $o = $('<div style="position: absolute; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px">' + img + '</div>');
			$o.attr('x', i);
			$o.attr('y', j);
			$o.click(ok2);
			$('#mapid').append($o);
		}
		$('#mapid').append('<br>');
	}
	//vertical
	img = '<img src="2e.png" height="' + (sq_side * (in_one + 2)).toString() + '" width="' + (sq_side).toString() + '" alt="no img">';
	for (let i = 0; i < n; i++) {
		for (let j = 0; j < n + 1; j++) {
			// console.log(i, ' ', j); toString(i * sq_side) toString(j * sq_side)
			// console.log((i * sq_side * 5));
			// console.log(j * sq_side * 5);
			let $o = $('<div style="position: absolute; top: ' + (i * sq_side * (in_one + 1)).toString() + 'px; left: ' + (j * sq_side * (in_one + 1)).toString() + 'px">' + img + '</div>');
			$o.attr('x', i);
			$o.attr('y', j);
			$o.click(ok3);
			$('#mapid').append($o);
		}
		$('#mapid').append('<br>');
	}
}

$(document).ready(upd);
