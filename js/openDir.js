$(document).ready(function(){
    $('.openDir').click(function(){
        dir = $(this).attr('name');
        $.post(
            "index.php",
            {
                dir:dir

            },
            function (data) {

            }

        );
    })
})