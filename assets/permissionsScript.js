function updatePermissions() {
    let formData = [];

    jQuery('#customPermissionForm').find('input[type="checkbox"]')
        .each(function (index) {
            const el = jQuery(this);
            formData.push({'name' : el.prop('name'), 'value' : el.is(":checked")});
        });

    const data = {
        'action': 'update_permissions',
        'formData': formData
    };
    jQuery.post(ajaxurl, data, function (response) {
        alert('Permissions updated');
    });
}