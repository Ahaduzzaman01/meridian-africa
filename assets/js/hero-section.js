/**
 * Hero Section JavaScript
 * 
 * Handles animations and interactions for the hero section widget
 * Extracted from agrovue-landing-html/js/script.js
 * 
 * @package Meridian_Africa
 * @since 1.0.0
 */

(function($) {
    'use strict';

    /**
     * Initialize hero section animations
     */
    function initHeroSection() {
        // Intersection Observer for scroll reveal animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe hero elements
        const heroElements = document.querySelectorAll('.hero-content, .hero-visual');
        heroElements.forEach(function(element) {
            observer.observe(element);
        });
    }

    /**
     * Initialize when document is ready
     */
    $(document).ready(function() {
        initHeroSection();
    });

    /**
     * Re-initialize when Elementor preview is loaded
     */
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/meridian-hero-section.default', function($scope) {
            initHeroSection();
        });
    });

})(jQuery);

