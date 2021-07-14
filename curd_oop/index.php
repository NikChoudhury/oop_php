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
				<strong>Browse Users</strong>
				<a href="manage-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a>
			</div>

			<div class="card-body">
				<table class="table table-striped table-bordered table-responsive-sm">
				   <thead>
				      <tr class="bg-primary text-white">
				         <th>Sr#</th>
				         <th>Name</th>
				         <th>Email</th>
				         <th>Mobile</th>
				         <th class="text-center">Added On</th>
				         <th class="text-center">Action</th>
				      </tr>
				   </thead>
				   <tbody>
				      <tr>
				         <td>1</td>
				         <td>Nikumani</td>
				         <td>nikunchoudhury@gmail.com</td>
				         <td>1234567890</td>
				         <td align="center">14th July 2021</td>
				         <td align="center">
				            <a href="" class="text-primary"><i class="fa fa-fw fa-edit"></i> <span class="d-none d-lg-inline">Edit</span></a> | 
				            <a href="" class="text-danger"><i class="fa fa-fw fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></a>
				         </td>
				      </tr>
				      <!--<tr>
				         <td colspan="6" align="center">No Records Found!</td>
				      </tr>-->
				   </tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
</body>
</html>