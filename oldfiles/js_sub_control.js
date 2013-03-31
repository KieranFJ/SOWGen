$(document).ready(function() {
	
	//$('#loader').hide();        
	
	$('.parent').livequery('change', function() {
		
		$(this).nextAll('.parent').remove();                
		$(this).nextAll('label').remove();
                $('.info').empty();
                
		
		$('#show_sub_categories').append('<img src="loader.gif" style="float:left; margin-top:7px;" id="loader" alt="" />');
                
		$.post("./php/get_child_categories.php", {
			parent_id: $(this).val(),
		}, function(response){
			
			setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
		});
                
                $.post("./php/get_parent_info.php", {
			parent_id: $(this).val(),
		}, function(response){
			
			setTimeout("finishAjax('show_parent_info', '"+escape(response)+"')", 400);
		});
		
		return false;
	});
        
        $('.parent').livequery('change', function(){
            
            $('.info').empty();
            return false;
            $(this).c
        });
});

function finishAjax(id, response){
  $('#loader').remove();

  $('#'+id).append(unescape(response));
}