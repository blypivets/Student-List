$(document).ready(function() {
  $("#view_button1").click(function() {changeGlyph("#view_button1", '#inputPassword')})
});
$(document).ready(function() {
  $("#view_button2").click(function() {changeGlyph("#view_button2", '#inputRegPassword')})
});
$(document).ready(function() {
  $("#view_button3").click(function() {changeGlyph("#view_button3", '#inputConfirmPassword')})
});

$(".nav-tabs a").on("show.bs.tab", function(){
  var at = $(".nav-tabs li.active a").attr("href")
  var selector = (at=="#signin"?"#register":"#signin")
  selector = "div"+ selector
  $(selector).find("form").get(0).reset()
});

function changeGlyph(btn, input){
  $(input).attr('type', function(index, attr){return attr == "password" ? "text" : "password"; });
  $(btn).find(".fas").toggleClass("fa-eye").toggleClass("fa-eye-slash");
}