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

jQuery(document).ready(function ($) {
    $('.my-color-field').wpColorPicker();

    let g_formData = getFormData();
    const sliders = $('.slider');
    $.each(sliders, function (i, v) {
        const slider = v.children[0];
        const output = v.children[1];
        output.innerHTML = slider.value; // Display the default slider value

        slider.oninput = function () {
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
    jQuery.post(ajaxurl, data, function (response) {
        alert('Text format added successfully');
        g_formData = JSON.parse(response);
    });
}

function getFormData() {

    const data = {
        'action': 'get_format',
    };
    jQuery.post(ajaxurl, data).done(function (response) {
        g_formData = JSON.parse(response);
    });
}

function resetFormData() {
    jQuery('#customSettingsForm').hide();
    jQuery('.dropbtn').text('Applying setting');
    const data = {
        'action': 'reset_format',
    };
    jQuery.post(ajaxurl, data).done(function (response) {
        g_formData = JSON.parse(response);
        jQuery('.dropbtn').text('Chose what to edit');
    });
}

function updateFormData(text) {

    const data = g_formData[text];
    const form = jQuery('#customSettingsForm');
    if (data !== null) {
        jQuery('input[name="color"]').wpColorPicker('color', data['color']);
        jQuery('input[name="text-transform"]').filter('[value="' + data['text-transform'] + '"]').prop('checked', true);
        jQuery('input[name="text-align"]').filter('[value="' + data['text-align'] + '"]').prop('checked', true);
        jQuery('input[name="font-size"]').val(data['font-size']);
        jQuery('input[name="line-height"]').val(data['line-height']);
        jQuery('input[name="letter-spacing"]').val(data['letter-spacing']);
        jQuery('input[name="background-color"]').wpColorPicker('color', data['background-color']);
        jQuery('input[name="border-color"]').wpColorPicker('color', data['border-color']);
        jQuery('input[name="border-width"]').val(data['border-width']);
        jQuery('input[name="border-style"]').filter('[value="' + data['border-style'] + '"]').prop('checked', true);
        jQuery('input[name="border-radius"]').val(data['border-radius']);
    }

    const sliders = jQuery('.slider');
    jQuery.each(sliders, function (i, v) {
        const slider = v.children[0];
        const output = v.children[1];
        output.innerHTML = slider.value;
    });

    form.show();
}