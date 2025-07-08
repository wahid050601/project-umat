(function($) {
    $.customModal = function(options) {
        // Default options
        const defaults = {
            title: 'Modal Title',
            content: '',
            size: 'medium', // small, medium, large
            buttons: [],
            onClose: null,
            theme: 'light' // light, dark
        };

        // Merge default options with user options
        const settings = $.extend({}, defaults, options);

        // Create modal HTML with enhanced structure
        const modalHTML = `
            <div class="custom-modal-overlay"></div>
            <div class="custom-modal ${settings.theme}" data-size="${settings.size}">
                <div class="custom-modal-header">
                    <h5 class="custom-modal-title">${settings.title}</h5>
                    <button type="button" class="custom-modal-close">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path d="M6 6l12 12M6 18L18 6" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </button>
                </div>
                <div class="custom-modal-body">${settings.content}</div>
                <div class="custom-modal-footer"></div>
            </div>
        `;

        // Remove existing modals
        $('.custom-modal-overlay, .custom-modal').remove();

        // Append modal to body
        $('body').append(modalHTML);

        const $modal = $('.custom-modal');
        const $overlay = $('.custom-modal-overlay');
        const $footer = $modal.find('.custom-modal-footer');

        // Add buttons with enhanced styling
        settings.buttons.forEach(button => {
            const $button = $(`<button type="button" class="btn ${button.class || 'btn-secondary'}">${button.text}</button>`);
            if (button.click) {
                $button.on('click', function(e) {
                    e.preventDefault();
                    button.click.call(this, e);
                });
            }
            $footer.append($button);
        });

        // Show modal with smooth animation
        const show = function() {
            $overlay.show();
            $modal.show();
            // Prevent body scroll when modal is open
            $('body').css('overflow', 'hidden');
        };

        // Hide modal with smooth animation
        const hide = function() {
            $modal.css('animation', 'slideOut 0.3s ease-in-out');
            $overlay.css('animation', 'fadeOut 0.3s ease-in-out');
            
            setTimeout(() => {
                $overlay.remove();
                $modal.remove();
                $('body').css('overflow', '');
                if (settings.onClose) {
                    settings.onClose();
                }
            }, 280);
        };

        // Close button event
        $modal.find('.custom-modal-close').on('click', hide);
        
        // Close on overlay click with a slight delay
        $overlay.on('click', function(e) {
            if (e.target === this) {
                hide();
            }
        });

        // Close on Escape key
        $(document).on('keydown.customModal', function(e) {
            if (e.key === 'Escape') {
                hide();
            }
        });

        // Return modal API
        return {
            show: show,
            hide: hide,
            $modal: $modal,
            $overlay: $overlay
        };
    };
})(jQuery);