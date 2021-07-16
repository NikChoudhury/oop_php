<?php	
include 'database.php';
$obj = new Query;
// $condition_arr = array('name'=>'sssNik');
// $result = $obj->getData('users','*',$condition_arr,'id','desc','');
$result = $obj->getData('users','*','','id','desc','');
// print_r($result);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP Object Oriented Programming CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   	<style type="text/css">
   		.container{
   			margin-top: 110px;
   		}
   		.modal {
   		    display:    none;
   		    position:   fixed;
   		    z-index:    1000;
   		    top:        0;
   		    left:       0;
   		    height:     100%;
   		    width:      100%;
   		    background: rgba( 255, 255, 255, .8 ) 
   		                url('http://i.stack.imgur.com/FhHRx.gif') 
   		                50% 50% 
   		                no-repeat;            
   		}

   		/* When the body has the loading class, we turn
   		   the scrollbar off with overflow:hidden */
   		body.loading .modal {
   		    overflow: hidden;  
   		}

   		/* Anytime the body has the loading class, our
   		   modal element will be visible */
   		body.loading .modal {
   		    display: block;
   		}
   	</style>
</head>
<body>


	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Browse Users</strong>
				<a href="manage-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a>
			</div>

			<div class="card-body">
				<table class="table table-striped table-bordered table-responsive-sm">
				   <thead>
				   	<?php 
				   		if (isset($result[0])) {
				   		
				   	?>
				      <tr class="bg-primary text-white">
				         <th>Sl#</th>
				         <th>Name</th>
				         <th>Email</th>
				         <th>Mobile</th>
				         <th class="text-center">Added On</th>
				         <th class="text-center">Action</th>
				      </tr>
				   </thead>
				   <tbody>
				   	<?php 
				   		$sl=1;
				   		foreach ($result as $list) {
				   	?>
				      <tr id="row_<?php echo  $list['id']?>">
				         <td><?php echo $sl?></td>
				         <td><?php echo $list['name']?></td>
				         <td><?php echo $list['email']?></td>
				         <td><?php echo $list['mobile']?></td>
				         <td align="center">14th July 2021</td>
				         <td align="center" >
				            <a href="" class="text-primary"><i class="fa fa-fw fa-edit"></i> <span class="d-none d-lg-inline">Edit</span></a> | 
				            <a href="javascript:void(0)" id="aid_<?php echo $list['id']?>" class="text-danger" onclick="deleteRow(<?php echo $list["id"]?>)" disabled><i class="fa fa-fw fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></a>
				         </td>
				      </tr>

				      <?php
				      	$sl++;
				  		}
				      	}else{
				      ?>
				      <tr>
				         <td colspan="6" align="center">No Records Found!</td>
				      </tr>
				      <?php
				      	}
				      ?>
				   </tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal"><!-- Place at bottom of page --></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>

	<script>
		$body = $("body");

		$(document).on({
		    ajaxStart: function() { $body.addClass("loading");    },
		     ajaxStop: function() { $body.removeClass("loading"); }    
		});
		function deleteRow(id){
			 $("#aid_"+id).html('Wait..');
			  $("#row_"+id).hide(1000,function () {
            $(this).remove();
        });
	
			$.ajax({
				url: 'delete.php',
				type: 'post',
				data: {type: 'delete',id: id},
				success:function(response,status){
					var message = JSON.parse(response);
				      // alert(message) 
				      // console.log(response)  
				       // document.location.reload(true);
				}
			});
			
			
		}
	</script>
	<!-- Refresh Page and Keep Scroll Position -->
	<script>
	     document.addEventListener("DOMContentLoaded", function(event) { 
	         var scrollpos = localStorage.getItem('scrollpos');
	         if (scrollpos) window.scrollTo(0, scrollpos);
	     });

	     window.onbeforeunload = function(e) {
	         localStorage.setItem('scrollpos', window.scrollY);
	     };
	 </script>
</body>
</html>