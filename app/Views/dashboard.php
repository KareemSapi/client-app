<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="../../public/styles.css"> -->

    <title>CodeIgniter Tutorial</title>
	
</head>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
	    <a class="nav-link active ms-0" href="http://localhost:8080/clients">Home</a>
        <a class="nav-link" href="http://localhost:8080/clients/create">Add Client</a>
        <a class="nav-link" href="#">About</a>
        <a class="nav-link" href="#">Notifications</a>
    </nav>
	<hr class="mt-0 mb-4">
    <div class="row d-flex align-items-center justify-content-center">
		<div class="col-sm-8 col-sm-offset-2">
			<button class="btn btn-primary" id="add"><span class="glyphicon glyphicon-plus"></span> Add New</button>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<tr>
						<th>ID</th>
						<th>FullName</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Position</th>
						<th>Contacts</th>
						<!-- <th>Addresses</th> -->
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
		</div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	let url = 'http://localhost:8080/data'
	let arr = []

	$.get(url, function(data,success){
		arr = data.data
		//<td>${[...new Set(JSON.parse(arr[i].address))].length}</td>

		for(let i = 0; i < arr.length; i++){
			$('#tbody')
			  .append(
				`<tr><td id="id">${arr[i].id}</td><td>${arr[i].first_name} ${arr[i].last_name}</td><td>${arr[i].email}</td><td>${arr[i].gender}</td><td>${arr[i].date_of_birth}</td><td>${arr[i].position}</td><td id="contacts">${[...new Set(JSON.parse(arr[i].phone))].length + [...new Set(JSON.parse(arr[i].address))].length}</td></tr>`
			  )

			//   $('#contacts').click(function(e){
			// 	let phone = [...new Set(JSON.parse(arr[i].phone))]
			// 	let address = [...new Set(JSON.parse(arr[i].address))]
			// 	$(`<p>${phone}<br>${address}</p>`).appendTo('#contacts')
			//   })
		}
	})

	$('tr').click(function(e){
		let id = $('#id').text()
		console.log(id);
	})

	function redirect(){
		window.location.replace('http://localhost:8080/clients/create')
	}

	$('#add').click(function(e){
		redirect()
	})
})

// $(document).ready(function(){
// 	//create a global variable for our base url
// 	var url = '<?php echo base_url(); ?>';
 
// 	//fetch table data
// 	showTable();
 
// 	//show add modal
// 	$('#add').click(function(){
// 		$('#addnew').modal('show');
// 		$('#addForm')[0].reset();
// 	});
 
// 	//submit add form
// 	$('#addForm').submit(function(e){
// 		e.preventDefault();
// 		var user = $('#addForm').serialize();
// 			$.ajax({
// 				type: 'POST',
// 				url: url + 'user/insert',
// 				data: user,
// 				success:function(){
// 					$('#addnew').modal('hide');
// 					showTable();
// 				}
// 			});
// 	});
 
// 	//show edit modal
// 	$(document).on('click', '.edit', function(){
// 		var id = $(this).data('id');
// 		$.ajax({
// 			type: 'POST',
// 			url: url + 'user/getuser',
// 			dataType: 'json',
// 			data: {id: id},
// 			success:function(response){
// 				console.log(response);
// 				$('#email').val(response.email);
// 				$('#password').val(response.password);
// 				$('#fname').val(response.fname);
// 				$('#userid').val(response.id);
// 				$('#editmodal').modal('show');
// 			}
// 		});
// 	});
 
// 	//update selected user
// 	$('#editForm').submit(function(e){
// 		e.preventDefault();
// 		var user = $('#editForm').serialize();
// 		$.ajax({
// 			type: 'POST',
// 			url: url + 'user/update',
// 			data: user,
// 			success:function(){
// 				$('#editmodal').modal('hide');
// 				showTable();
// 			}
// 		});
// 	});
 
// 	//show delete modal
// 	$(document).on('click', '.delete', function(){
// 		var id = $(this).data('id');
// 		$.ajax({
// 			type: 'POST',
// 			url: url + 'user/getuser',
// 			dataType: 'json',
// 			data: {id: id},
// 			success:function(response){
// 				console.log(response);
// 				$('#delfname').html(response.fname);
// 				$('#delid').val(response.id);
// 				$('#delmodal').modal('show');
// 			}
// 		});
// 	});
 
// 	$('#delid').click(function(){
// 		var id = $(this).val();
// 		$.ajax({
// 			type: 'POST',
// 			url: url + 'user/delete',
// 			data: {id: id},
// 			success:function(){
// 				$('#delmodal').modal('hide');
// 				showTable();
// 			}
// 		});
// 	});
 
// });
 
function showTable(){
	var url = '<?php echo base_url(); ?>';
	$.ajax({
		type: 'POST',
		url: url + 'user/show',
		success:function(response){
			$('#tbody').html(response);
		}
	});
}
</script>
</body>
</html>
