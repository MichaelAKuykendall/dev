$(function() {

    $('#zip_code').change(function(){

        if($('.invalid-zip-message').hasClass('in')) {
            $('.invalid-zip-message').removeClass('in');
        }

        email=$('#customer_email').val();
        zip=$('#zip_code').val();

        jQuery.ajax({
            type: "POST",
            dataType: "text",
            url: my_ajax_script.ajaxurl,
            data: ({action : 'form_data',email:email, zip:zip}),
            success: function(data) {                                       
                alert(data);
            }                              
        });

 
    });

});