<?php	
  include 'database.php';
  $obj = new Query;
  // $condition_arr = array('name'=>'sssNik');
  // $result = $obj->getData('users','*',$condition_arr,'id','desc','');
  $result = $obj->getData('trash','*','','trash_id','desc','');
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
          <strong>Trash</strong>
          <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>
          <button id="multiDeleteBtn" class="btn btn-danger btn-sm ml-2" style="display: none;"><i class="fa fa-fw fa-trash"></i><span class="d-none d-lg-inline"> Delete</span></button>
          <button id="multiRestoreBtn" class="btn btn-success btn-sm ml-2" style="display: none;"><i class="fa fa-fw fa-undo"></i> <span class="d-none d-lg-inline"> Restore </span></button>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
              <?php 
                if (isset($result[0])) {
              ?>
              <tr class="bg-primary text-white">
                <th class="text-center"><input type="checkbox" name="" id="checkAll" ></th>
                <th>Sl#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
              </tr>
            </thead>
            <tbody id="recordsRow">
              <?php 
                $sl=1;
                foreach ($result as $list) {
                ?>
              <tr id="row_<?php echo $list['trash_id']?>">
                <td class="text-center">
                	<input type="checkbox" name="users_id[]" value="<?php echo $list["trash_id"];?>" class="checkbox_class" id="checkbox_id">
                </td>
                <td><?php echo $sl?></td>
                <td><?php echo $list['name']?></td>
                <td><?php echo $list['email']?></td>
                <td><?php echo $list['mobile']?></td>
              </tr>
              <?php $sl++; }?>
              <!--   <tr id="tablefooter" style="display: flex;">
                <td colspan="6"><input type="button" name="delete" value="Delete"  onClick="setDeleteAction();" /></td>
                </tr> -->
              <?php	}else{ ?>
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
    <div class="modal">
      <!-- Place at bottom of page -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
    <!-- Checkbox Click And Show Delete And Restore Btn -->
    <script type="text/javascript">
      $(document).ready(function(){
          $('#checkAll').on('click',function(){
          	
              if(this.checked){
                  $('.checkbox_class').each(function(){
                      this.checked = true;
                    
                  });
              }else{
                   $('.checkbox_class').each(function(){
                      this.checked = false;
                  });
              }
      
          });
          
          $('.checkbox_class').on('click',function(){
          	
              if($('.checkbox_class:checked').length == $('.checkbox_class').length){
                  $('#checkAll').prop('checked',true);
                 	
              }else{
                  $('#checkAll').prop('checked',false);
              }
              
          });
      });
      
      $("input[type='checkbox']").change(function() {
          var atLeastOneChecked = false;
          $("input[type='checkbox']").each(function(index) {
            if ($(this).prop('checked'))
              atLeastOneChecked = true;
          });
          if (atLeastOneChecked) {
            $("#multiDeleteBtn").show(); 
            $("#multiDeleteBtn").css('display','inline-block'); 
            $("#multiRestoreBtn").show(); 
            $("#multiRestoreBtn").css('display','inline-block'); 
          } else {
            $("#multiDeleteBtn").hide(); 
            $("#multiDeleteBtn").css('display','none');
            $("#multiRestoreBtn").hide(); 
            $("#multiRestoreBtn").css('display','none');
          }
      });
    </script>
    <script>
      $body = $("body");
      
      $(document).on({
          ajaxStart: function() { $body.addClass("loading");    },
           ajaxStop: function() { $body.removeClass("loading"); }    
      });
      //Multiple Delete 
      $(document).ready(function(){
      	$("#multiDeleteBtn").on('click', function() {
      		// var id_arr = [];
      		var inputs = $("input[type='checkbox']");
                    var id_arr=[];
                    var res;
                    for(var i = 0; i < inputs.length; i++) 
                    { 
                        var type = inputs[i].getAttribute("type");
                        if(type == "checkbox") 
                        {
                            if(inputs[i].id=="checkbox_id" && inputs[i].checked){
                                id_arr.push(inputs[i].value);
                            }
                        } 
                    }
                    res= confirm("Are you sure ?");
                    if(res){
                    	id_arr.forEach((id) => {
                    	    	$("#row_"+id).hide(1000,function () {
                    	          $(this).remove();
                    	     });
                    	    	
                    	})
                    	$.post('delete.php', {type: 'multidelete',data: id_arr}, function() {
                    		 setInterval(function() {
                    		      location.reload();
                    		 }, 1000);   
                    	});
                    }
      
      	});
      })
      
      // Multiple Restore
      
      $(document).ready(function(){
      	$("#multiRestoreBtn").on('click', function() {
      		// var id_arr = [];
      		var inputs = $("input[type='checkbox']");
                    var id_arr=[];
                    var res;
                    for(var i = 0; i < inputs.length; i++) 
                    { 
                        var type = inputs[i].getAttribute("type");
                        if(type == "checkbox") 
                        {
                            if(inputs[i].id=="checkbox_id" && inputs[i].checked){
                                id_arr.push(inputs[i].value);
                            }
                        } 
                    }
                    res= confirm("Are you sure ?");
                    if(res){
                    	id_arr.forEach((id) => {
                    	    	$("#row_"+id).hide(1000,function () {
                    	          $(this).remove();
                    	     });
                    	    	
                    	})
                    	$.post('delete.php', {type: 'multirestore',data: id_arr}, function() {
                    		setInterval(function() {
                    		      location.reload();
                    		 }, 1000);   		
                    	});
                    }
      
      	});
      })
      
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