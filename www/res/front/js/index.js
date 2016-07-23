/* ===== Tooltips ===== */

$('#tooltip').tooltip();

$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});