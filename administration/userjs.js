 $(document).ready(function() {
   p = $('.popup-overlay');
   a = $('.app-popup-overlay');
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

a.click(function(event) {
    e = event || window.event;
    if (e.target == this) {
        $(a).css('display', 'none');
    }
});
$('.app-popup-close').click(function() {
    a.css('display', 'none');
});
$('#add-request').hide();
$('#add-appointment').hide();
//Инициализация отношения [Врач]-[День недели] Алексеева О.В. Пн 
jQuery("input#beginTimeAlekseeva-M").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-M").val();
    var value2=jQuery("input#endTimeAlekseeva-M").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeAlekseeva-M").val(value1);
    }
    jQuery("#schedule-sliderAlekseeva-M").slider("values",0,value1);    
});

jQuery("input#endTimeAlekseeva-M").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-M").val();
    var value2=jQuery("input#endTimeAlekseeva-M").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeAlekseeva-M").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeAlekseeva-M").val(value2);
    }});

jQuery("#schedule-sliderAlekseeva-M").slider({
	min: 8,
	max: 20,
	values: [16,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeAlekseeva-M").val(jQuery("#schedule-sliderAlekseeva-M").slider("values",0));
        jQuery("input#endTimeAlekseeva-M").val(jQuery("#schedule-sliderAlekseeva-M").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeAlekseeva-M").val(jQuery("#schedule-sliderAlekseeva-M").slider("values",0));
        jQuery("input#endTimeAlekseeva-M").val(jQuery("#schedule-sliderAlekseeva-M").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Алексеева О.В. Ср
jQuery("input#beginTimeAlekseeva-W").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-W").val();
    var value2=jQuery("input#endTimeAlekseeva-W").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeAlekseeva-W").val(value1);
    }
    jQuery("#schedule-sliderAlekseeva-W").slider("values",0,value1);    
});

jQuery("input#endTimeAlekseeva-W").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-W").val();
    var value2=jQuery("input#endTimeAlekseeva-W").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeAlekseeva-W").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeAlekseeva-W").val(value2);
    }});

jQuery("#schedule-sliderAlekseeva-W").slider({
	min: 8,
	max: 20,
	values: [16,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeAlekseeva-W").val(jQuery("#schedule-sliderAlekseeva-W").slider("values",0));
        jQuery("input#endTimeAlekseeva-W").val(jQuery("#schedule-sliderAlekseeva-W").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeAlekseeva-W").val(jQuery("#schedule-sliderAlekseeva-W").slider("values",0));
        jQuery("input#endTimeAlekseeva-W").val(jQuery("#schedule-sliderAlekseeva-W").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Алексеева О.В. Чт
jQuery("input#beginTimeAlekseeva-TH").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-TH").val();
    var value2=jQuery("input#endTimeAlekseeva-TH").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeAlekseeva-TH").val(value1);
    }
    jQuery("#schedule-sliderAlekseeva-TH").slider("values",0,value1);    
});

jQuery("input#endTimeAlekseeva-TH").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-TH").val();
    var value2=jQuery("input#endTimeAlekseeva-TH").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeAlekseeva-TH").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeAlekseeva-TH").val(value2);
    }});

jQuery("#schedule-sliderAlekseeva-TH").slider({
	min: 8,
	max: 20,
	values: [16,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeAlekseeva-TH").val(jQuery("#schedule-sliderAlekseeva-TH").slider("values",0));
        jQuery("input#endTimeAlekseeva-TH").val(jQuery("#schedule-sliderAlekseeva-TH").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeAlekseeva-TH").val(jQuery("#schedule-sliderAlekseeva-TH").slider("values",0));
        jQuery("input#endTimeAlekseeva-TH").val(jQuery("#schedule-sliderAlekseeva-TH").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Алексеева О.В. ПТ
jQuery("input#beginTimeAlekseeva-F").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-F").val();
    var value2=jQuery("input#endTimeAlekseeva-F").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeAlekseeva-F").val(value1);
    }
    jQuery("#schedule-sliderAlekseeva-F").slider("values",0,value1);    
});

jQuery("input#endTimeAlekseeva-F").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-F").val();
    var value2=jQuery("input#endTimeAlekseeva-F").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeAlekseeva-F").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeAlekseeva-F").val(value2);
    }});

