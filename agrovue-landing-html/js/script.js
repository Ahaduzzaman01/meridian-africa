// ===========================
// PAGE NAVIGATION SYSTEM
// ===========================

const pages = {
    home: 'home',
    features: 'features',
    solutions: 'solutions',
    about: 'about',
    pricing: 'pricing',
    contact: 'contact',
    login: 'login',
    signup: 'signup',
    demo: 'demo',
    docs: 'docs',
    blog: 'blog',
    privacy: 'privacy',
    terms: 'terms',
    security: 'security',
    compliance: 'compliance',
    cookies: 'cookies',
    careers: 'careers'
};

// Handle page navigation
document.querySelectorAll('[data-page]').forEach(link => {
    link.addEventListener('click', (e) => {
        const page = link.getAttribute('data-page');
        if (page && pages[page]) {
            console.log(`Navigating to: ${page}`);
            // In a real app, this would navigate to the actual page
            // For now, we'll just scroll to the section if it exists
            const section = document.getElementById(page);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

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

            // Close mobile menu if open
            if (navMenu && navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
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

    if (scrollTop > 50) {
        navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.12)';
    } else {
        navbar.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.08)';
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});

// ===========================
// INTERSECTION OBSERVER FOR ANIMATIONS
// ===========================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all animated elements
document.querySelectorAll(
    '.benefit-card, .feature-card, .solution-card, .testimonial-card, .pricing-card, .tech-item, .metric-card'
).forEach(element => {
    observer.observe(element);
});

// ===========================
// SCROLL REVEAL ANIMATIONS
// ===========================

const revealElements = document.querySelectorAll('.section-header, .hero-content, .hero-visual');
revealElements.forEach(element => {
    observer.observe(element);
});

// ===========================
// COUNTER ANIMATION FOR METRICS
// ===========================

function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const originalText = element.textContent;
    const hasPlus = originalText.includes('+');
    const hasDollar = originalText.includes('$');
    const increment = target / (duration / 16);

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        let displayValue = Math.floor(current).toLocaleString();
        if (hasDollar) displayValue = '$' + displayValue;
        if (hasPlus) displayValue = displayValue + '+';
        element.textContent = displayValue;
    }, 16);
}

// Trigger counter animation when metrics section is visible
const metricsSection = document.querySelector('.metrics');
let metricsAnimated = false;

if (metricsSection) {
    const metricsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !metricsAnimated) {
                metricsAnimated = true;
                const metricNumbers = entry.target.querySelectorAll('.metric-number');
                metricNumbers.forEach(element => {
                    const text = element.textContent;
                    const number = parseInt(text.replace(/[^0-9]/g, ''));

                    if (!isNaN(number)) {
                        animateCounter(element, number, 2500);
                    }
                });
                metricsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    metricsObserver.observe(metricsSection);
}

// ===========================
// FORM HANDLING (PLACEHOLDER)
// ===========================

// Add event listeners to CTA buttons for demo purposes
document.querySelectorAll('[href="#signup"], [href="#demo"], [href="#contact"]').forEach(link => {
    link.addEventListener('click', (e) => {
        const page = link.getAttribute('data-page') || link.getAttribute('href').substring(1);
        console.log(`CTA clicked: ${page}`);
        // In a real application, this would open a modal or redirect to a form
    });
});

// ===========================
// DROPDOWN MENU MOBILE SUPPORT
// ===========================

const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
    const link = dropdown.querySelector('.nav-link');
    if (link) {
        link.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) {
                    menu.classList.toggle('active');
                }
            }
        });
    }
});

// ===========================
// RESPONSIVE ADJUSTMENTS
// ===========================

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        if (navMenu) {
            navMenu.classList.remove('active');
        }
        if (hamburger) {
            hamburger.classList.remove('active');
        }
        // Close all dropdown menus
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.remove('active');
        });
    }
});

// ===========================
// LAZY LOADING FOR IMAGES
// ===========================

if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
}

// ===========================
// ACCESSIBILITY IMPROVEMENTS
// ===========================

