        $('#article_form_enableImageFromUrl').on('change', function () 
        {
            
            // $('#article_form_imageFromUrl').attr('disabled', false);

            $('#article_form_imageFromUrl,#article_form_image').toggleClass('disabledinput enabledinput');
            $('.disabledinput').attr('disabled', true);

            // $('#article_form_image').attr('disabled', true);
            $('.enabledinput').attr('disabled', false);
        })