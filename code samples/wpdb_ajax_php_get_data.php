 <script type="text/javascript">

        $(function() {

            $('#zip_code').change(function(){
                populateSelect();
            });

        });

        function populateSelect(){

            email=$('#customer_email').val();
            zip=$('#zip_code').val();

            var formData = <?php
            global $wpdb;
            
            $sql = "SELECT * FROM zips";
            $rows = $wpdb->get_results($sql);
        
            if (is_array($rows)) {
                echo json_encode($rows);
            } else {
                echo '[]';
            }
            ?>;
            //alert("Email: " + email + "\nZip: " + zip);
        
            alert(formData[0].id + "\n" + formData[0].city + "\n" + formData[0].state);
        }

        </script>
