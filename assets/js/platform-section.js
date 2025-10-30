/**
 * Platform Section JavaScript
 * 
 * Handles the platform modal functionality for the Platform Section widget
 * Extracted from agrovue-landing-html/js/script.js
 * 
 * @package Meridian_Africa
 * @since 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Platform Modal Data
     * Contains all the content for each capability modal
     */
    const platformModalData = {
        1: {
            title: "Field Boundary Detection",
            subtitle: "Precision mapping for agricultural intelligence",
            headerImage: "image/0ne.avif",
            section1Title: "Advanced Satellite Technology",
            section1Description: "Our platform utilizes cutting-edge satellite imagery and AI-powered algorithms to automatically detect and map field boundaries with exceptional accuracy. This technology enables precise farm area measurement, eliminates manual surveying costs, and provides reliable data for subsidy verification and agricultural program management across diverse landscapes.",
            section2Title: "Seamless Data Integration",
            section2Description: "Integrate boundary detection results directly into your existing agricultural management systems. Our API-first approach ensures compatibility with government databases, financial institutions, and agricultural extension services, enabling real-time verification and reducing administrative overhead.",
            image: "image/nine.png"
        },
        2: {
            title: "Crop Type Classification",
            subtitle: "AI-powered crop identification at scale",
            headerImage: "image/two.avif",
            section1Title: "Machine Learning Excellence",
            section1Description: "Leverage advanced machine learning models trained on African agricultural systems to accurately identify crop types including maize, cassava, sorghum, rice, millet, yams, and groundnuts. Our system detects intercropping patterns common in smallholder farming, providing unprecedented visibility into agricultural diversity.",
            section2Title: "Ground Truth Validation",
            section2Description: "Every classification is validated against extensive ground truth data collected across multiple growing seasons and agro-ecological zones. This ensures high accuracy rates and builds confidence in program verification, subsidy allocation, and agricultural planning decisions.",
            image: "image/ten.png"
        },
        3: {
            title: "Crop Health Monitoring",
            subtitle: "Real-time vegetation health tracking",
            headerImage: "image/three.avif",
            section1Title: "Continuous Monitoring",
            section1Description: "Track vegetation indices throughout the growing season with updates every 5 days. Our system provides early warning for drought stress, pest outbreaks, and crop failure, enabling targeted extension services and timely interventions that protect farmer livelihoods and program investments.",
            section2Title: "Actionable Insights",
            section2Description: "Transform satellite data into actionable insights for agricultural extension officers, program managers, and policymakers. Automated alerts highlight areas requiring immediate attention, while trend analysis supports strategic planning and resource allocation for maximum impact.",
            image: "image/elevenn.png"
        },
        4: {
            title: "Yield Prediction",
            subtitle: "Pre-harvest yield forecasting for planning",
            headerImage: "image/four.webp",
            section1Title: "Predictive Analytics",
            section1Description: "Predict farm-level and aggregated yields pre-harvest using satellite-derived indicators and advanced modeling techniques. Our predictions inform food security planning, import strategies, and price stabilization policies, helping governments and institutions make data-driven decisions.",
            section2Title: "Risk Management",
            section2Description: "Identify yield shortfalls before harvest, enabling proactive response to food security threats. Support insurance programs with objective yield estimates, facilitate early warning systems, and optimize agricultural supply chains through accurate production forecasts.",
            image: "image/four.webp"
        },
        5: {
            title: "Planting/Harvest Dates",
            subtitle: "Automated phenological tracking",
            headerImage: "image/five.webp",
            section1Title: "Pattern Analysis",
            section1Description: "Automatically detect planting and harvest dates through vegetation pattern analysis. Our system verifies compliance with program timing requirements, tracks phenological shifts due to climate change, and provides insights into farmer behavior and agricultural practices.",
            section2Title: "Program Compliance",
            section2Description: "Ensure program participants meet timing requirements without costly field visits. Automated detection of planting and harvest dates enables efficient verification at scale, reduces fraud, and provides objective evidence for subsidy disbursement and program evaluation.",
            image: "image/five.webp"
        },
        6: {
            title: "Rangeland Management",
            subtitle: "Pastoral early warning and resource monitoring",
            headerImage: "image/six.avif",
            section1Title: "Comprehensive Monitoring",
            section1Description: "Estimate forage biomass, calculate grazing capacity, classify drought severity, and map water point availability across vast rangeland areas. Our system provides critical information for pastoral communities, enabling informed decisions about livestock movement and resource management.",
            section2Title: "Early Warning Systems",
            section2Description: "Support pastoral communities with timely information on rangeland conditions, drought severity, and forage availability. The system helps prevent livestock losses, guides migration planning, enables effective drought response, and supports sustainable pastoral development by providing regular updates on critical rangeland resources.",
            image: "image/seven.png"
        }
    };

    /**
     * Open Platform Modal
     * 
     * @param {number} capabilityId - The ID of the capability to display
     */
    window.openPlatformModal = function(capabilityId) {
        const modal = document.getElementById('platformModal');
        const data = platformModalData[capabilityId];

        if (!data) {
            console.warn('Platform modal data not found for capability ID:', capabilityId);
            return;
        }

        // Populate modal content
        const modalTitle = document.getElementById('modalTitle');
        const modalSubtitle = document.getElementById('modalSubtitle');
        const modalHeaderImage = document.getElementById('modalHeaderImage');
        const modalSectionTitle1 = document.getElementById('modalSectionTitle1');
        const modalDescription1 = document.getElementById('modalDescription1');
        const modalSectionTitle2 = document.getElementById('modalSectionTitle2');
        const modalDescription2 = document.getElementById('modalDescription2');
        const modalImage = document.getElementById('modalImage');

        if (modalTitle) modalTitle.textContent = data.title;
        if (modalSubtitle) modalSubtitle.textContent = data.subtitle;
        if (modalHeaderImage) modalHeaderImage.style.backgroundImage = `url('${data.headerImage}')`;
        if (modalSectionTitle1) modalSectionTitle1.textContent = data.section1Title;
        if (modalDescription1) modalDescription1.textContent = data.section1Description;
        if (modalSectionTitle2) modalSectionTitle2.textContent = data.section2Title;
        if (modalDescription2) modalDescription2.textContent = data.section2Description;
        if (modalImage && data.image) modalImage.src = data.image;

        // Show modal
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    };

    /**
     * Close Platform Modal
     */
    window.closePlatformModal = function() {
        const modal = document.getElementById('platformModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    /**
     * Initialize modal functionality
     */
    $(document).ready(function() {
        // Close modal on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
                window.closePlatformModal();
            }
        });

        // Close modal when clicking outside
        $(document).on('click', '.platform-modal-overlay', function() {
            window.closePlatformModal();
        });

        // Prevent modal content clicks from closing modal
        $(document).on('click', '.platform-modal-content', function(e) {
            e.stopPropagation();
        });

        console.log('Platform Section JavaScript initialized');
    });

})(jQuery);

