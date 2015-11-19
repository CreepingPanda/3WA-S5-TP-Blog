$('.mpJS').hide();
$('.js_answer').click(function()
{
	var mpid = $(this).data('mp');
	$('.mp'+mpid).toggle();
});