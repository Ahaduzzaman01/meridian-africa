// ===========================
// FOUNDERS PAGE JAVASCRIPT
// ===========================

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100,
        easing: 'ease-in-out'
    });

    // Smooth scroll for scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const profileSection = document.querySelector('.founder-profile');
            if (profileSection) {
                profileSection.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Parallax effect for hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroPattern = document.querySelector('.hero-pattern');
        const heroGradient = document.querySelector('.hero-gradient');
        
        if (heroPattern) {
            heroPattern.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
        
        if (heroGradient) {
            heroGradient.style.opacity = 1 - (scrolled / 500);
        }
    });

    // Animate stats on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);

    const statItems = document.querySelectorAll('.stat-item');
    statItems.forEach(item => {
        statsObserver.observe(item);
    });

    // Animate expertise tags on hover
    const tags = document.querySelectorAll('.tag');
    tags.forEach(tag => {
        tag.addEventListener('mouseenter', function() {
            this.style.animation = 'pulse 0.5s ease';
        });
        
        tag.addEventListener('animationend', function() {
            this.style.animation = '';
        });
    });

    // Timeline animation on scroll
    const timelineObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('timeline-visible');
            }
        });
    }, {
        threshold: 0.3
    });

    const timelineItems = document.querySelectorAll('.timeline-item');
    timelineItems.forEach(item => {
        timelineObserver.observe(item);
    });

    // Add pulse animation to mission/vision cards
    const mvCards = document.querySelectorAll('.mv-card');
    mvCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });

    // Social links hover effect
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.1) rotate(5deg)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1) rotate(0deg)';
        });
    });

    // Add dynamic gradient to hero title
    const heroTitle = document.querySelector('.founder-hero-title');
    if (heroTitle) {
        let hue = 0;
        setInterval(() => {
            hue = (hue + 1) % 360;
            const highlight = heroTitle.querySelector('.hero-highlight');
            if (highlight) {
                // Keep the green color consistent with brand
                highlight.style.color = '#2e8f33';
            }
        }, 50);
    }

    // Animate profile image on scroll
    const profileImageContainer = document.querySelector('.profile-image-container');
    if (profileImageContainer) {
        window.addEventListener('scroll', function() {
            const rect = profileImageContainer.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            
            if (rect.top < windowHeight && rect.bottom > 0) {
                const scrollProgress = (windowHeight - rect.top) / (windowHeight + rect.height);
                const rotation = (scrollProgress - 0.5) * 5; // Subtle rotation
                profileImageContainer.style.transform = `translateY(-10px) rotate(${rotation}deg)`;
            }
        });
    }

    // Add typing effect to founder name (optional - can be enabled)
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.textContent = '';
        
        function type() {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        
        type();
    }

    // Intersection observer for CTA section
    const ctaSection = document.querySelector('.founder-cta');
    if (ctaSection) {
        const ctaObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('cta-visible');
                }
            });
        }, {
            threshold: 0.3
        });
        
        ctaObserver.observe(ctaSection);
    }

    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add custom cursor effect for interactive elements
    const interactiveElements = document.querySelectorAll('a, button, .tag, .mv-card, .timeline-content');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            document.body.style.cursor = 'pointer';
        });
        
        element.addEventListener('mouseleave', function() {
            document.body.style.cursor = 'default';
        });
    });

    // Lazy load images with fade-in effect
    const images = document.querySelectorAll('img');
    const imageObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.style.opacity = '0';
                img.style.transition = 'opacity 0.5s ease';
                
                img.onload = function() {
                    img.style.opacity = '1';
                };
                
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        imageObserver.observe(img);
    });

    // Add scroll progress indicator
    function updateScrollProgress() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight - windowHeight;
        const scrolled = window.pageYOffset;
        const progress = (scrolled / documentHeight) * 100;
        
        // You can add a progress bar element if needed
        // progressBar.style.width = progress + '%';
    }

    window.addEventListener('scroll', updateScrollProgress);

    // Console log for debugging
    console.log('Founders page initialized successfully');
});

// Add CSS for ripple effect dynamically
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    .timeline-visible {
        animation: slideInTimeline 0.6s ease forwards;
    }
    
    @keyframes slideInTimeline {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    // .cta-visible {
    //     animation: fadeInScale 0.8s ease forwards;
    // }
`;
document.head.appendChild(style);

