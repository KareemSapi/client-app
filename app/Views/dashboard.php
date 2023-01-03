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

	$.get(url, function(data,success){
	    let arr = []
		arr = data.data

		for(let i = 0; i < arr.length; i++){
			$('#tbody')
			  .append(
				`<tr><td id="id">${arr[i].id}</td><td>${arr[i].first_name} ${arr[i].last_name}</td><td>${arr[i].email}</td><td>${arr[i].gender}</td><td>${arr[i].date_of_birth}</td><td>${arr[i].position}</td><td id="contacts">${[...new Set(JSON.parse(arr[i].phone))].length + [...new Set(JSON.parse(arr[i].address))].length} contacts</td></tr>`
			  )

		}
	})

	$(document).on('click', '#contacts', function(){
		let id = $(this).siblings('#id').text()
		let url2 = `http://localhost:8080/clients/${id}`
		
		$.get(url2, function(data, success){
			let arr = []
		    arr = data.data
			let phone = [...new Set(JSON.parse(arr[0].phone))]
			let address = [...new Set(JSON.parse(arr[0].address))]

			$(`<p>Phone: ${phone}<br>Address: ${address}</p>`).appendTo('#contacts')

		})
	})

	function redirect(){
		window.location.replace('http://localhost:8080/clients/create')
	}

	$('#add').click(function(e){
		redirect()
	})
})
</script>
</body>
</html>
