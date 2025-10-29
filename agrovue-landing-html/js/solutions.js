// ===========================
// SOLUTIONS PAGE FUNCTIONALITY
// ===========================

// Tab Navigation
const solutionTabs = document.querySelectorAll('.solution-tab');
const solutionSections = document.querySelectorAll('.solution-detail-section');

// Function to activate a specific tab and section
function activateTab(targetTab) {
    // Remove active class from all tabs
    solutionTabs.forEach(t => t.classList.remove('active'));

    // Remove active class from all sections
    solutionSections.forEach(s => s.classList.remove('active'));

    // Add active class to the target tab
    targetTab.classList.add('active');

    // Add active class to the corresponding section
    const targetId = targetTab.getAttribute('href').substring(1);
    const targetSection = document.getElementById(targetId);
    if (targetSection) {
        targetSection.classList.add('active');
    }
}

// Function to scroll to section
function scrollToSection(sectionId) {
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        // Calculate offset for navbar
        const navbarHeight = document.querySelector('.navbar')?.offsetHeight || 0;
        const tabsHeight = document.querySelector('.solutions-nav-section')?.offsetHeight || 0;
        const offset = navbarHeight + tabsHeight + 20;

        const elementPosition = targetSection.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
}

// Add click event listeners to tabs
solutionTabs.forEach(tab => {
    tab.addEventListener('click', (e) => {
        e.preventDefault();

        // Get the target section ID
        const targetId = tab.getAttribute('href').substring(1);

        // Activate the clicked tab
        activateTab(tab);

        // Scroll to the target section
        scrollToSection(targetId);
    });
});

// Update active tab on scroll
let scrollTimeout;
window.addEventListener('scroll', () => {
    // Debounce scroll event for better performance
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
        let current = '';
        const navbarHeight = document.querySelector('.navbar')?.offsetHeight || 0;
        const tabsHeight = document.querySelector('.solutions-nav-section')?.offsetHeight || 0;
        const scrollOffset = navbarHeight + tabsHeight + 100;

        solutionSections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (window.pageYOffset >= sectionTop - scrollOffset) {
                current = section.getAttribute('id');
            }
        });

        // Update active tab and section based on current section
        if (current) {
            // Update tabs
            solutionTabs.forEach(tab => {
                tab.classList.remove('active');
                if (tab.getAttribute('href') === `#${current}`) {
                    tab.classList.add('active');
                }
            });

            // Update sections
            solutionSections.forEach(section => {
                section.classList.remove('active');
                if (section.getAttribute('id') === current) {
                    section.classList.add('active');
                }
            });
        }
    }, 50);
});

// Smooth scroll for anchor links
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

// Add animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe solution detail sections
solutionSections.forEach(section => {
    observer.observe(section);
});

// Initialize active tab on page load
function initializeActiveTab() {
    // Check if there's a hash in the URL
    const hash = window.location.hash;

    if (hash) {
        // Find the tab that matches the hash
        const targetTab = document.querySelector(`.solution-tab[href="${hash}"]`);
        if (targetTab) {
            activateTab(targetTab);
            // Scroll to section after a short delay to ensure page is loaded
            setTimeout(() => {
                scrollToSection(hash.substring(1));
            }, 300);
        }
    } else {
        // Default to first tab (Farmers) if no hash
        const firstTab = document.querySelector('.solution-tab');
        if (firstTab) {
            activateTab(firstTab);
        }
    }
}

// Call initialization when DOM is fully loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeActiveTab);
} else {
    initializeActiveTab();
}

// Mobile menu handling
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

