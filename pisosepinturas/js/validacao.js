$(function() {
  $('.erro').hide();
  $('input.text-input').css({backgroundColor:"#FFFFFF"});
  $('input.text-input').focus(function(){
    $(this).css({backgroundColor:"#FFDDAA"});
  });
  $('input.text-input').blur(function(){
    $(this).css({backgroundColor:"#FFFFFF"});
  });

  $(".button").click(function() {
		// validate and process form
		// first hide any error messages
    $('.erro').hide();
		
	  var name = $("input#name").val();
		if (name == "" || name == "Nome: ") {
      $("label#name_error").show();
      $("input#name").focus();
      return false;
    }
		var email = $("input#email").val();
		if (email == "" || email == "Email: ") {
      $("label#email_error").show();
      $("input#email").focus();
      return false;
    }
		var txt = $("textarea#txt").val();
		if (txt == "" || txt == "Mensagem...") {
      $("label#phone_error").show();
      $("input#phone").focus();
      return false;
    }
		
		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone;
		//alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "bin/process.php",
      data: dataString,
      success: function(results) { 
							alert("Sucesso!");
						}
     });
    return false;
	});
});
runOnLoad(function(){
  $("input#name").select().focus();
});
