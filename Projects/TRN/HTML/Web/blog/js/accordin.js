// JavaScript Document
$(function()
{
	$('div.sSBACHead a').click(function()
	{
		if($(this).parents('div.sSBAccordRow').find('div.sSBACIn').is(':visible'))
		{ 
			return false; 
		}
		else
		{
			$('div.sSBACIn').each(function(){$(this).slideUp('slow');});
			$(this).parents('div.sSBAccordRow').find('div.sSBACIn').slideDown('slow');
		}
	});
	
	$('a.ssBCommAnchor').click(function(){
		$(this).parents('div.sSBAComm').find('div.sSBACForm').slideToggle();
	});
	
	$('input.sSBlogBut.submit').click(function(){
		
		var ret 		= true;
		var email_patt 	= '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}+$/';
		
		if($(this).parents('div.sSBACForm').find('input.textBox.name').val() == '')
		{
			$(this).parents('div.sSBACForm').find('input.textBox.name').css('border','1px solid red');
			ret = false;
		}
		else
		{
			$(this).parents('div.sSBACForm').find('input.textBox.name').css('border','1px solid #303030');
		}
		if($(this).parents('div.sSBACForm').find('input.textBox.email').val() == '' || !validateEmail($(this).parents('div.sSBACForm').find('input.textBox.email').val()) )
		{
			$(this).parents('div.sSBACForm').find('input.textBox.email').css('border','1px solid red');
			ret = false;
		}
		else
		{
			$(this).parents('div.sSBACForm').find('input.textBox.email').css('border','1px solid #303030');
		}
		if($(this).parents('div.sSBACForm').find('textarea.textArea.comments').val() == '')
		{
			$(this).parents('div.sSBACForm').find('textarea.textArea.comments').css('border','1px solid red');
			ret = false;
		}
		else
		{
			$(this).parents('div.sSBACForm').find('textarea.textArea.comments').css('border','1px solid #303030');
		}
		return ret;
	});	
});

function validateEmail ( email )
{
	var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test( trim(email) ) )
	{	
		return false;
	}
	return true;
}
function trim(str) {
    return str.replace(/^\s+|\s+$/g,'');
} 

