jQuery(document).ready(() => {
  jQuery('#another').on('click', function(event) {
    event.preventDefault();

    jQuery
      .ajax({
        method: 'GET',
        cache: false,
        url:
          red_vars.rest_url +
          'wp/v2/posts?_embed=true&filter[orderby]=rand&filter[posts_per_page]=1',

        data: {
          comment_status: 'closed'
        },
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
        }
      })
      .done(function(response) {
        history.pushState(null, null, response[0].slug);
        for (let i = 0; i < response.length; i++) {
          jQuery('article')
            .empty()
            .append(
              `
            <p>${response[i].content.rendered}</p>
            <h3> - ${response[i].title.rendered}
            ${response[i]._qod_quote_source_url &&
              `,
            <a href="${response[i]._qod_quote_source_url}"> ${
                response[i]._qod_quote_source
              }</a></h3>
           `}`
            );
        }
      });
  });
});

jQuery('#submit').on('click', function(event) {
  event.preventDefault();

  let title = jQuery('.author').val();
  let content = jQuery('.quote').val();
  let source = jQuery('.source').val();
  let sourceURL = jQuery('.url').val();

  let arrayjson = {
    title: title,
    content: content,
    source: source,
    source_url: sourceURL,
    status: 'pending'
  };

  let postUrl = red_vars.rest_url + 'wp/v2/posts/';

  jQuery
    .ajax({
      method: 'POST',
      cache: false,
      url: postUrl,
      dataType: 'json',
      data: arrayjson,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
    .done(function() {
      jQuery('.form').hide();
      jQuery('.site-main').hide();
      jQuery('.form-section').append(
        '<h1> Thank you for your submission!</h1>'
      );
    })
    .fail(function() {
      jQuery('.form').hide();
      jQuery('.site-main').hide();
      jQuery('.form-section').append('<h1> Ops, something went wrong!</h1>');
    });
});
