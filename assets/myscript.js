function changeTitle(text) {
    jQuery('.dropbtn').text(text);
    jQuery('#hiddenTitle').val(text);
    jQuery('form').show();
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
    }
}

jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
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
    console.log(formData);
    var data = {
        'action': 'submit_format',
        'formData': formData
    };
    jQuery.post(ajaxurl, data, function(response) {
        alert('Got this from the server: ' + response);
    });
}
