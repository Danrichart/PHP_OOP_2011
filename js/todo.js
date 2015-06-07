
$(document).ready(function() {
	$(window).resizeTo(455, 770);
	$(":text").focus(); // put focus on input text field
	
	// inputing new list on submit
	$("#wrap_add form").submit(function(){ 
		
		//assign vars
		userId = $('#user_id').val();
		newList = $('#add_list').val();
		listPos = $('#list li').size()+1;
		
		//hide add button and display loading animation
		$('#add').css('visibility', 'hidden');
		$('#waiting').show(500);
			
		//if something is entered in on submit start insert into database
		if( newList.length > 0 ) {
			var request = $.ajax({
				url: "action_switch.php",
				type: "POST",
				dataType: "json",
				data: {
					action : "add", 
					userId : userId, 
					newList : newList, 
					listPos : listPos
				}
			});
		
			//if success
			request.done(function(data) {
				$('#add_list').val("");
				$('#waiting').hide();
				$('#add').css('visibility', 'visible');
				$('#list').prepend('<li id="'+data.id+'" rel="'+data.userId+'">'+newList+'<span class="done"> done</span></li>'); 
			});	
				
			//if fail
			request.fail(function(jqXHR, textStatus) {
				$('#add_list').val("");
				$('#waiting').hide();
				$('#add').css('visibility', 'visible');
				alert( "Request failed: " + textStatus );
			})
		}
		else {
			$('#add_list').val("");
		}  // end else
			
		return false; //prevent default 
	}); // end submit
	
	
	$('.done').live('click', function() {
		id = $(this).parent().attr('id');
		userId = $(this).parent().attr('rel');
		$(this).parent().fadeOut("slow");
		var request = $.ajax({
			url: "action_switch.php",
			type: "POST",
			dataType: "json",
			data: {
				action: "delete", 
				userId : userId, 
				id : id
			}
		});  
	});

	$('#list').sortable();
	
}); // end ready
	