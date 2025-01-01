$(document).ready(() => {
    $('#search_writer').keyup(() => {
        let keyword = $('#search_writer').val();
        console.log(keyword);
        $.ajax({
            type: "POST",
            url: "writer_ajax/action_writer.php",
            data: {key : keyword},
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#yazarlar').html(response["html"]);
            }
        });
    });
    $('#search_btn').click(() => {
        let keyword = $('#search_writer').val();
        console.log(keyword);
        $.ajax({
            type: "POST",
            url: "writer_ajax/action_writer.php",
            data: {key : keyword},
            dataType: "json",
            success: function (response) {
                console.log(response["html"]);
                $('#yazarlar').html(response["html"]);
            }
        });
    });
});