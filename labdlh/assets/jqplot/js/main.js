$(function(){
	$("#content").fadeIn('slow');
 

	$('.carousel').carousel({
	  interval: 3000
	});

        $('#link_type').change(function() {
						
            if ($(this).val() == 'page')
            {
                $('.url_div').hide();    
                $('.page_div').show();
				console.log('page');
            }
            else
            {
                $('.page_div').hide();    
                $('.url_div').show();  
				console.log('nopage');
            }
        });

        $('#link_type').trigger('change')	 
});

function switch_menu(obj)
{
	$("ul > li").attr("class", "");
    $(obj).attr("class", "active");
}

function switch_sub_menu(obj)
{
	$("#submenu ul > li").attr("class", "");
    $(obj).attr("class", "active");
}

function switch_sub_menu_lagi(obj)
{
	$("#submenulagi ul > li").attr("class", "");
    $(obj).attr("class", "active");
}



function load(page,div){
	
   var image_load = "<div class='text-center'><img src='"+site+"assets/img/ajax-loader.gif' /></div>";
    $.ajax({
        url: site+page,
        beforeSend: function(){
            $(div).html(image_load);
        },
        success: function(response){
            $(div).html(response);
			//$('title').text(title);

        },
      	error: function (xhr, ajaxOptions, thrownError) {
        	alert(xhr.status);
        	alert(thrownError);
      	},
        dataType:"html"  		
    });
    return false;
}


