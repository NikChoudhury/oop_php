<?php	
include 'database.php';
$obj = new Query;
// $result = $obj->getData('users','*','','id','desc','');
$name = '';
$email = '';
$mobile = '';
$id = '';
// Edit User
if (isset($_GET['id']) && $_GET['id']!='' && $_GET['id']>0) {
	$id = $obj->get_safe_str($_GET['id']);
	$condition_arr = array('id'=>$id);
	$result = $obj->getData('users','*',$condition_arr);
	
	$name = $result[0]['name'];
	$email = $result[0]['email'];
	$mobile = $result[0]['mobile'];

	// die();
}

// Add User

if (isset($_POST['submit'])) {
	$name = $obj->get_safe_str($_POST['name']);
	$email = $obj->get_safe_str($_POST['email']);
	$mobile = $obj->get_safe_str($_POST['mobile']);
	$condition_arr = array('name'=>$name,'email'=>$email,'mobile'=>$mobile);
	if ($id=='') {
		$obj->insertData('users',$condition_arr);
	}else{
		$obj->updateData('users',$condition_arr,'id',$id);
	}
	
	?>
	<script type="text/javascript">
		window.location.href ='index.php';
	</script>
<?php	
}


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
   	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Add Users</strong>
				<a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a>
			</div>
			<div class="card-body">
				<div class="col-sm-6 col-md-12">
					<form method="post" action="">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name?>" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email?>" required>
						</div>
						<div class="form-group">
							<label>Mobile</label>
							<input type="tel" name="mobile" class="form-control" placeholder="Enter Mobile" value="<?php echo $mobile?>" required>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" id="submit" class="btn btn-primary"><?php if($id==''){
								echo "Add User";
							}else{
								echo "Edit User";
							}?>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>


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