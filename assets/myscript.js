function changeTitle(text) {
    jQuery('.dropbtn').text(text);
    jQuery('#hiddenTitle').val(text);
    updateFormData(text);


    const dropdowns = document.getElementsByClassName("dropdown-content");
    for (let i = 0; i < dropdowns.length; i++) {
        const openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
    }
}

jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();

    let g_formData = getFormData();
    const sliders = $('.slider');
    $.each(sliders,function (i,v){
        const slider = v.children[0];
        const output = v.children[1];
        output.innerHTML = slider.value; // Display the default slider value

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    });
});

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function submitForm() {
    const formData = jQuery('form').serializeArray();
    const data = {
        'action': 'submit_format',
        'formData': formData
    };
    jQuery.post(ajaxurl, data, function(response) {
        alert('Text format added successfully: ' + response);
        getFormData();
    });
}

function getFormData(){

    const data = {
        'action': 'get_format',
    };
    jQuery.post(ajaxurl, data).done(function (response) {
        g_formData = JSON.parse(response);
    });
}

function updateFormData(text) {
    //TODO Update the form with the data from the database
    const data = g_formData[text];
    const form = jQuery('form');
    if(data !== null){
        jQuery('input[name="fontColor"]').wpColorPicker('color',data['fontColor']);
        jQuery('input[name="transformGroup"]').filter('[value="' + data['transformGroup'] + '"]').prop('checked', true);
        jQuery('input[name="alignmentGroup"]').filter('[value="' + data['alignmentGroup'] + '"]').prop('checked', true);
        jQuery('input[name="fontSize"]').val(data['fontSize']);
        jQuery('input[name="lineHeight"]').val(data['lineHeight']);
        jQuery('input[name="letterSpacing"]').val(data['letterSpacing']);
        jQuery('input[name="backgroundColor"]').wpColorPicker('color',data['backgroundColor']);
        jQuery('input[name="borderColor"]').wpColorPicker('color',data['borderColor']);
        jQuery('input[name="borderWidth"]').val(data['borderWidth']);
        jQuery('input[name="borderGroup"]').filter('[value="' + data['borderGroup'] + '"]').prop('checked', true);
        jQuery('input[name="cornerNumber"]').val(data['cornerNumber']);
    }

    const sliders = jQuery('.slider');
    jQuery.each(sliders,function (i,v) {
        const slider = v.children[0];
        const output = v.children[1];
        output.innerHTML = slider.value;
    });

    form.show();
}