$(document).ready(function() {
	"use strict";
    $('.chips').material_chip();
    $('select').material_select();

    //FILTER SELECT OPTIONS
    $(".wed-fil-1").on('click', function() {
        $(".fil-1").addClass("filt-eff");
        $(".fil-2").addClass('filt-eff-1');
    });
    //FILTER SELECT OPTIONS
    $(".wed-fil-2").on('click', function() {
        $(".fil-2").removeClass("filt-eff-1");
        $(".fil-3").addClass("filt-eff-1");
    });
    //FILTER SELECT OPTIONS
    $(".wed-fil-3").on('click', function() {
        $(".fil-3").removeClass("filt-eff-1");
        $(".fil-4").addClass("filt-eff-1");
    });
    //FILTER SELECT OPTIONS
    $(".wed-fil-4").on('click', function() {
        $(".fil-4").removeClass("filt-eff-1");
        $(".fil-5").addClass("filt-eff-1");
    });

    //MEGA MENU	
    $(".about-menu").hover(function() {
        $(".about-mm").fadeIn();
    });
    $(".about-menu").mouseleave(function() {
        $(".about-mm").fadeOut();
    });
    //MEGA MENU	
    $(".admi-menu").hover(function() {
        $(".admi-mm").fadeIn();
    });
    $(".admi-menu").mouseleave(function() {
        $(".admi-mm").fadeOut();
    });
    //MEGA MENU	
    $(".cour-menu").hover(function() {
        $(".cour-mm").fadeIn();
    });
    $(".cour-menu").mouseleave(function() {
        $(".cour-mm").fadeOut();
    });
    //SINGLE DROPDOWN MENU
    $(".top-drop-menu").on('click', function() {
        $(".man-drop").fadeIn();
    });
    $(".man-drop").mouseleave(function() {
        $(".man-drop").fadeOut();
    });
    $(".wed-top").mouseleave(function() {
        $(".man-drop").fadeOut();
    });

    //SEARCH BOX
    $("#sf-box").on('click', function() {
        $(".sf-list").fadeIn();
    });
    $(".sf-list").mouseleave(function() {
        $(".sf-list").fadeOut();
    });
    $(".search-top").mouseleave(function() {
        $(".sf-list").fadeOut();
    });
    $('.sdb-btn-edit').hover(function() {
        $(this).text("Click to edit my profile");
    });
    $('.sdb-btn-edit').mouseleave(function() {
        $(this).text("edit my profile");
    });

    //AWARDS
    $(".time-hide-1-btn").on('click', function() {

        $(".time-hide-1, .time-hide-11-btn").slideDown();
        $(".time-hide-1-btn").fadeOut();
    });
    $(".time-hide-11-btn").on('click', function() {
        $(".time-hide-1, .time-hide-11-btn").slideUp();
        $(".time-hide-1-btn").fadeIn();
    })
    $(".time-hide-2-btn").on('click', function() {
       
        $(".time-hide-2, .time-hide-12-btn").slideDown();
        $(".time-hide-2-btn").fadeOut();
    });
    $(".time-hide-12-btn").on('click', function() {
        
        $(".time-hide-2, .time-hide-12-btn").slideUp();
        $(".time-hide-2-btn").fadeIn();
    });
    $(".time-hide-3-btn").on('click', function() {
        $(".time-hide-3, .time-hide-13-btn").slideDown();
        $(".time-hide-3-btn").fadeOut();
    });
    $(".time-hide-13-btn").on('click', function() {
        $(".time-hide-3, .time-hide-13-btn").slideUp();
        $(".time-hide-3-btn").fadeIn();
    });
    $(".time-hide-4-btn").on('click', function() {
        $(".time-hide-4, .time-hide-14-btn").slideDown();
        $(".time-hide-4-btn").fadeOut();
    });
    $(".time-hide-14-btn").on('click', function() {
        $(".time-hide-4, .time-hide-14-btn").slideUp();
        $(".time-hide-4-btn").fadeIn();
    });
     $(".time-hide-5-btn").on('click', function() {
        $(".time-hide-5, .time-hide-15-btn").slideDown();
        $(".time-hide-5-btn").fadeOut();
    });
    $(".time-hide-15-btn").on('click', function() {
        $(".time-hide-5, .time-hide-15-btn").slideUp();
        $(".time-hide-5-btn").fadeIn();
    });
    $(".time-hide-6-btn").on('click', function() {
        $(".time-hide-6, .time-hide-16-btn").slideDown();
        $(".time-hide-6-btn").fadeOut();
    });
    $(".time-hide-16-btn").on('click', function() {
        $(".time-hide-6, .time-hide-16-btn").slideUp();
        $(".time-hide-6-btn").fadeIn();
    });
     $(".time-hide-7-btn").on('click', function() {
        $(".time-hide-7, .time-hide-17-btn").slideDown();
        $(".time-hide-7-btn").fadeOut();
    });
    $(".time-hide-17-btn").on('click', function() {
        $(".time-hide-7, .time-hide-17-btn").slideUp();
        $(".time-hide-7-btn").fadeIn();
    });
    $(".time-hide-8-btn").on('click', function() {
        $(".time-hide-8, .time-hide-18-btn").slideDown();
        $(".time-hide-8-btn").fadeOut();
    });
    $(".time-hide-18-btn").on('click', function() {
        $(".time-hide-8, .time-hide-18-btn").slideUp();
        $(".time-hide-8-btn").fadeIn();
    });
    $(".time-hide-9-btn").on('click', function() {
        $(".time-hide-9, .time-hide-19-btn").slideDown();
        $(".time-hide-9-btn").fadeOut();
    });
    $(".time-hide-19-btn").on('click', function() {
        $(".time-hide-9, .time-hide-19-btn").slideUp();
        $(".time-hide-9-btn").fadeIn();
    });
    $(".time-hide-10-btn").on('click', function() {
        $(".time-hide-10, .time-hide-20-btn").slideDown();
        $(".time-hide-10-btn").fadeOut();
    });
    $(".time-hide-20-btn").on('click', function() {
        $(".time-hide-10, .time-hide-20-btn").slideUp();
        $(".time-hide-10-btn").fadeIn();
    });
    $(".time-hide-11-btn").on('click', function() {
        $(".time-hide-11, .time-hide-21-btn").slideDown();
        $(".time-hide-11-btn").fadeOut();
    });
    $(".time-hide-21-btn").on('click', function() {
        $(".time-hide-11, .time-hide-21-btn").slideUp();
        $(".time-hide-11-btn").fadeIn();
    });
    $(".time-hide-12-btn").on('click', function() {
        $(".time-hide-12, .time-hide-22-btn").slideDown();
        $(".time-hide-12-btn").fadeOut();
    });
    $(".time-hide-22-btn").on('click', function() {
        $(".time-hide-12, .time-hide-22-btn").slideUp();
        $(".time-hide-12-btn").fadeIn();
    });
     $(".time-hide-13-btn").on('click', function() {
        $(".time-hide-13, .time-hide-23-btn").slideDown();
        $(".time-hide-13-btn").fadeOut();
    });
    $(".time-hide-23-btn").on('click', function() {
        $(".time-hide-13, .time-hide-23-btn").slideUp();
        $(".time-hide-13-btn").fadeIn();
    });

    //MOBILE MENU OPEN
    $(".ed-micon").on('click', function() {
        $(".ed-mm-inn").addClass("ed-mm-act");
    });
    //MOBILE MENU CLOSE
    $(".ed-mi-close").on('click', function() {
        $(".ed-mm-inn").removeClass("ed-mm-act");
    });
	
    //MATERIAL SELECT BOX
    $('select').material_select();

    //MATERIAL COLLAPSIBLE
    $('.collapsible').collapsible();

    //MATERIAL CHIP COMMON
    $('.chips').material_chip();
    $('.chips-initial').material_chip({
        data: [{
            tag: 'Apple',
        }, {
            tag: 'Microsoft',
        }, {
            tag: 'Google',
        }],
    });

    //MATERIAL CHIP PLACEHOLDER
    $('.chips-placeholder').material_chip({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Amini (press enter)',
    });

    //MATERIAL CHIP AUTO-COMPLETE
    $('.chips-autocomplete').material_chip({
        autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null
            },
            limit: Infinity,
            minLength: 1
        }
    });
	
    //GOOGLE MAP - SCROLL REMOVE
    $('.contact-map')
        .on('click', function() {
            $(this).find('iframe').addClass('clicked')
        })
        .on('mouseleave', function() {
            $(this).find('iframe').removeClass('clicked')
        });

    //$(".desk-hide").click(function(){
    //$(".desk-hide").fadeOut();
    //$(".mob-close").fadeIn();
    //});
    //$(".mob-close").click(function(){
    //$(".man-drop").fadeOut();
    //$(".mob-close").fadeOut();
    //$(".desk-hide").fadeIn();
    //});	

    //RIGHT CLICK DISABLE	
    //$("body").on("contextmenu",function(){
    //return false;
    //}); 
    $('.slider').slider({
        height: 500,
        interval: 1000
    });
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: 400, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });
    $('.dropdown-button2').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: ($('.dropdown-content').width() * 3) / 2.5 + 5, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
});