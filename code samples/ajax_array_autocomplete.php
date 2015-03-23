<?php
    //if (is_page('page_name')) {
        echo '<script src="//code.jquery.com/jquery-1.10.2.js"></script>';
        echo '<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>';

        $zips = json_encode(zipText());

        echo '<script>
              $(function() {
                var zips = '.$zips.';
                var NoResultsLabel = "None of our service areas match that zip code. We\'re sorry!";

                $( "#zip_code" ).autocomplete({
                  source: function(request, response) {
                var results = $.ui.autocomplete.filter(zips, request.term);

                if (!results.length) {
                    results = [NoResultsLabel];
                }

                response(results);
                },
                select: function (event, ui) {
                    if (ui.item.label === NoResultsLabel) {
                        event.preventDefault();
                    }
                },
                focus: function (event, ui) {
                    if (ui.item.label === NoResultsLabel) {
                        event.preventDefault();
                    }
                }
            });
});
                      </script>';
    //}
    ?>