jQuery("#schedule-sliderAlekseeva-F").slider({
	min: 8,
	max: 20,
	values: [16,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeAlekseeva-F").val(jQuery("#schedule-sliderAlekseeva-F").slider("values",0));
        jQuery("input#endTimeAlekseeva-F").val(jQuery("#schedule-sliderAlekseeva-F").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeAlekseeva-F").val(jQuery("#schedule-sliderAlekseeva-F").slider("values",0));
        jQuery("input#endTimeAlekseeva-F").val(jQuery("#schedule-sliderAlekseeva-F").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Алексеева О.В. СБ
jQuery("input#beginTimeAlekseeva-S").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-S").val();
    var value2=jQuery("input#endTimeAlekseeva-S").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeAlekseeva-S").val(value1);
    }
    jQuery("#schedule-sliderAlekseeva-S").slider("values",0,value1);    
});

jQuery("input#endTimeAlekseeva-S").change(function(){
    var value1=jQuery("input#beginTimeAlekseeva-S").val();
    var value2=jQuery("input#endTimeAlekseeva-S").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeAlekseeva-S").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeAlekseeva-S").val(value2);
    }});

jQuery("#schedule-sliderAlekseeva-S").slider({
	min: 8,
	max: 20,
	values: [8,13],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeAlekseeva-S").val(jQuery("#schedule-sliderAlekseeva-S").slider("values",0));
        jQuery("input#endTimeAlekseeva-S").val(jQuery("#schedule-sliderAlekseeva-S").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeAlekseeva-S").val(jQuery("#schedule-sliderAlekseeva-S").slider("values",0));
        jQuery("input#endTimeAlekseeva-S").val(jQuery("#schedule-sliderAlekseeva-S").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
////Инициализация отношения [Врач]-[День недели] Корсун  СБ
jQuery("input#beginTimeKorsun-S").change(function(){
    var value1=jQuery("input#beginTimeKorsun-S").val();
    var value2=jQuery("input#endTimeKorsun-S").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKorsun-S").val(value1);
    }
    jQuery("#schedule-sliderKorsun-S").slider("values",0,value1);    
});

jQuery("input#endTimeKorsun-S").change(function(){
    var value1=jQuery("input#beginTimeKorsun-S").val();
    var value2=jQuery("input#endTimeKorsun-S").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKorsun-S").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKorsun-S").val(value2);
    }});

jQuery("#schedule-sliderKorsun-S").slider({
	min: 8,
	max: 20,
	values: [8,13],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKorsun-S").val(jQuery("#schedule-sliderKorsun-S").slider("values",0));
        jQuery("input#endTimeKorsun-S").val(jQuery("#schedule-sliderKorsun-S").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKorsun-S").val(jQuery("#schedule-sliderKorsun-S").slider("values",0));
        jQuery("input#endTimeKorsun-S").val(jQuery("#schedule-sliderKorsun-S").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//////Инициализация отношения [Врач]-[День недели] Костюкова  ПН
jQuery("input#beginTimeKostyukova-M").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-M").val();
    var value2=jQuery("input#endTimeKostyukova-M").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKostyukova-M").val(value1);
    }
    jQuery("#schedule-sliderKostyukova-M").slider("values",0,value1);    
});

jQuery("input#endTimeKostyukova-M").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-M").val();
    var value2=jQuery("input#endTimeKostyukova-M").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKostyukova-M").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKostyukova-M").val(value2);
    }});

