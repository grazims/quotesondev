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

// jQuery('#submit').on('submit', function(event) {
//   event.preventDefault();

//   const title = jQuery('#title').val();
//   const content = jQuery('#content').val();
//   const source = jQuery('#url').val();
//   const sourceUrl = jQuery('#urlSource').val();

//   jQuery
//     .ajax({
//       method: 'POST',
//       url: red_vars.rest_url + 'wp/v2/posts/',
//       data: {
//         title,
//         content,
//         source: _qod_quote_source,
//         source_url: _qod_quote_source_url,
//         status: 'pending'
//       },
//       beforeSend: function(xhr) {
//         xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
//       }
//     })
//     .done(function() {
//       title.val('');
//       content.val('');
//       source.val('');
//       sourceUrl.val('');
//     })
//     .fail(function() {
//       jQuery('.form-section').append('<h1> Ops, something went wrong!</h1>');
//     });
// });

jQuery('#submit').on('click', function(e) {
  e.preventDefault();
  const title = jQuery('#title').val(),
    content = jQuery('#quote-content').val(),
    _qod_quote_source = jQuery('#url').val(),
    _qod_quote_source_url = jQuery('#urlSource').val();

  console.log(title, content, _qod_quote_source, _qod_quote_source_url);

  jQuery
    .ajax({
      method: 'POST',
      url: red_vars.rest_url + 'wp/v2/posts',
      data: {
        title,
        content,
        _qod_quote_source,
        _qod_quote_source_url,
        status: 'pending'
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
    .done(function() {
      jQuery('form').val('');
    })
    .fail(function() {
      jQuery('form').append(
        '<p class="failure">Quote not submitted. Refresh the page and try again</p>'
      );
    });
});
