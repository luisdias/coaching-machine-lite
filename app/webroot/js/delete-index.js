$(document).ready(function() {
  $(".btn-delete").on("click", function () {
     var action = $(this).attr('data-action');
     $("form").attr('action',action);      
});
});