jQuery("#schedule-sliderKostyukova-M").slider({
	min: 8,
	max: 20,
	values: [8,14],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKostyukova-M").val(jQuery("#schedule-sliderKostyukova-M").slider("values",0));
        jQuery("input#endTimeKostyukova-M").val(jQuery("#schedule-sliderKostyukova-M").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKostyukova-M").val(jQuery("#schedule-sliderKostyukova-M").slider("values",0));
        jQuery("input#endTimeKostyukova-M").val(jQuery("#schedule-sliderKostyukova-M").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
////////Инициализация отношения [Врач]-[День недели] Костюкова  ПН
jQuery("input#beginTimeKostyukova-TU").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-TU").val();
    var value2=jQuery("input#endTimeKostyukova-TU").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKostyukova-TU").val(value1);
    }
    jQuery("#schedule-sliderKostyukova-TU").slider("values",0,value1);    
});

jQuery("input#endTimeKostyukova-TU").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-TU").val();
    var value2=jQuery("input#endTimeKostyukova-TU").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKostyukova-TU").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKostyukova-TU").val(value2);
    }});

jQuery("#schedule-sliderKostyukova-TU").slider({
	min: 8,
	max: 20,
	values: [8,14],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKostyukova-TU").val(jQuery("#schedule-sliderKostyukova-TU").slider("values",0));
        jQuery("input#endTimeKostyukova-TU").val(jQuery("#schedule-sliderKostyukova-TU").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKostyukova-TU").val(jQuery("#schedule-sliderKostyukova-TU").slider("values",0));
        jQuery("input#endTimeKostyukova-TU").val(jQuery("#schedule-sliderKostyukova-TU").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
////////Инициализация отношения [Врач]-[День недели] Костюкова  ПН
jQuery("input#beginTimeKostyukova-W").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-W").val();
    var value2=jQuery("input#endTimeKostyukova-W").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKostyukova-W").val(value1);
    }
    jQuery("#schedule-sliderKostyukova-W").slider("values",0,value1);    
});

jQuery("input#endTimeKostyukova-W").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-W").val();
    var value2=jQuery("input#endTimeKostyukova-W").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKostyukova-W").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKostyukova-W").val(value2);
    }});

jQuery("#schedule-sliderKostyukova-W").slider({
	min: 8,
	max: 20,
	values: [8,14],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKostyukova-W").val(jQuery("#schedule-sliderKostyukova-W").slider("values",0));
        jQuery("input#endTimeKostyukova-W").val(jQuery("#schedule-sliderKostyukova-W").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKostyukova-W").val(jQuery("#schedule-sliderKostyukova-W").slider("values",0));
        jQuery("input#endTimeKostyukova-W").val(jQuery("#schedule-sliderKostyukova-W").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
////////Инициализация отношения [Врач]-[День недели] Костюкова  ПН
jQuery("input#beginTimeKostyukova-TH").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-TH").val();
    var value2=jQuery("input#endTimeKostyukova-TH").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKostyukova-TH").val(value1);
    }
    jQuery("#schedule-sliderKostyukova-TH").slider("values",0,value1);    
});

jQuery("input#endTimeKostyukova-TH").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-TH").val();
    var value2=jQuery("input#endTimeKostyukova-TH").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKostyukova-TH").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKostyukova-TH").val(value2);
    }});

jQuery("#schedule-sliderKostyukova-TH").slider({
	min: 8,
	max: 20,
	values: [8,14],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKostyukova-TH").val(jQuery("#schedule-sliderKostyukova-TH").slider("values",0));
        jQuery("input#endTimeKostyukova-TH").val(jQuery("#schedule-sliderKostyukova-TH").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKostyukova-TH").val(jQuery("#schedule-sliderKostyukova-TH").slider("values",0));
        jQuery("input#endTimeKostyukova-TH").val(jQuery("#schedule-sliderKostyukova-TH").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
////////Инициализация отношения [Врач]-[День недели] Костюкова  ПН
jQuery("input#beginTimeKostyukova-F").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-F").val();
    var value2=jQuery("input#endTimeKostyukova-F").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKostyukova-F").val(value1);
    }
    jQuery("#schedule-sliderKostyukova-F").slider("values",0,value1);    
});

jQuery("input#endTimeKostyukova-F").change(function(){
    var value1=jQuery("input#beginTimeKostyukova-F").val();
    var value2=jQuery("input#endTimeKostyukova-F").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKostyukova-F").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKostyukova-F").val(value2);
    }});