// Add keyboard navigation support
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        if (navMenu && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
        }
        if (hamburger) {
            hamburger.classList.remove('active');
        }
        // Close all dropdown menus
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.remove('active');
        });
    }
});

// ===========================
// ACTIVE LINK HIGHLIGHTING
// ===========================

function updateActiveLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
}

window.addEventListener('scroll', updateActiveLink);

// ===========================
// FOOTER CONTACT FORM HANDLING
// ===========================

const footerContactForm = document.getElementById('footerContactForm');
const footerFormMessage = document.getElementById('footerFormMessage');

if (footerContactForm) {
    footerContactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        // Get form data
        const formData = new FormData(footerContactForm);
        const data = {
            name: formData.get('name'),
            email: formData.get('email'),
            issueType: formData.get('issueType'),
            message: formData.get('message'),
            files: formData.getAll('fileUpload')
        };

        // Show loading state
        const submitBtn = footerContactForm.querySelector('.btn-submit-modern');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Sending...</span>';
        submitBtn.disabled = true;

        // Simulate form submission (replace with actual API call)
        try {
            // Simulate API delay
            await new Promise(resolve => setTimeout(resolve, 1500));

            // Show success message
            footerFormMessage.textContent = '✓ Thank you! Your support request has been submitted successfully. We\'ll get back to you soon.';
            footerFormMessage.className = 'form-message-modern success';

            // Reset form
            footerContactForm.reset();

            // Reset file upload label
            const fileLabel = document.querySelector('.file-text-modern');
            if (fileLabel) {
                fileLabel.textContent = 'Choose files to upload';
            }

            // Hide message after 5 seconds
            setTimeout(() => {
                footerFormMessage.className = 'form-message-modern';
            }, 5000);

        } catch (error) {
            // Show error message
            footerFormMessage.textContent = '✗ Error submitting request. Please try again later.';
            footerFormMessage.className = 'form-message-modern error';

            // Hide message after 5 seconds
            setTimeout(() => {
                footerFormMessage.className = 'form-message-modern';
            }, 5000);
        } finally {
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });

    // File upload handling
    const footerFileInput = document.getElementById('footerFileUpload');
    const footerFileLabel = document.querySelector('.file-text-modern');

    if (footerFileInput && footerFileLabel) {
        footerFileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files.length > 0) {
                if (files.length === 1) {
                    footerFileLabel.textContent = files[0].name;
                } else {
                    footerFileLabel.textContent = `${files.length} files selected`;
                }
            } else {
                footerFileLabel.textContent = 'Choose files to upload';
            }
        });
    }
}

// ===========================
// LIVE CHAT FUNCTION
// ===========================

function openLiveChat() {
    // Placeholder for live chat functionality
    // In production, this would integrate with a live chat service like Intercom, Drift, etc.
    alert('Live chat feature coming soon! For now, please contact us via email at jhondoe@merdianfrica.io or call +234 (123) 456-7890');

    // Example integration with a chat service:
    // if (window.Intercom) {
    //     window.Intercom('show');
    // }
}

// ===========================
// SCROLL-TRIGGERED IMAGE SECTION - APPLE STYLE
// ===========================

