@extends('layouts.app', ['activePage' => 'ProvincialAdminOffice', 'titlePage' => __('ProvincialAdminOffice')])
	  
    <!-- PDFmake link reference -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js" integrity="sha512-rDbVu5s98lzXZsmJoMa0DjHNE+RwPJACogUCLyq3Xxm2kJO6qsQwjbE5NDk2DqmlKcxDirCnU1wAzVLe12IM3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js" integrity="sha512-cktKDgjEiIkPVHYbn8bh/FEyYxmt4JDJJjOCu5/FQAkW4bc911XtKYValiyzBiJigjVEvrIAyQFEbRJZyDA1wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                                Provincial Administrator's Office
                            </div>

                <div class="col-sm-12">
                @if(session()->has('message'))
								<div class="alert alert-success">
									{{ session()->get('message') }}
								</div>
							  @endif
                @if(count($errors) > 0)
								<div class="alert alert-danger">
                  Upload Validation Error <br><br>
                  <ul>
                    @foreach($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                    @endforeach
                  </ul>
								</div>
							  @endif
					    	</div>
					 <!-- <button class="btn btn-danger" id="sample" onclick="sample();">ClickMe</button> -->
                    <div class="col-sm-12">
                        <div class="dropdown">
                                <button href="#addEmployeeModal" id="addData" class="btn" data-toggle="modal"><i class="fas fa-user-plus"></i> Add Data</button>
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Export<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a id="exportmenu" href="{{route('ProvincialAdmin_PDF')}}">PDF</a></li>
                                  <li><a id="exportmenu" href="ProvincialAdmin_Excel">Excel</a></li>
                                  <li><a id="exportmenu" href="#" onclick="window.open('PdfProvincialAdmin', '_blank', 'fullscreen=yes'); return false;">MyPDF</a> </li>
                                </ul>
                                <button href="#ImportDataModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-file-import"></i> Import Data</button>
                              </div>
                      </div>
                      <script>
                           function myFunction() {
                               document.getElementById("ProvincialAdmin_Excel").submit();
                           }
                      </script>
                      <style>
                        #exportmenu:hover{
                          color: #fff;
                          background-color: rgba(246, 39, 36, 0.8);  /* changed to blue */
                          border-color: rgba(246, 39, 36, 0.8);  /* changed to blue */
                        }
                        #addData{
                          background-color: #3477eb;
                        }
                      </style>
                            <div class="card-body">
                                <table id="datatablesSimple" class="TableData">
                                    <thead>
                                        <tr>
                                            <th>Property No.</th>
                                            <th>Particulars</th>
                                            <th>Date Aquired</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Accumulated Depreciation</th>
                                            <th>Net Book Value</th>
                                            <th>Remark</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											                      <th>Property No.</th>
                                            <th>Date Aquired</th>
                                            <th>Particulars</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total Cost</th>
                                            <th>Accumulated Depreciation</th>
                                            <th>Net Book Value</th>
                                            <th>Remark</th>
                                            <th>Operations</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $data) 
                                        <tr>
                                        <td>{{$data->Property_No}}</td>
                                        <td>{{$data->Particulars}}</td>
                                        <td>{{$data->Date_Aquired}}</td>
                                        <td>{{$data->Quantity}}</td>
                                        <td>{{$data->Unit_Cost}}</td>
                                        <td>{{$data->Total_Cost}}</td>
                                        <td>{{$data->Accumulated_Depreciation}}</td>
                                        <td>{{$data->NetBookValue}}</td>
                                        <td>{{$data->Remark}}</td>
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
	<!-- Import Data Modal HTML -->
	<div id="ImportDataModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

      <form action="ImportProvincialAdminOffice" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Import Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
						<p>Select Excel File to Import:</p>
				    <input type="file" name="select_file">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-primary" value="Import">
					</div>
				</form>

			</div>
		</div>
	</div>
  <!--  Import Data Modal HTML -->  
                        <!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
			<form action="add_ProvincialAdminData" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add Provincial Admin Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
                  <div class="row">
                    <div class="col-6">
                      <label>Property No.</label>
                      <input name="Property_No" type="text" class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label>Date Aquired</label>
                      <input name="Date_Aquired" type="date" class="form-control">
                    </div>
                </div>
                <br>
            
            <div class="form-group">
              <div class="col-12">
                <label>Particulars</label>
                <input name="Particulars" type="text" class="form-control">
              </div>	
						</div>		

                <div class="row">
                    <div class="col-4">
                      <label>Quantity</label>
                      <input name="Quantity" type="text" class="form-control" >
                    </div>
                  
                    <div class="col-4">
                      <label>Unit Cost</label>
                      <input name="Unit_Cost" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Total Cost</label>
                      <input name="Total_Cost" type="text" class="form-control" >
                    </div>
                </div>
                <br>
         
                <div class="row">
                    <div class="col-6">
                      <label>Accumulated Depreciation</label>
                      <input name="Accumulated_Depreciation" type="text" class="form-control" >
                    </div>
                    <div class="col-6">
                      <label>Net Book Value</label>
                      <input name="NetBookValue" type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-12">
                        <label>Remark</label>
                        <input name="Remark" type="text" class="form-control" >
                  </div>	
						    </div>		
                <br>
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
      <form action="editProvincialAdminOffice" method="post" enctype="multipart/form-data" id="editForm">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Edit Provincial Admin Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
                  <div class="row">
                    <div class="col-6">
                      <label>Property No.</label>
                      <input name="EditProperty_No" id="EditProperty_No" type="text" class="form-control">
                    </div>
                    <div class="col-6">
                      <label>Date Aquired</label>
                      <input name="EditDate_Aquired" id="EditDate_Aquired" type="date" class="form-control">
                    </div>
                </div>
                <br>
            
            <div class="form-group">
              <div class="col-12">
                <label>Particulars</label>
                <input name="EditParticulars" id="EditParticulars" type="text" class="form-control">
              </div>	
						</div>		

                <div class="row">
                    <div class="col-4">
                      <label>Quantity</label>
                      <input name="EditQuantity" id="EditQuantity" type="text" class="form-control" >
                    </div>
                  
                    <div class="col-4">
                      <label>Unit Cost</label>
                      <input name="EditUnit_Cost" id="EditUnit_Cost" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Total Cost</label>
                      <input name="EditTotal_Cost" id="EditTotal_Cost" type="text" class="form-control" >
                    </div>
                </div>
                <br>
         
                <div class="row">
                    <div class="col-6">
                      <label>Accumulated Depreciation</label>
                      <input name="EditAccumulated_Depreciation" id="EditAccumulated_Depreciation" type="text" class="form-control" >
                    </div>
                    <div class="col-6">
                      <label>Net Book Value</label>
                      <input name="EditNetBookValue" id="EditNetBookValue" type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-12">
                        <label>Remark</label>
                        <input name="EditRemark" id="EditRemark" type="text" class="form-control" >
                  </div>	
						    </div>		
                <br>
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
  <!-- Delete End -->
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
                      $('#delete_modal_Form').attr('action', 'ProvincialAdmin-delete/'+data[0]);
                      $('#deleteEmployeeModal').modal('show');
                  });

                  $('.TableData').on('click', '#editbtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();
                      EditDate_Aquired
                      $('#EditProperty_No').val(data[0]);
                      $('#EditParticulars').val(data[1]);
                      $('#EditDate_Aquired').val(data[2]);
                      $('#EditQuantity').val(data[3]);
                      $('#EditUnit_Cost').val(data[4]);
                      $('#EditTotal_Cost').val(data[5]);
                      $('#EditAccumulated_Depreciation').val(data[6]);
                      $('#EditNetBookValue').val(data[7]);
                      $('#EditRemark').val(data[8]);
                     
                      // $('#delete_modal_Form').attr('action', 'assets-delete/'+data[0]);
                      $('#editForm').attr('action', 'editProvincialAdmin/'+data[0]);
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