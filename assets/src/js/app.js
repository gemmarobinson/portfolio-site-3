/* Vendor Scripts */
import $ from 'jquery';
import './vendor/slick';
import { WOW } from 'wowjs';

/* Our functions */
import smoothScroll from './components/smooth-scroll';
import homeLinks from './components/home-links';
import videoPopup from './components/video-popup';
import mobileMenu from './components/mobile-menu';
import clientsSlider from './components/clients-slider';
import valuesToggle from './components/values';
import timelineSlider from './components/timeline-slider';
import headerScroll from './components/header-scroll';
import inputWidth from './components/input-width';
import customerSelect from './components/customer-select';
import formLabels from './components/form-labels';
import contactFormPopup from './components/contact-form-popup';
import newsFilter from './components/posts-filter';
import cookieBanner from './components/cookie-banner';
import emailObfuscate from './components/email-obfuscate';
import emailValidation from './components/email-validation';
import IEObjectFitFallback from './components/ie-object-fit-fallback';

$(document).ready(() => {
    smoothScroll();
    homeLinks();
    videoPopup();
    mobileMenu();
    clientsSlider();
    valuesToggle();
    timelineSlider();
    headerScroll();
    inputWidth();
    customerSelect();
    formLabels();
    contactFormPopup();
    newsFilter();
    cookieBanner();
    emailObfuscate();
    emailValidation();
    IEObjectFitFallback();

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        var SVGbackground = $('.js-hero-background').css('background-image');
        if (SVGbackground) {
            var PNGbackground = SVGbackground.replace('svg', 'png');
            $('.js-hero-background').css('background-image', PNGbackground);
        }

        var SVGbackground = $('.js-hero-background').css('background-image');
        if (SVGbackground) {
            var PNGbackground = SVGbackground.replace('svg', 'png');
            $('.js-cta-background').css('background-image', PNGbackground);
        }
    }

    // Initiate WOWjs
    const wow = new WOW();
    wow.init();
});

$(window).scroll(function() {
    headerScroll();
    // add functions here
});

$(window).on('resize', function() {
    // add functions here
});
