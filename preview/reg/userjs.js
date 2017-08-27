 $(document).ready(function() {
   p = $('.popup-overlay');
/*$('#popup-toggle').click(function() {
    p.css('display', 'block');
    
});*/
    /* $('#ReqToApp').hide();*/
p.click(function(event) {
    e = event || window.event;
    if (e.target == this) {
        $(p).css('display', 'none');
    }
});
$('.popup-close').click(function() {
    p.css('display', 'none');
});
})

function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
} 

function ajaxRequest()
{
	try
	{
		var request = new XMLHttpRequest()
	}
	catch(e1)
	{
		try
		{
			request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2)
		{
			try
			{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3)
			{
				request = false
			}
		}
	}
	return request;
}
function RequestToAppointment(rid){
    p = $('.popup-overlay')
    p.css('display', 'block')
   }
 function ToggleAppointment(){
     $('#ReqToApp').toggle(500);
 }
/* function ToModal(rid){
   p = $('.popup-overlay')
   p.css('display', 'block')
   $.post("request_in_modal.php", {rid: rid}, function(data){ process(data)}, "html");
   $.ajax({
     type: "POST",
     params: "rid=" + rid,
     url: "request_in_modal.php",
     dataType: "html",
     success: function(params){
         document.getElementById('popup').innerHTML =
		this.responseText
     }
    });*/






