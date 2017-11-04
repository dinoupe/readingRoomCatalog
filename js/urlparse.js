$(document).ready(function(){
  var search = decodeURIComponent(document.location.hash);
  var elements = search.split('&');
  $.each(elements,function(index,value){
    var $value = value.split('=');
    $($value[0]).val($value[1]);
  });
  if(document.location.hash.length > 1){
    $('#searchbookclic').trigger('click');
  };
});