/**
 * Modern Contact Form Section JavaScript
 * 
 * Handles form submission and validation for the Modern Contact Form Section widget.
 * Extracted from agrovue-landing-html/js/script.js
 * 
 * @package Meridian_Africa
 * @since 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Initialize the modern contact form
     */
    function initModernContactForm() {
        const footerContactForm = document.getElementById('footerContactForm');
        const footerFormMessage = document.getElementById('footerFormMessage');

        if (!footerContactForm) {
            return;
        }

        // Form submission handler
        footerContactForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Clear previous messages
            if (footerFormMessage) {
                footerFormMessage.className = 'form-message-modern';
                footerFormMessage.textContent = '';
            }

            // Get form data
            const formData = new FormData(footerContactForm);
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
            const submitBtn = footerContactForm.querySelector('.btn-submit-modern');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Sending...</span>';
            submitBtn.disabled = true;

            try {
                // Simulate form submission (replace with actual API call)
                await simulateFormSubmission(data);

                // Show success message
                if (footerFormMessage) {
                    footerFormMessage.textContent = '✓ Thank you! Your consultation request has been submitted successfully. We\'ll get back to you soon.';
                    footerFormMessage.className = 'form-message-modern success';
                }

                // Reset form
                footerContactForm.reset();

                // Scroll to message
                if (footerFormMessage) {
                    footerFormMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }

                // Hide message after 5 seconds
                setTimeout(function() {
                    if (footerFormMessage) {
                        footerFormMessage.className = 'form-message-modern';
                    }
                }, 5000);

            } catch (error) {
                // Show error message
                if (footerFormMessage) {
                    footerFormMessage.textContent = '✗ Error submitting request. Please try again later.';
                    footerFormMessage.className = 'form-message-modern error';
                }

                // Hide message after 5 seconds
                setTimeout(function() {
                    if (footerFormMessage) {
                        footerFormMessage.className = 'form-message-modern';
                    }
                }, 5000);
            } finally {
                // Restore button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });

        // Form input listeners for better UX
        const formInputs = footerContactForm.querySelectorAll('.form-input-modern, .form-textarea-modern, .form-select-modern');
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

        // File upload handling (if file upload is added in the future)
        const footerFileInput = document.getElementById('footerFileUpload');
        const footerFileLabel = document.querySelector('.file-text-modern');

        if (footerFileInput && footerFileLabel) {
            footerFileInput.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files.length > 0) {
                    if (files.length === 1) {
                        footerFileLabel.textContent = files[0].name;
                    } else {
                        footerFileLabel.textContent = files.length + ' files selected';
                    }
                } else {
                    footerFileLabel.textContent = 'Choose files to upload';
                }
            });
        }
    }

    /**
     * Simulate form submission
     * In production, replace this with actual WordPress AJAX call
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
                //         action: 'meridian_modern_contact_form_submit',
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
        initModernContactForm();
    });

    /**
     * Re-initialize when Elementor preview is loaded
     */
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/meridian-modern-contact-form-section.default', function($scope) {
            initModernContactForm();
        });
    });

})(jQuery);