function initScrollImageSection() {
    const section = document.querySelector('.scroll-image-section');
    const contentBlocks = document.querySelectorAll('.content-block');
    const scrollImages = document.querySelectorAll('.scroll-image');

    if (!section || contentBlocks.length === 0 || scrollImages.length === 0) {
        return; // Exit if elements don't exist
    }

    // Function to update active image based on scroll position
    function updateActiveImage() {
        const scrollPosition = window.scrollY;
        const windowHeight = window.innerHeight;
        const sectionTop = section.offsetTop;

        // Find which content block is most visible in viewport
        let activeIndex = 0;
        let maxVisibility = 0;

        contentBlocks.forEach((block, index) => {
            const blockTop = block.getBoundingClientRect().top + scrollPosition;
            const blockBottom = blockTop + block.offsetHeight;

            // Calculate visibility
            const viewportTop = scrollPosition;
            const viewportBottom = scrollPosition + windowHeight;

            const visibleTop = Math.max(blockTop, viewportTop);
            const visibleBottom = Math.min(blockBottom, viewportBottom);
            const visibleHeight = Math.max(0, visibleBottom - visibleTop);
            const visibility = visibleHeight / windowHeight;

            // Check if block is in center of viewport
            const blockCenter = blockTop + (block.offsetHeight / 2);
            const viewportCenter = scrollPosition + (windowHeight / 2);
            const distanceFromCenter = Math.abs(blockCenter - viewportCenter);

            // Prioritize blocks near center with good visibility
            if (visibility > 0.3 && distanceFromCenter < windowHeight / 2) {
                if (visibility > maxVisibility) {
                    maxVisibility = visibility;
                    activeIndex = index;
                }
                block.classList.add('active');
            } else {
                block.classList.remove('active');
            }
        });

        // Update active image based on most visible content block
        const imageIndex = contentBlocks[activeIndex].getAttribute('data-image');
        scrollImages.forEach(img => {
            if (img.getAttribute('data-index') === imageIndex) {
                img.classList.add('active');
            } else {
                img.classList.remove('active');
            }
        });
    }

    // Throttle scroll events for better performance
    let ticking = false;
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateActiveImage();
                ticking = false;
            });
            ticking = true;
        }
    }

    // Listen to scroll events
    window.addEventListener('scroll', onScroll, { passive: true });

    // Initial call
    updateActiveImage();

    // Update on resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateActiveImage, 100);
    });
}

// Initialize when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollImageSection);
} else {
    initScrollImageSection();
}

// ===========================
// PLATFORM MODAL FUNCTIONALITY
// ===========================

