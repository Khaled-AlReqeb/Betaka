// =============================================
// Auth Inputs
// =============================================
$( "input.auth_input" ).focus(function() {
  $( this ).prev( "label" ).addClass("focus_input");
  $( this ).next( "div" ).addClass("focus_input");
}).blur(function() {
  $( this ).prev( "label" ).removeClass("focus_input");
  $( this ).next( "div" ).removeClass("focus_input");
  if($(this).val().length) {
    $( this ).prev( "label" ).addClass("active_input");
    $( this ).next( "div" ).addClass("active_input");
  } else {
    $( this ).prev( "label" ).removeClass("active_input");
    $( this ).next( "div" ).removeClass("active_input");
  }
});

// =============================================
// Profile Title
// =============================================
$(".profile_title").click(function(e){
  $(this).addClass("focus_input");
   e.stopPropagation();
});
$(".profile_title").click(function(e){
  e.stopPropagation();
});
$(document).click(function(){
  $( ".profile_title" ).removeClass("focus_input");
});
$("input.profile-field").on('keyup', function () {
  $('span.profile-txt, a.user-name').html($(this).val());
});

$(".name_link_title").click(function(e){
  $(this).addClass("focus_input");
   e.stopPropagation();
});
$(".name_link_title").click(function(e){
  e.stopPropagation();
});
$(document).click(function(){
  $( ".name_link_title" ).removeClass("focus_input");
});
$("input.name_link_field").on('keyup', function () {
  $('span.name-txt').html($(this).val());
});
$(".link_title").click(function(e){
  $(this).addClass("focus_input");
   e.stopPropagation();
});
$(".link_title").click(function(e){
  e.stopPropagation();
});
$(document).click(function(){
  $( ".link_title" ).removeClass("focus_input");
});
$("input.link_field").on('keyup', function () {
  $('span.link-txt').html($(this).val());
});

// =============================================
// Repeater
// =============================================
$(document).ready(function () {
  $('.repeater').repeater({
    isFirstItemUndeletable: true,
    repeaters: [{
      selector: '.inner-repeater'
    }]
  });
});

// =============================================
// Sortable
// =============================================
$(function() {
  $( "#sort_links" ).sortable({
    handle: ".sort_area",
  });
});

// =============================================
// DATEPICKER
// =============================================
$(function() {
  $('input.datepicker').daterangepicker({
    singleDatePicker: true,
    autoUpdateInput: true,
    opens: "right",
    drops: "up",
    autoApply: true,
    "locale": {
      "format": "MM/DD/YYYY",
      "daysOfWeek": [
          "أحد",
          "إثنين",
          "ثلاثاء",
          "أربعاء",
          "خميس",
          "جمعة",
          "سبت"
      ],
      "monthNames": [
          "يناير",
          "فبراير",
          "مارس",
          "أبريل",
          "مايو",
          "يونيو",
          "يوليو",
          "أغسطس",
          "سبتمبر",
          "أكتوبر",
          "نوفمبر",
          "ديسمبر"
      ]
  },
  });
});

// =============================================
// Upload Avatar Image
// =============================================
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#avatar_img, .user-img')
      .attr('src', e.target.result)
      .width(90)
      .height(90);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function deleteImage() {
  document.getElementById("avatar_img").removeAttribute('src');
}

// =============================================
// Upload Background Image
// =============================================
function imageCustomize(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image_customize')
      .attr('src', e.target.result)
    };
    reader.readAsDataURL(input.files[0]);
  }
}

// =============================================
// Scroll To Custom Appearance
// =============================================
$("input#custom_radio").on('change',function(e) {
  $('.appearance_page').animate({
      scrollTop: $("#custom-appearance").offset().top
  }, 1000);
});

// =============================================
// Color Picker
// =============================================
$(document).ready(function() {
  $("#mycolor").colorpicker({
    defaultPalette: 'web',
    color: "#666666",
    history: false
  });
});

// =============================================
// Change theme
// =============================================
$(document).ready(function(){
	$("input.colourway:radio").click(function(){
    var value = $( this ).val();
		switch( value ) {
			case 'card-1':
				$( "#mobile_preview" ).removeClass();
				$( "#mobile_preview" ).addClass( "card-1" );
				break;
      case 'card-2':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-2" );
        break;
			case 'card-3':
				$( "#mobile_preview" ).removeClass();
				$( "#mobile_preview" ).addClass( "card-3" );
				break;
      case 'card-4':
				$( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-4" );
        break;
      case 'card-5':
				$( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-5" );
        break;
      case 'card-6':
				$( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-6" );
        break;
      case 'card-7':
				$( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-7" );
        break;
      case 'card-8':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-8" );
        break;
      case 'card-9':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-9" );
        break;
      case 'card-10':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-10" );
        break;
      case 'card-11':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-11" );
        break;
      case 'card-12':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-12" );
        break;
      case 'card-13':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-13" );
        break;
      case 'card-14':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-14" );
        break;
      case 'card-15':
        $( "#mobile_preview" ).removeClass();
        $( "#mobile_preview" ).addClass( "card-15" );
        break;
		}
	});
});
