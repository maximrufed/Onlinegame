function upd() {
    for (let i = 0; i < 5; i++) {
        $('#mapid').append('<div >text</div>');
    }
    $('#mapid').append("<div>sdjh</div>");
}

//setInterval(upd, 0.5);
$(document).ready(upd);