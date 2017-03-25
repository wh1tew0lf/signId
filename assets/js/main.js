$(function() {

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });
	
});

$(window).load(function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");

});

// activity tabs
$('.activity-tabs a').click(function (e) {
  e.preventDefault();
  if (!$(this).hasClass('active')) {
  	$(this).tab('show');
  }
})

$('.activity-tabs a').on('show.bs.tab', function (e) {
	$(".activity-tabs a.active").removeClass('active');
	$(this).addClass('active');
});

// collapse in mobile
$('.collapse-btn').click(function (e) {
  e.preventDefault();
  if ($(window).width() <= 992) {
  	$($(this).data('target')).collapse('toggle');
  }
});

$('.activity-list .collapse, .devices-list .collapse').on('show.bs.collapse', function () {
	var id = $(this).attr("id");
	var btnCollapse = $('.collapse-btn[data-target="#'+id+'"]');
	btnCollapse.addClass('open');
})

$('.activity-list .collapse, .devices-list .collapse').on('hide.bs.collapse', function () {
	var id = $(this).attr("id");
	var btnCollapse = $('.collapse-btn[data-target="#'+id+'"]');
	btnCollapse.removeClass('open');
})