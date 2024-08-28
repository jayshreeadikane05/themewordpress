(function($) {
    wp.customize.bind('ready', function() {
        // Initially hide the Elementor Edit button if checkbox is not checked
        if (!wp.customize('header_created_with_elementor').get()) {
            $('#customize-control-header_elementor_edit_button').hide();
        }

        // Listen for changes to the 'header_created_with_elementor' checkbox
        wp.customize('header_created_with_elementor').bind(function(newValue) {
            if (newValue) {
                $('#customize-control-header_elementor_edit_button').show();
            } else {
                $('#customize-control-header_elementor_edit_button').hide();
            }
        });
    });
})(jQuery);