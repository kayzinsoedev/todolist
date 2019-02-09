function edit_show_note(id,title,description,token){
	$("#edit_note_id"+id).val(id);
	$("#edit_note_title"+id).val(title);
	$("#edit_note_description"+id).val(description);
	$('#edit_note'+id).show();
}

function addTask(token){
	if($('input[name=title]').val() == ""){
		alert("Please Enter To do Item");
	}else{
		$.ajax({
	        type: 'post',
	        url: './addItem',
	        data: {
	            '_token': token,
	            'title': $('input[name=title]').val(),
	            'user_id': $('input[name=user_id]').val()
	        },
	        success: function(data) {
	            if ((data.errors)) {
	                console.log("error");
	            } else {
	            	window.location.reload();
	            	console.log(data);
	                console.log("success");
	            }
	        },
    	});
    	$('#task_title').val('');
	}      
}

// Check TodoList
function add(taskid,token,ck){
	if(ck.checked){
		var status =1;
	}else{
		var status = 0;
	}   	
	$.ajax({
   		type: 'post',
        url: './editItem',
        data: {
        	"id": taskid,
        	"method": 'update',
            '_token': token,
            'status': status

        },
        success: function(data) {	
           window.location.reload();             
           console.log("success");
           console.log(data);
        },
        error: function(data){
        	console.log("error");						
        }
	});	 
}	

function delete_task(id,token){
  	$.ajax({
        type: 'post',
        url: './deleteItem/'+id,
        data: {
        	"id": id,
        	"method": 'delete',
            '_token': token,
        },
        success: function(data) {  
           window.location.reload();        
           console.log("success");
        },
        error: function(data){
        	console.log("error");
        }
    }); 
}

function addNote(token){
	if($('input[name=note_title]').val() == ""){
		alert("Please Enter Note");
	}else if($('textarea[name=description]').val() == ""){
		alert("Please Enter Description");
	}else{
		$.ajax({		
	        type: 'post',
	        url: './addNote',
	        data: {
	        	_token: token,
	            'title': $('input[name=note_title]').val(),
	            'description': $('textarea[name=description]').val(),
	            'user_id': $('input[name=user_id]').val()
	           
	        },
	        success: function(data) {
	            if (data.errors) {
	                console.log("error");
	            } else {
	               console.log(data);
	               window.location.reload();
	               console.log("success");
	            }
	        },
	    });
    	$('#note_title').val('');    
    	$('#description').val(''); 
    }
       
}

function cancelnote(id){
	$('#edit_note'+id).hide();

}

function delete_note(id,token){
  	$.ajax({
        type: 'post',
        url: './deleteNote/'+id,
        data: {
        	"id": id,
        	"method": 'delete',
            '_token': token,
        },
        success: function(data) {
           window.location.reload();
           console.log("success");
        },
        error: function(data){
        	console.log("error");
        }
    });
}





