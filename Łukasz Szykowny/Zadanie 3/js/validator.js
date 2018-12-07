function validateForm()
{
    var form_correct = true;
    jQuery('.is-invalid').removeClass('is-invalid');
    jQuery('#testedForm').find('input, select').each(function(key, field){
        var required = jQuery(field).attr('required');
        if (typeof required !== typeof undefined && required !== false) {
            var field_name = jQuery(field).parent().find('label').text();
            var value = jQuery(field).val();
            if(value.length == 0)
            {
                jQuery(field).addClass('is-invalid');
                form_correct = false;
            }
        }
    });

    var age = parseInt(jQuery('#age').val());

    if(isNaN(age) || age < 18 || age > 99)
    {
        if(!jQuery('#age').hasClass('is-invalid'))
            jQuery('#age').addClass('is-invalid');
    }

    if(!jQuery('#agreement').is(':checked'))
    {
        form_correct = false;
        jQuery('#agreement').addClass('is-invalid');
    }
    return form_correct;
}