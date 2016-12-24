// JavaScript Document
function showalert(message) {
	bootbox.alert(message);
	
	}
function showpleasewait(message) {
    if ($('#leanoverlay2').length == 0) {
        $('body').append('<div id="leanoverlay2"></div>');
        $('#leanoverlay2').css({
            'position': 'fixed',
            'width': '100%',
            'height': '100%',
            'backgroundColor': '#000',
            'opacity': '0.5',
            'zIndex': '10000003',
            'top': '0',
            'left': '0'
        });
    }
    $('#leanoverlay2').show();
    if ($('#showpleasewait_div').length == 0) {
        $('body').append('<div id="showpleasewait_div"><div style="float:left; width: 100%; text-align : center;">' + message + '</div></div>');
        $('#showpleasewait_div').css({
            'position': 'fixed',
            'backgroundColor': '#fff',
            'zIndex': '10000004',
            'top': '100px',
            'width': '40%',
            'height': '100px',
            'display': 'none',
            'padding-top': '5%',
            '-moz-border-radius': '3px 3px 3px 3px',
            '-ms-border-radius': '3px 3px 3px 3px',
            '-o-border-radius': '3px 3px 3px 3px',
            '-webkit-border-radius': '3px 3px 3px 3px'
        });
    }
    var winHeight = $(window).height();
    var winWidth = $(window).width();
    var popupWidth = $('#showpleasewait_div').width();
    var popupHeight = $('#showpleasewait_div').height();
    var popupTop = (winHeight - popupHeight) / 2;
    var popupLeft = (winWidth - popupWidth) / 2;
    $('#showpleasewait_div').css('left', popupLeft);
    $('#showpleasewait_div').show();
}

function hidepleasewait() {
    $('#leanoverlay2').hide();
    $('#showpleasewait_div').hide();
}

function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}   
$(document).ready(function(e) {
	$('select').change(function(){
		if($(this).hasClass('valid')|| $(this).hasClass('error'))
		{
								var val=$.trim($(this).val());
								var labelerror=$(this).attr('name');
								console.log(labelerror);
								if(val!='')
								{
									$('label[for='+labelerror+']').html('&nbsp;');
								}else
								{
									
								}
									}		
							});

});