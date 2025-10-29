// FAQ Accordion Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    const faqSearch = document.getElementById('faqSearch');

    // Enhanced Accordion toggle with smooth animation
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', function(e) {
            e.preventDefault();

            // Close other items in the same category
            const category = item.closest('.faq-category');
            const categoryItems = category.querySelectorAll('.faq-item');

            categoryItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });

            // Toggle current item with smooth animation
            item.classList.toggle('active');

            // Check if content is scrollable and add class
            if (item.classList.contains('active')) {
                const answer = item.querySelector('.faq-answer');
                setTimeout(() => {
                    if (answer.scrollHeight > answer.clientHeight) {
                        answer.classList.add('has-scroll');
                    } else {
                        answer.classList.remove('has-scroll');
                    }

                    // Scroll into view
                    item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } else {
                const answer = item.querySelector('.faq-answer');
                answer.classList.remove('has-scroll');
            }
        });

        // Keyboard accessibility - Enter and Space keys
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                question.click();
            }
        });
    });

    // Enhanced Search functionality with debouncing
    

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Add animation on page load
    const animateOnLoad = () => {
        faqItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';

            setTimeout(() => {
                item.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, index * 50);
        });
    };

    // Trigger animation after a small delay
    setTimeout(animateOnLoad, 100);

    // Handle scroll detection for fade indicator
    faqItems.forEach(item => {
        const answer = item.querySelector('.faq-answer');

        answer.addEventListener('scroll', function() {
            const isScrolledToBottom = this.scrollHeight - this.scrollTop <= this.clientHeight + 10;

            if (isScrolledToBottom) {
                this.classList.remove('has-scroll');
            } else if (this.scrollHeight > this.clientHeight) {
                this.classList.add('has-scroll');
            }
        });
    });

    // Check scroll on window resize
    window.addEventListener('resize', function() {
        faqItems.forEach(item => {
            if (item.classList.contains('active')) {
                const answer = item.querySelector('.faq-answer');
                setTimeout(() => {
                    if (answer.scrollHeight > answer.clientHeight) {
                        const isScrolledToBottom = answer.scrollHeight - answer.scrollTop <= answer.clientHeight + 10;
                        if (!isScrolledToBottom) {
                            answer.classList.add('has-scroll');
                        }
                    } else {
                        answer.classList.remove('has-scroll');
                    }
                }, 100);
            }
        });
    });
});

