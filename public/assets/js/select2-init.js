$(document).ready(function() {
    initializeSelect2();
    // Initialize select2
    $('.select2').select2({
        width: '100%',
        placeholder: 'Select an option',
    });
});

function initializeSelect2() {
    // Department filters
    $('.department-filter').each(function() {
        $(this).select2({
            width: '100%',
            placeholder: 'Select Department',
            dropdownParent: $(this).parent()
        });
    });
    
    // Service selects - only initialize those that aren't disabled
    $('.service-select').each(function() {
        if (!$(this).prop('disabled')) {
            $(this).select2({
                width: '100%',
                placeholder: 'Select Service',
                dropdownParent: $(this).parent(),
                templateResult: function(data) {
                    // Skip hidden options
                    const $option = $(data.element);
                    if ($option.css('display') === 'none') {
                        return null;
                    }
                    return data.text;
                }
            });
        }
    });
    
    // Doctor select
    $('#doctor_id').select2({
        width: '100%',
        placeholder: 'Select Doctor',
        dropdownParent: $('#doctor_id').parent()
    });
}
