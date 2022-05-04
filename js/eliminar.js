$(function() {
    $('.eliminar').click(function(e) {
        e.preventDefault();
        let href = this.href;
        var dialog = $('<p>estas seguro que quieres eliminar?</p>').dialog({
            buttons: {
                "Yes": function() { location.href = href; },
                "Cancel": function() {
                    dialog.dialog('close');
                }
            }
        });
    });
});
// jQuery('a').click(function(e) {
//     location.href = this.href;
// });