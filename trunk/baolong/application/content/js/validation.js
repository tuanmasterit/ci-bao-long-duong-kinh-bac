$(document).ready(function(){
	$('#index_login').submit(function(){
		var u = jQuery(this).find('#username');
		var p = jQuery(this).find('#password');
		var np = jQuery(this).find('#notiProcess');
		var btn = jQuery(this).find('#btn');
		btn.css('display','none');
		np.css('display','');
		if(u.val() == '') {
			jQuery('.loginerror').slideDown();
			u.focus();
			btn.css('display','');
			np.css('display','none');
			return false;	
		}
		
		jQuery.post(jQuery(this).attr('action'), { txtUsername:u.val(),txtPassword:p.val()},
			function(data) { 
				if(data=='')
				{
					jQuery('.loginerror').slideDown();
					btn.css('display','');
					np.css('display','none');
					u.focus();
				}
				else
				{
					
				}
			//jQuery('#dataSearch').html(data);
			});
		return false;	
	});
	
	$('#username').keypress(function(){
		jQuery('.loginerror').slideUp();
	});
});

