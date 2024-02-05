jQuery(function($) {
    $('.btn-load-more').click(function(e) {
        e.preventDefault();
        var button = $(this),
            data = {
                'action': 'loadmore',
                'limit': limit,
                'page': page,
                'type': type,
                'category': category
            };

        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function(xhr) {
                button.text('Ładowanie...');
            },
            success: function(data) {
                if (data) {
$(".latest_posts_wrapper").append(data);
                    page++;
                    button.text('Pokaż więcej');
                    if (page == max_pages_latest)
                        button.remove();
                } else {
                    button.remove();
                }
            }
        });
    });

});