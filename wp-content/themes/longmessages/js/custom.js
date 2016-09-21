$(document).ready(function(){
$('[placeholder]').focus(function() {
  var input = $(this);
  if (input.val() == input.attr('placeholder')) {
    input.val('');
    input.removeClass('placeholder');
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
  }
}).blur();

$('[placeholder]').parents('form').submit(function() {
  $(this).find('[placeholder]').each(function() {
    var input = $(this);
    if (input.val() == input.attr('placeholder')) {
      input.val('');
    }
  })
});

$('input[type=email]').keyup(function(){
	var inputValue = $(this).val();
	if(inputValue==''){
		$(this).css('direction','rtl');
	}else{
		$(this).css('direction','ltr');
	}
});
				
				$('.lightbox').click(function(){
					$('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
					$('.box').animate({'opacity':'1.00'}, 300, 'linear'); 
					$('.backdrop, .box').css('display', 'block');
					displayVideobox();
				});
				
				$('.close').click(function(){
					close_box();
					$("input[type=text],input[type=tel],input[type=email], textarea").val("");
					$(".wpcf7-not-valid-tip").hide();
					$(".wpcf7-response-output").hide();
				});
				
				$('.backdrop').click(function(){
					close_box();
					$("input[type=text],input[type=tel],input[type=email], textarea").val("");
					$(".wpcf7-not-valid-tip").hide();
					$(".wpcf7-response-output").hide();
				});
				
				
				function close_box()
				{
					$('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
					$('.backdrop, .box').css('display', 'none');
					});
					var videoObj = document.getElementById("videoPopup");
					if(videoObj){
						videoObj.parentNode.removeChild(videoObj);
						return false;
					}
				}
	});			
	
function displayVideobox()
{
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("home_video_box").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open('GET','/wp-content/themes/longmessages/module-home-video.php',true); 
	xmlhttp.send();
}