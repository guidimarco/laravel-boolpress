require('./bootstrap');

$(document).ready(function() {

    // create new item -> not null input
    $('#create-new-item').click(function(event) {
        event.preventDefault(); // STOP on click

        // check if all not-null input are not empty
        var current_input = $(this).siblings('.not-null').children('input').val().trim();
        console.log(current_input);
        if (!current_input.length) {
            console.log("nullo");
        } else {
            console.log("c'e");
        }
    });

    // delete item -> alert
    $("[id^='link-delete']").click(function(event) {
        event.preventDefault(); // STOP click

        var this_form_id = $(this).attr('id').replace('link-delete', '#form-delete');
        // console.log(this_form_id);

        // var this_form = $('#form-delete');
        // console.log(this_form);

        // alert!
        swal({
            title: "Sei sicuro?",
            text: "Una volta eliminato non sarà possibile recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $(this_form_id).submit();
            } else {
                swal("Il file non è stato cancellato!");
            }
        });

    });

});
