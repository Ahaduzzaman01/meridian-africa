/**
 * Contact Form Section JavaScript
 * Handles form submission, validation, and user interactions
 *
 * @package Meridian_Africa
 * @since 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Initialize contact form functionality
     */
    function initContactForm() {
        const contactForm = document.getElementById('contactForm');
        const formMessage = document.getElementById('formMessage');

        if (!contactForm) {
            return;
        }

        // Form submission handler
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Clear previous messages
            if (formMessage) {
                formMessage.className = 'form-message';
                formMessage.textContent = '';
            }

            // Get form data
            const formData = new FormData(contactForm);
            const data = {
                fullName: formData.get('fullName'),
                position: formData.get('position'),
                email: formData.get('email'),
                organization: formData.get('organization'),
                organizationType: formData.get('organizationType'),
                country: formData.get('country'),
                beneficiaries: formData.get('beneficiaries'),
                context: formData.get('context')
            };

            // Show loading state
            const submitBtn = contactForm.querySelector('.btn-submit-contact');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Sending...</span>';
                submitBtn.disabled = true;

                try {
                    // Simulate form submission (replace with actual API call)
                    await simulateFormSubmission(data);

                    // Show success message
                    if (formMessage) {
                        formMessage.className = 'form-message success';
                        formMessage.textContent = '✓ Thank you! Your message has been sent successfully. We\'ll get back to you soon.';
                        
                        // Scroll to message
                        formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

                        // Hide message after 5 seconds
                        setTimeout(function() {
                            formMessage.className = 'form-message';
                        }, 5000);
                    }

                    // Reset form
                    contactForm.reset();

                } catch (error) {
                    if (formMessage) {
                        formMessage.className = 'form-message error';
                        formMessage.textContent = '✗ Error sending message. Please try again later.';
                    }
                } finally {
                    // Restore button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            }
        });

        // Form input listeners for better UX
        const formInputs = contactForm.querySelectorAll('.form-input-contact, .form-textarea-contact, .form-select-contact');
        formInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                if (input.value.trim()) {
                    input.classList.remove('error');
                }
            });

            input.addEventListener('focus', function() {
                input.classList.remove('error');
            });
        });
    }

    /**
     * Simulate form submission
     * In production, replace this with actual AJAX call to WordPress backend
     *
     * @param {Object} data Form data
     * @returns {Promise}
     */
    function simulateFormSubmission(data) {
        return new Promise(function(resolve, reject) {
            // Simulate API call delay
            setTimeout(function() {
                // In a real application, you would send this data to your backend
                console.log('Form submitted with data:', data);
                
                // You can integrate with WordPress AJAX here
                // Example:
                // $.ajax({
                //     url: meridian_ajax.ajax_url,
                //     type: 'POST',
                //     data: {
                //         action: 'meridian_contact_form_submit',
                //         nonce: meridian_ajax.nonce,
                //         form_data: data
                //     },
                //     success: function(response) {
                //         resolve(response);
                //     },
                //     error: function(error) {
                //         reject(error);
                //     }
                // });
                
                // Simulate random success/failure for demo
                if (Math.random() > 0.1) {
                    resolve();
                } else {
                    reject(new Error('Submission failed'));
                }
            }, 1500);
        });
    }

    /**
     * Validate email format
     *
     * @param {string} email Email address to validate
     * @returns {boolean}
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initContactForm();
    });

    /**
     * Re-initialize when Elementor preview is loaded
     */
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/meridian-contact-form-section.default', function($scope) {
            initContactForm();
        });
    });

})(jQuery);

