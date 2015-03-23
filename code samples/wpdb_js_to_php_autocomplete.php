<?php
         
        if(is_front_page()) : 
        $cities = zipText();
        //print_r($cities);

        ?>
        <script type="text/javascript">

            var cities = <?php echo json_encode($cities, JSON_PRETTY_PRINT, 512); ?>

            populateSelect();

            $(function() {

                  $('#zip_code').change(function(){
                    populateSelect();
                });
                
            });

            function populateSelect(){
                zip=$('#zip_code').val();
                $('#city').html('');
                
                
                for(var i=0; i < cities.length; i++) {

                    if(cities[i].zip === zip) {
                        $('#city').append('<option>'+cities[i].city+'</option>');
                    }

                }
                
            }
        </script>

    <?php endif ?>
