function send_form(formObj,action,responseDIV)
{
    $.ajax({
        url: site+action, 
        data: $(formObj.elements).serialize(), 
        success: function(response){
                $(responseDIV).html(response);
            },
        type: "post", 
        dataType: "html"
    }); 
    return false;
}

function modalku(urlnya){
// create the backdrop and wait for next modal to be triggered
$('body').modalmanager('loading');	
	setTimeout(function(){
		$('#ajax-modalin').load(urlnya, '', function(){
		$('#ajax-modal').modal();			
		});		
	}, 200);
	
}


$('#ajax-modal').on('hide', function() {
   // console.log('hide');
	$('#ajax-modalin').html('');
});



function load_no_loading(page,div){
    $.ajax({
        url: site+page,
        success: function(response){
            $(div).html(response);
        },
        dataType:"html"  		
    });
    return false;
}


function notif(isi)
{
 $('.center').notify({
    message: { html: isi}
  }).show(); 
}