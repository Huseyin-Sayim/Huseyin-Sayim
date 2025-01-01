$(document).ready(() => {
    let wrts = document.querySelectorAll('.c_writers');
    $('.c_writers').click(function (e) { 
        e.preventDefault();
        if (e.target.classList.contains('c_writers')) {
            let id = e.target.value;
            console.log(id);
            wrts.forEach(item => {
                if (item.classList.contains('active')) {
                    item.classList.remove('active');
                }; 
            });
            e.target.classList.add('active');
            $.ajax({
                type: "POST",
                url: "filter-book/action.php",
                data: {
                    wrtId: id
                },
                dataType: "json",
                success: function (response) {
                    $('#all-books').html(response["html"]);
                    console.log(response["html"]);
                }
            });
        }
    });
})