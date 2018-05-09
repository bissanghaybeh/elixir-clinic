jQuery(document).ready(function($){
    $( "#ramadan" ).on( "submit", function(event) {
            event.preventDefault();
            country = $("#country").val();
            var data = ({
                action: "bissan_send_ajax",
                country: country,
            });
            $.ajax({
                type: "GET",
                url: admin_ajax,
                data: data,
                contentType: "application/json; charset=utf-8",
                dataType:    "json",
                success: function(data){
                    console.log(data.html);
                    if (data.html) {
                        $(".results").append(data.html);
                    }
                }
            });
        })
});