jQuery("#schedule-sliderKostyukova-F").slider({
	min: 8,
	max: 20,
	values: [8,14],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKostyukova-F").val(jQuery("#schedule-sliderKostyukova-F").slider("values",0));
        jQuery("input#endTimeKostyukova-F").val(jQuery("#schedule-sliderKostyukova-F").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKostyukova-F").val(jQuery("#schedule-sliderKostyukova-F").slider("values",0));
        jQuery("input#endTimeKostyukova-F").val(jQuery("#schedule-sliderKostyukova-F").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Карзанов В.А. ВТ
jQuery("input#beginTimeKarzanov-TU").change(function(){
    var value1=jQuery("input#beginTimeKarzanov-TU").val();
    var value2=jQuery("input#endTimeKarzanov-TU").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKarzanov-TU").val(value1);
    }
    jQuery("#schedule-sliderKarzanov-TU").slider("values",0,value1);    
});

jQuery("input#endTimeKarzanov-TU").change(function(){
    var value1=jQuery("input#beginTimeKarzanov-TU").val();
    var value2=jQuery("input#endTimeKarzanov-TU").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKarzanov-TU").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKarzanov-TU").val(value2);
    }});

jQuery("#schedule-sliderKarzanov-TU").slider({
	min: 8,
	max: 20,
	values: [15,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKarzanov-TU").val(jQuery("#schedule-sliderKarzanov-TU").slider("values",0));
        jQuery("input#endTimeKarzanov-TU").val(jQuery("#schedule-sliderKarzanov-TU").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKarzanov-TU").val(jQuery("#schedule-sliderKarzanov-TU").slider("values",0));
        jQuery("input#endTimeKarzanov-TU").val(jQuery("#schedule-sliderKarzanov-TU").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
//Инициализация отношения [Врач]-[День недели] Карзанов В.А. чт
jQuery("input#beginTimeKarzanov-TH").change(function(){
    var value1=jQuery("input#beginTimeKarzanov-TH").val();
    var value2=jQuery("input#endTimeKarzanov-TH").val();
    if(parseInt(value1) > parseInt(value2)){
        value1 = value2;
        jQuery("input#beginTimeKarzanov-TH").val(value1);
    }
    jQuery("#schedule-sliderKarzanov-TH").slider("values",0,value1);    
});

jQuery("input#endTimeKarzanov-TH").change(function(){
    var value1=jQuery("input#beginTimeKarzanov-TH").val();
    var value2=jQuery("input#endTimeKarzanov-TH").val();
    if (value2 > 20) { value2 = 20; jQuery("input#endTimeKarzanov-TH").val(20)}
    if(parseInt(value1) > parseInt(value2)){
        value2 = value1;
        jQuery("input#endTimeKarzanov-TH").val(value2);
    }});

jQuery("#schedule-sliderKarzanov-TH").slider({
	min: 8,
	max: 20,
	values: [15,20],
	range: true,
        stop: function(event, ui) {
        jQuery("input#beginTimeKarzanov-TH").val(jQuery("#schedule-sliderKarzanov-TH").slider("values",0));
        jQuery("input#endTimeKarzanov-TH").val(jQuery("#schedule-sliderKarzanov-TH").slider("values",1));
    },
    slide: function(event, ui){
        jQuery("input#beginTimeKarzanov-TH").val(jQuery("#schedule-sliderKarzanov-TH").slider("values",0));
        jQuery("input#endTimeKarzanov-TH").val(jQuery("#schedule-sliderKarzanov-TH").slider("values",1));
    },

        animate: true,
        step: 1
});
//end initialization
});
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
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
function AddRequestToggle(){
    $('#add-request').toggle(200);
}
function AddAppointmentToggle(){
    $('#add-appointment').toggle(200);
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