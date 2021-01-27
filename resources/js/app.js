require('./bootstrap');

$(document).ready(function() {

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
