// ===========================
// CONTACT FORM HANDLING
// ===========================

const contactForm = document.getElementById('contactForm');
const formMessage = document.getElementById('formMessage');

if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Clear previous messages
        formMessage.className = '';
        formMessage.textContent = '';

        // Get form data
        const formData = new FormData(contactForm);
        const data = {
            fullName: formData.get('fullName'),
            email: formData.get('email'),
            issueType: formData.get('issueType'),
            message: formData.get('message')
        };

        // Show loading state
        const submitBtn = contactForm.querySelector('.btn-submit-contact');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Sending...</span>';
        submitBtn.disabled = true;

        try {
            // Simulate form submission (replace with actual API call)
            await simulateFormSubmission(data);

            // Show success message
            formMessage.className = 'form-message success';
            formMessage.textContent = '✓ Thank you! Your message has been sent successfully. We\'ll get back to you soon.';

            // Reset form
            contactForm.reset();

            // Scroll to message
            formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Hide message after 5 seconds
            setTimeout(() => {
                formMessage.className = '';
            }, 5000);

        } catch (error) {
            formMessage.className = 'form-message error';
            formMessage.textContent = '✗ Error sending message. Please try again later.';
        } finally {
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
}

// ===========================
// FORM VALIDATION
// ===========================

function validateForm() {
    const fields = [
        { id: 'fullName', type: 'text', message: 'Full name is required' },
        { id: 'email', type: 'email', message: 'Valid email is required' },
        { id: 'issueType', type: 'select', message: 'Please select an issue type' },
        { id: 'message', type: 'text', message: 'Message is required' }
    ];

    let isValid = true;

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorSpan = input.parentElement.querySelector('.form-error');

        if (!input.value.trim()) {
            showError(input, errorSpan, field.message);
            isValid = false;
        } else if (field.type === 'email' && !isValidEmail(input.value)) {
            showError(input, errorSpan, 'Please enter a valid email address');
            isValid = false;
        } else {
            clearError(input, errorSpan);
        }
    });

    return isValid;
}

function showError(input, errorSpan, message) {
    input.classList.add('error');
    if (errorSpan) {
        errorSpan.textContent = message;
        errorSpan.classList.add('show');
    }
}

function clearError(input, errorSpan) {
    input.classList.remove('error');
    if (errorSpan) {
        errorSpan.textContent = '';
        errorSpan.classList.remove('show');
    }
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// ===========================
// FORM INPUT LISTENERS
// ===========================

const formInputs = document.querySelectorAll('.form-input, .form-textarea');
formInputs.forEach(input => {
    input.addEventListener('blur', () => {
        const errorSpan = input.parentElement.querySelector('.form-error');
        if (input.value.trim()) {
            clearError(input, errorSpan);
        }
    });

    input.addEventListener('focus', () => {
        const errorSpan = input.parentElement.querySelector('.form-error');
        clearError(input, errorSpan);
    });
});

// ===========================
// SIMULATE FORM SUBMISSION
// ===========================

function simulateFormSubmission(data) {
    return new Promise((resolve, reject) => {
        // Simulate API call delay
        setTimeout(() => {
            // In a real application, you would send this data to your backend
            console.log('Form submitted with data:', data);
            
            // Simulate random success/failure for demo
            if (Math.random() > 0.1) {
                resolve();
            } else {
                reject(new Error('Submission failed'));
            }
        }, 1500);
    });
}

// ===========================
// FAQ ACCORDION
// ===========================

const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    
    question.addEventListener('click', () => {
        // Close other items
        faqItems.forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('active')) {
                otherItem.classList.remove('active');
            }
        });

        // Toggle current item
        item.classList.toggle('active');
    });
});

// ===========================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ===========================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            const target = document.querySelector(href);
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ===========================
// FILE UPLOAD HANDLING
// ===========================

const fileInput = document.getElementById('fileUpload');
const fileUploadLabel = document.querySelector('.file-text-contact');

if (fileInput && fileUploadLabel) {
    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files.length > 0) {
            if (files.length === 1) {
                fileUploadLabel.textContent = files[0].name;
            } else {
                fileUploadLabel.textContent = `${files.length} files selected`;
            }
        } else {
            fileUploadLabel.textContent = 'Choose files to upload';
        }
    });
}

// Reset file upload label on form reset
if (contactForm) {
    contactForm.addEventListener('reset', () => {
        if (fileUploadLabel) {
            fileUploadLabel.textContent = 'Choose files to upload';
        }
    });
}

// ===========================
// MOBILE MENU TOGGLE
// ===========================

const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
    });
}

// Close menu when a link is clicked
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (navMenu) {
            navMenu.classList.remove('active');
            if (hamburger) {
                hamburger.classList.remove('active');
            }
        }
    });
});

// ===========================
// NAVBAR SCROLL EFFECT
// ===========================

const navbar = document.querySelector('.navbar');
let lastScrollTop = 0;

window.addEventListener('scroll', () => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});