const platformModalData = {
    1: {
        title: "Field Boundary Detection",
        subtitle: "Precision mapping for agricultural intelligence",
        headerImage: "image/0ne.avif",
        section1Title: "Advanced Satellite Technology",
        section1Description: "Our platform utilizes cutting-edge satellite imagery and AI-powered algorithms to automatically detect and map field boundaries with exceptional accuracy. This technology enables precise farm area measurement, eliminates manual surveying costs, and provides reliable data for subsidy verification and agricultural program management across diverse landscapes.",
        section2Title: "Seamless Data Integration",
        section2Description: "Field boundary data is delivered in multiple formats including GeoJSON, Shapefile, KML, and GeoTIFF, ensuring compatibility with your existing GIS systems and agricultural management platforms. Our API enables real-time integration, while batch processing supports large-scale government programs covering thousands of farms simultaneously.",
        // image: "image/0ne.avif"
    },
    2: {
        title: "Crop Classification & Identification",
        subtitle: "AI-powered crop type detection for African agriculture",
        headerImage: "image/two.png",
        section1Title: "Comprehensive Crop Intelligence",
        section1Description: "Our advanced classification system accurately identifies major crop types including maize, rice, wheat, cassava, sorghum, millet, groundnuts, and various vegetables. Specifically designed for African agricultural systems, the platform recognizes intercropping patterns, mixed farming practices, and smallholder field characteristics that are common across the continent.",
        section2Title: "Proven Accuracy & Reliability",
        section2Description: "Built on machine learning models trained with extensive ground truth data from multiple African regions, our system achieves over 80% accuracy in crop identification. The technology supports agricultural planning, subsidy targeting, market forecasting, and food security assessments by providing reliable crop distribution data at scale.",
        // image: "image/two.png"
    },
    3: {
        title: "Crop Health & Stress Monitoring",
        subtitle: "Real-time vegetation health tracking and early warning",
        headerImage: "image/three.png",
        section1Title: "Continuous Health Assessment",
        section1Description: "Monitor crop health throughout the growing season with satellite updates every 3-5 days. Our platform analyzes vegetation indices (NDVI, EVI, SAVI) to detect early signs of drought stress, nutrient deficiency, pest damage, and disease outbreaks. This enables timely interventions, targeted extension services, and proactive farm management decisions.",
        section2Title: "Intelligent Alert System",
        section2Description: "Automated anomaly detection algorithms identify unusual vegetation patterns and trigger instant alerts to agricultural officers and farmers. The system compares current conditions against historical baselines and neighboring fields, providing context-aware insights that help prevent crop losses and optimize resource allocation for maximum impact.",
        // image: "image/three.png"
    },
    4: {
        title: "Yield Prediction & Forecasting",
        subtitle: "Data-driven harvest estimates for planning and policy",
        headerImage: "image/four.webp",
        section1Title: "Pre-Harvest Intelligence",
        section1Description: "Our predictive models estimate crop yields weeks before harvest using satellite-derived vegetation indices, weather data, and historical yield patterns. These forecasts provide critical information for food security planning, market price stabilization, import/export decisions, and agricultural policy formulation at national and regional levels.",
        section2Title: "Supporting Food Security",
        section2Description: "Enable governments, development agencies, and agricultural institutions to make informed decisions about food reserves, market interventions, and emergency response. Our yield predictions help prevent food crises, optimize resource distribution, and support evidence-based agricultural development programs across Africa.",
        // image: "image/four.webp"
    },
    5: {
        title: "Planting & Harvest Date Detection",
        subtitle: "Automated crop calendar tracking and compliance monitoring",
        headerImage: "image/five.webp",
        section1Title: "Phenological Monitoring",
        section1Description: "Automatically detect planting and harvest dates through advanced analysis of vegetation patterns and phenological changes. Our system tracks crop development stages throughout the season, providing accurate timing data essential for agricultural program compliance, insurance verification, and subsidy distribution management.",
        section2Title: "Program Compliance & Climate Insights",
        section2Description: "Verify farmer compliance with program timing requirements without costly field visits. Track phenological shifts caused by climate change to inform adaptive agricultural strategies. This capability supports subsidy programs, crop insurance, development initiatives, and climate adaptation planning with objective, verifiable timing documentation.",
        // image: "image/five.webp"
    },
    6: {
        title: "Rangeland & Pasture Monitoring",
        subtitle: "Pastoral resource management and drought early warning",
        headerImage: "image/seven.png",
        section1Title: "Comprehensive Rangeland Intelligence",
        section1Description: "Monitor vast rangeland areas with satellite-based assessments of forage biomass, grazing capacity, vegetation cover, and water point availability. Our platform provides critical information for pastoral communities, livestock management, and early warning systems, enabling sustainable rangeland use and drought preparedness across Africa.",
        section2Title: "Protecting Pastoral Livelihoods",
        section2Description: "Support pastoral communities with timely information on rangeland conditions, drought severity, and forage availability. The system helps prevent livestock losses, guides migration planning, enables effective drought response, and supports sustainable pastoral development by providing regular updates on critical rangeland resources.",
        // image: "image/seven.png"
    }
};

function openPlatformModal(capabilityId) {
    const modal = document.getElementById('platformModal');
    const data = platformModalData[capabilityId];

    if (!data) return;

    // Populate modal content
    document.getElementById('modalTitle').textContent = data.title;
    document.getElementById('modalSubtitle').textContent = data.subtitle;
    document.getElementById('modalHeaderImage').style.backgroundImage = `url('${data.headerImage}')`;
    document.getElementById('modalSectionTitle1').textContent = data.section1Title;
    document.getElementById('modalDescription1').textContent = data.section1Description;
    document.getElementById('modalSectionTitle2').textContent = data.section2Title;
    document.getElementById('modalDescription2').textContent = data.section2Description;
    document.getElementById('modalImage').src = data.image;

    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closePlatformModal() {
    const modal = document.getElementById('platformModal');
    modal.classList.remove('active');
    document.body.style.overflow = '';
}

// Close modal on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closePlatformModal();
    }
});

// ===========================
// INITIALIZATION
// ===========================

console.log('🌾 AgroVue Landing Page Loaded Successfully');
console.log('Version: 2.0 - Premium Design with Animations');

