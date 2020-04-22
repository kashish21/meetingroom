$(document).ready(function(){

	$('.close-btn').click(function(){
		window.location.href = _base_url+"student/home";
	});

	// $('.file-search').keyup(function(){
	// 	var search_data = $(this).val();
	// 	$.ajax({
	// 		type:"post",
	// 		data:{"search_data":search_data},
	// 		url:_base_url + "student/Home/file_search",
	// 		success:function(result)
	// 		{
	// 			var obj = JSON.parse(result);
	// 			$.each( obj, function( key, value ) {
	// 			 	$('.folder-search-data').append(
	// 					'<a class="f-b" href="'+_base_url+'folder/'+value.seo_url+'"> <div class="d-flex flex-row"> <div class="p-0"><img src="'+_base_url+'assets/student/images/icon/folder.png" width="80px"></div> <div class="p-2"> <h4 class="folder-h">'+value.name+'</h4> <p class="folder-p">'+value.description+'</p> </div> </div> </a>'
	// 				);
	// 			});
					
	// 			console.log(result);
	// 		}
	// 	});
	// });

	// function get_task_data()
	// {
	// 	var folder_seourl = $('#foder_seourl').val();
	// 	var seourl = $('#seourl').val();
		
	// 	$.ajax({
	// 		type:"post",
	// 		data:{},
	// 		url:_base_url + "student/Home/get_task_data/"+folder_seourl+"/"+seourl,
	// 		success:function(result)
	// 		{
	// 			var task_obj = JSON.parse(result);
	// 			$.each( task_obj, function( key, value ) {
	// 			 	$('#task_data').append(
	// 					'<input type="checkbox"  id="box-'+value.id+'" name="task" class="box" data-id="'+value.id+'" ><label for="box-'+value.id+'" class="taskname"><a  href="'+_base_url+'task-details/'+value.category_seourl+'/'+value.seo_url+'">'+value.task_name+'</a></label>'
	// 				);
	// 			});
				
	// 		}
	// 	});
	// }

	// get_task_data();

	  $(document).on('click','.box',function(){
	  		var task_id = $(this).attr('data-id');
	  		var categoryid = $(this).attr('data-categoryid');
	  		var orderid = $(this).attr('data-orderid');
	  		var parent_cate_id = $(this).attr('data-parent_cate_id');
		  var ckb = $(this).is(':checked');
		  // alert(ckb);
			$.ajax({
				type:"post",
				data:{},
				url:_base_url + "student/Home/task_status/"+task_id+"/"+ckb+"/"+categoryid+"/"+orderid+"/"+parent_cate_id,
				beforeSend: function () {
	                $("#task_data").empty();
	                
            	},            
				success:function(result)
				{
					// get_task_data();
				}
			});
	  });

	
	 

});