@extends('layouts.app', ['activePage' => 'AIP', 'titlePage' => __('AIP')])
		<!-- javascript void link reference -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/table2.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>   <!-- humburgerv link-->
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <div class="card mb-4"  id="purok">
      <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                AIP
                            </div>

							<div class="col-sm-12">
                            @if(session()->has('message'))
								<div class="alert alert-success">
									{{ session()->get('message') }}
								</div>
							@endif
					    	</div>
							
                        <div class="col-sm-12">
                            <p align="right">
                               <!-- <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Add New Record</button>
								                <button class="btn btn-danger" data-toggle="modal">Export to PDF</button> -->
                                <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i></button>
                                <button class="btn btn-danger" data-toggle="modal"><i class="fas fa-file-download"></i></button>
                            </p>
					    </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="TableData">
                                    <thead>
                                        <tr>
											<th>ID</th>
                                            <th>Name</th>
                                            <th>address</th>
                                            <th>contact</th>
                                            <th>age</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>ID</th>
                                            <th>Name</th>
                                            <th>address</th>
                                            <th>contact</th>
                                            <th>age</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($aip as $aip) 
                                        <tr>
										<td>{{$aip->id}}</td>
                                        <td>{{$aip->name}}</td>
                                        <td>{{$aip->address}}</td>
                                        <td>{{$aip->contact}}</td>
                                        <td>{{$aip->age}}</td>
                                        <td>
                                            <!-- <a href="#editEmployeeModal" class="edit" class="editbtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
                                            <!-- <a href="#deleteEmployeeModal" class="delete" id="deletebtn" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
                                            <a href="javascript:void(0)" class="edit" id="editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                            <a href="javascript:void(0)" class="delete" id="deletebtn"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                        </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<form action="add_aip" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add AIP Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input name="name" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input name="address" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input name="contact" type="text" class="form-control" required>
							<!-- <textarea class="form-control" required></textarea> -->
						</div>
						<div class="form-group">
							<label>Age</label>
							<input name="age" type="text" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-primary" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<form action="editaip" method="post" enctype="multipart/form-data" id="editForm">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input name="EditName" type="text" class="form-control" id="EditName" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input name="EditAddress" type="text" class="form-control" id="EditAddress" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
              				<input name="EditContact" type="text" class="form-control" id="EditContact" required>
							<!-- <textarea class="form-control" id="phone" required></textarea> -->
						</div>
						<div class="form-group">
							<label>Age</label>
							<input name="EditAge" type="text" class="form-control" id="EditAge" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-primary" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form id="delete_modal_Form" method="POST">
				{{ csrf_field() }}
            	{{ method_field('DELETE') }}
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
					<input type="hidden" id="delete_youth_id">				
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>

			</div>
		</div>
	</div>
    
        </div>
      </div>
    </div>
  </div>
</div>

<script>
              $(document).ready(function(){

                  $('.TableData').on('click', '#deletebtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();
                      $('#delete_youth_id').val(data[0]);
                    //   $('#youth_name').val(data[1]);
                      $('#delete_modal_Form').attr('action', 'aip-delete/'+data[0]);
                      $('#deleteEmployeeModal').modal('show');
                  });

                  $('.TableData').on('click', '#editbtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();
					  
                      $('#EditName').val(data[1]);
                      $('#EditAddress').val(data[2]);
                      $('#EditContact').val(data[3]);
                      $('#EditAge').val(data[4]);
                      $('#editForm').attr('action', 'editaip/'+data[0]);
                      $('#editEmployeeModal').modal('show');
                  });
              });
        </script>


         <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>   <!-- grap link-->
        <script src="asset/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>  <!-- gride line table-->
        <script src="js/datatables-simple-demo.js"></script>
        <script src="asset/demo/chart-pie-demo.js"></script>
@endsection