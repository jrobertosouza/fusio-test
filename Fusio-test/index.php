<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
	<br/>
	<h1>FUSIO test</h1>
	<br/>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">Add Client</button>
			<hr/>
		</div>
		<div class="col-md-12">
			<h2>All Clients </h2><br/>
			<table id="client-table" class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th>Password</th>
						<th>Name</th>
						<th>Address 1</th>
						<th>Address 2</th>
						<th>Country</th>
						<th>Eircode</th>
						<th>profile_picture</th>
					</tr>
				</thead>
				<tbody></tbody>			
			</table>
		</div>
	</div>
</div>

<div aria-hidden="true" aria-labelledby="insert" class="modal fade" id="insert" role="dialog" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="client-form" method="post" name="client-form" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="insert">Add Client</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-4 col-form-label" for="exampleInputEmail1">Email address</label>
						<div class="col-8"><input class="form-control" name="your_email" placeholder="Email" required="" type="email"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Password">Password</label>
						<div class="col-8"><input class="form-control" name="your_password" required="" type="password"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Name">Name</label>
						<div class="col-8"><input class="form-control" name="your_name" placeholder="Name" required="" type="text"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Address_1">Address 1</label>
						<div class="col-8"><input class="form-control" name="your_address_1" placeholder="Address 1" required="" type="text"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Address_2">Address 2</label>
						<div class="col-8"><input class="form-control" name="your_address_2" placeholder="Address 2" required="" type="text"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Country">Select list:</label>
						<div class="col-8">
							<select class="form-control" name="your_country">
								<option selected="selected">Ireland</option>
								<option>Portugal</option>
								<option>Brazil</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Eircode">Eircode</label>
						<div class="col-8"><input class="form-control" name="your_eircode" placeholder="Eircode" required="" type="text"></div>
					</div>
					<div class="form-group row">
						<label class="col-4 col-form-label" for="Profile_Picture">Profile picture</label>
						<div class="col-8"><input class="form-control" name="your_profile_picture" required="" type="file" accept="image/jpeg, image/jpg"></div>
					</div>
				</div>
				<div class="modal-footer">		
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary" id="submit_form" name="submit" type="submit" value="Submit">Submit</button>				
					<div class="response_msg"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script> 
$(document).ready(function() {
	
	var loadUsers = function() {
		$.ajax({    //create an ajax request to display.php
			type: "GET",
			url: "php/get.php",             
			dataType: "html",   //expect html to be returned                
			success: function(response){                    
				$("table#client-table tbody").html(response); 
				//alert(response);
			}

		});
	};
	
	loadUsers();

	$("#client-form").on("submit", function(e) {
		e.preventDefault();
		if ($("#client-form [name='your_name']").val() === '') {
			$("#client-form [name='your_name']").css("border", "1px solid red");
		} else if ($("#client-form [name='your_email']").val() === '') {
			$("#client-form [name='your_email']").css("border", "1px solid red");
		} else {
			var sendData = new FormData(this);
			$.ajax({
				type: "POST",
				url: "php/insert.php",
				data: sendData,
				success: function(data) {
					$(".response_msg").text(data);
					$(".response_msg").slideDown().fadeOut(3000);
					$("#client-form").find("input[type=text], input[type=email], textarea").val("");
					
					setTimeout(function(){
						$('#insert').modal('hide');
						loadUsers();
					}, 2000);
				},
				cache: false,
				contentType: false,
				processData: false
			});
		}
	});
	$("#client-form input").blur(function() {
		var checkValue = $(this).val();
		if (checkValue != '') {
			$(this).css("border", "1px solid #eeeeee");
		}
	});
}); 
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>