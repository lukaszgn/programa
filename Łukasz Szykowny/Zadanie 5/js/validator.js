function validateForm()
{
    var form_correct = true;
    console.log('Form validated');
    jQuery('.is-invalid').removeClass('is-invalid');
    jQuery('#testedForm').find('input').each(function(key, field){
        var required = jQuery(field).attr('required');
        if (typeof required !== typeof undefined && required !== false) {
            var field_name = jQuery(field).parent().find('label').text();
            var value = jQuery(field).val();
            if(value.length == 0)
            {
                console.log('Pole '+ field_name + ' nie może być puste');
                jQuery(field).addClass('is-invalid');
                form_correct = false;
            }
        }
    });

    jQuery('#testedForm').find('select').each(function(key, field){
        var required = jQuery(field).attr('required');
        if (typeof required !== typeof undefined && required !== false) {
            var field_name = jQuery(field).parent().find('label').text();
            var value = jQuery(field).val();
            if(value.length == 0)
            {
                console.log('Pole '+ field_name + ' nie może być puste');
                form_correct = false;
                jQuery(field).addClass('is-invalid');
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
        console.log('Musisz wyrazić zgodę aby przejść dalej');
    }
    return form_correct;
}