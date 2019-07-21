jQuery(document).ready(function()
{
 jQuery("#mytabs li:eq(0)").addClass("active");
 var liactive= jQuery("#mytabs li.active a").attr("href");
	jQuery(liactive).addClass("active");
});