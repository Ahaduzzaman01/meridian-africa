/**
 * Agrovue Header JavaScript
 * 
 * Handles mobile menu toggle, smooth scrolling, and navbar scroll effects
 * 
 * @package Meridian_Africa
 */

(function($) {
    'use strict';

    // Wait for DOM to be ready
    $(document).ready(function() {

        // ===========================
        // MOBILE MENU TOGGLE
        // ===========================

        const hamburger = $('.hamburger');
        const navMenu = $('.nav-menu');

        if (hamburger.length) {
            hamburger.on('click', function() {
                navMenu.toggleClass('active');
                hamburger.toggleClass('active');
            });
        }

        // Close menu when a link is clicked
        $('.nav-link').on('click', function() {
            if (navMenu.length) {
                navMenu.removeClass('active');
                if (hamburger.length) {
                    hamburger.removeClass('active');
                }
            }
        });

        // Close menu when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.navbar-content').length) {
                if (navMenu.hasClass('active')) {
                    navMenu.removeClass('active');
                    hamburger.removeClass('active');
                }
            }
        });

        // ===========================
        // SMOOTH SCROLL FOR ANCHOR LINKS
        // ===========================

        $('a[href^="#"]').on('click', function(e) {
            const href = $(this).attr('href');
            
            // Only handle if it's not just '#' and target exists
            if (href !== '#' && $(href).length) {
                e.preventDefault();
                
                const target = $(href);
                const offset = 80; // Offset for fixed header
                
                $('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 600, 'swing');

                // Close mobile menu if open
                if (navMenu.hasClass('active')) {
                    navMenu.removeClass('active');
                    hamburger.removeClass('active');
                }
            }
        });

        // ===========================
        // NAVBAR SCROLL EFFECT
        // ===========================

        const navbar = $('.navbar.agrovue-navbar');
        let lastScrollTop = 0;
        const scrollThreshold = 100;

        $(window).on('scroll', function() {
            const scrollTop = $(window).scrollTop();

            // Add shadow on scroll
            if (scrollTop > 10) {
                navbar.css('box-shadow', '0 4px 20px rgba(30, 64, 175, 0.12)');
            } else {
                navbar.css('box-shadow', '0 4px 15px rgba(30, 64, 175, 0.08)');
            }

            // Optional: Hide/show navbar on scroll (uncomment if needed)
            /*
            if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
                // Scrolling down
                navbar.css('transform', 'translateY(-100%)');
            } else {
                // Scrolling up
                navbar.css('transform', 'translateY(0)');
            }
            */

            lastScrollTop = scrollTop;
        });

        // ===========================
        // DROPDOWN MENU HANDLING (for touch devices)
        // ===========================

        if ('ontouchstart' in window) {
            $('.dropdown').on('touchstart', function(e) {
                const dropdown = $(this);
                const dropdownMenu = dropdown.find('.dropdown-menu');
                
                if (!dropdownMenu.is(':visible')) {
                    e.preventDefault();
                    $('.dropdown-menu').hide();
                    dropdownMenu.show();
                }
            });

            // Close dropdown when clicking outside
            $(document).on('touchstart', function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').hide();
                }
            });
        }

        // ===========================
        // ACTIVE MENU ITEM HIGHLIGHTING
        // ===========================

        // Highlight current page in menu
        const currentUrl = window.location.href;
        $('.nav-link').each(function() {
            const linkUrl = $(this).attr('href');
            if (currentUrl === linkUrl || currentUrl.indexOf(linkUrl) !== -1) {
                $(this).addClass('current-menu-item');
            }
        });

        // Highlight menu item based on scroll position (for single page)
        if ($('section[id]').length) {
            $(window).on('scroll', function() {
                const scrollPos = $(window).scrollTop() + 100;

                $('section[id]').each(function() {
                    const section = $(this);
                    const sectionTop = section.offset().top;
                    const sectionBottom = sectionTop + section.outerHeight();
                    const sectionId = section.attr('id');

                    if (scrollPos >= sectionTop && scrollPos < sectionBottom) {
                        $('.nav-link').removeClass('active');
                        $('.nav-link[href="#' + sectionId + '"]').addClass('active');
                    }
                });
            });
        }

    });

})(jQuery);

