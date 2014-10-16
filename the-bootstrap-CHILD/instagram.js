var client_id = "976953dfbc544f0ea4a0f9f21576cacd";

var $petj=jQuery.noConflict(); // avoid conflict of function names.

// ajax GET images from instagram
    $petj.ajax({
        type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/media/popular?client_id=" + client_id,
        success: function(data) {
            for (var i = 0; i < 10; i++) {
                	$petj("#pics").append("<a target='_blank' href='" + data.data[i].link + "'><img src='" + data.data[i].images.low_resolution.url + "'></img></a>");
            }
        }
    });


