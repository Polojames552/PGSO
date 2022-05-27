@extends('layouts.app', ['activePage' => 'Tourism', 'titlePage' => __('Tourism')])
	  
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
                                Tourism
                            </div>

							<div class="col-sm-12">
                            @if(session()->has('message'))
								<div class="alert alert-success">
									{{ session()->get('message') }}
								</div>
							@endif
					    	</div>
					 <!-- <button class="btn btn-danger" id="sample" onclick="sample();">ClickMe</button> -->
                    <div class="col-sm-12">
                        <div class="dropdown">
                                <button href="#addEmployeeModal" class="btn btn-primary" data-toggle="modal"><i class="fas fa-user-plus"></i> Add Data</button>
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Export<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a id="exportmenu" href="{{route('Tourism_PDF')}}">PDF</a></li>
                                  <li><a id="exportmenu" href="Tourism_export">Excel</a></li>
                                  <li><a id="exportmenu" href="#" onclick="window.open('PdfTourism', '_blank', 'fullscreen=yes'); return false;">MyPDF</a> </li>
                                </ul>
                                <button class="btn btn-success"><i class="fas fa-file-import"></i> Import Data</button>
                              </div>
                      </div>
                      <script>
                           function myFunction() {
                               document.getElementById("tour_Excel").submit();
                           }
                      </script>
                      <style>
                        #exportmenu:hover{
                          color: #fff;
                          background-color: rgba(246, 39, 36, 0.8);  /* changed to blue */
                          border-color: rgba(246, 39, 36, 0.8);  /* changed to blue */
                        }
                      </style>
                            <div class="card-body">
                                <table id="datatablesSimple" class="TableData">
                                    <thead>
                                        <tr>
											<th>Property No.</th>
                                            <th>Description</th>
                                            <th>Date Aquired</th>
                                            <th>Aquisition Cost</th>
                                            <th>Accountable Person</th>
                                            <th>Location</th>
                                            <th>Med. Dental & Lab. Equipment</th>
                                            <th>Office Equipment</th>
                                            <th>Hospital Equipment</th>
                                            <th>Furniture & Fixtures</th>
                                            <th>MotorVehicles</th>
                                            <th>Information Technology</th>
                                            <th>Other Machineries Equipment</th>
                                            <th>Other Asset</th>
                                            <th>Remark</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Property No.</th>
                                            <th>Description</th>
                                            <th>Date Aquired</th>
                                            <th>Aquisition Cost</th>
                                            <th>Accountable Person</th>
                                            <th>Location</th>
                                            <th>Med. Dental & Lab. Equipment</th>
                                            <th>Office Equipment</th>
                                            <th>Hospital Equipment</th>
                                            <th>Furniture & Fixtures</th>
                                            <th>MotorVehicles</th>
                                            <th>Information Technology</th>
                                            <th>Other Machineries Equipment</th>
                                            <th>Other Asset</th>
                                            <th>Remark</th>
                                            <th>Operations</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($tour as $tour) 
                                        <tr>
										<td>{{$tour->Property_No}}</td>
                                        <td>{{$tour->Description}}</td>
                                        <td>{{$tour->Date_Aquired}}</td>
                                        <td>{{$tour->Aquisition_Cost}}</td>
                                        <td>{{$tour->Accountable_Person}}</td>
                                        <td>{{$tour->Location}}</td>
                                        <td>{{$tour->Med_dental_equipment}}</td>
                                        <td>{{$tour->Office_Eq}}</td>
                                        <td>{{$tour->Hospital_Eq}}</td>
                                        <td>{{$tour->FurnitureNFixtures}}</td>
                                        <td>{{$tour->Motor_Vehicles}}</td>
                                        <td>{{$tour->Info_Tech}}</td>
                                        <td>{{$tour->Other_Machine_Eq}}</td>
                                        <td>{{$tour->Other_Asset}}</td>
                                        <td>{{$tour->Remark}}</td>
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
			<form action="add_tourism" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add Tourism Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
                  <div class="row">
                    <div class="col-4">
                      <label>Property No.</label>
                      <input name="Property_No" type="text" class="form-control" required>
                    </div>
                    <div class="col-4">
                      <label>Date Aquired</label>
                      <input name="Date_Aquired" type="text" class="form-control">
                    </div>
                    <div class="col-4">
                      <label>Aquisition Cost</label>
                      <input name="Aquisition_Cost" type="text" class="form-control">
                    </div>
                </div>
                <br>
            
            <div class="form-group">
              <div class="col-12">
                <label>Accountable Person</label>
                <input name="Accountable_Person" type="text" class="form-control">
              </div>	
						</div>		

            <div class="form-group">
              <div class="col-12">
							  <label>Description</label>
                <input name="Description" type="text" class="form-control" required>
              </div>
							<!-- <textarea name="name" class="form-control" required></textarea> -->
						</div>

            <div class="form-group">
              <div class="col-12">
							  <label>Location</label>
							  <input name="Location" type="text" class="form-control" >
              </div>
						</div>					
				
                <div class="row">
                    <div class="col-4">
                      <label>Motor Vehicles</label>
                      <input name="Motor_Vehicles" type="text" class="form-control" >
                    </div>
                  
                    <div class="col-4">
                      <label>Office Equipment</label>
                      <input name="Office_Eq" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Hospital Equipment</label>
                      <input name="Hospital_Eq" type="text" class="form-control" >
                    </div>
                </div>
                <br>
         
                <div class="row">
                    <div class="col-4">
                      <label>Med. Dental & Lab. equipment</label>
                      <input name="Med_dental_equipment" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Furniture And Fixtures</label>
                      <input name="FurnitureNFixtures" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Information Technology</label>
                      <input name="Info_Tech" type="text" class="form-control" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                      <label>Other Machineries & Equipment</label>
                      <input name="Other_Machine_Eq" type="text" class="form-control" >
                    </div>
                    <div class="col-6">
                      <label>Other Asset</label>
                      <input name="Other_Asset" type="text" class="form-control" >
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
      <form action="edittourism" method="post" enctype="multipart/form-data" id="editForm">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Edit Tourism Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
          <div class="modal-body">					
                  <div class="row">
                    <div class="col-4">
                      <label>Property No.</label>
                      <input id="EditProperty_No" name="EditProperty_No" type="text" class="form-control">
                    </div>
                    <div class="col-4">
                      <label>Date Aquired</label>
                      <input id="EditDate_Aquired" name="EditDate_Aquired" type="text" class="form-control">
                    </div>
                    <div class="col-4">
                      <label>Aquisition Cost</label>
                      <input id="EditAquisition_Cost" name="EditAquisition_Cost" type="text" class="form-control">
                    </div>
                </div>
                <br>
            <div class="form-group">
              <div class="col-12">
							  <label>Accountable Person</label>
							  <input id="EditAccountable_Person" name="EditAccountable_Person" type="text" class="form-control" required>
              </div>	
            </div>		

            <div class="form-group">
              <div class="col-12">
							  <label>Description</label>
                <input id="EditDescription" name="EditDescription" type="text" class="form-control" required>
							</div>	
              <!-- <textarea name="name" class="form-control" required></textarea> -->
						</div>

            <div class="form-group">
              <div class="col-12">
							  <label>Location</label>
							  <input id="EditLocation" name="EditLocation" type="text" class="form-control" >
              </div>	
            </div>					
				
                <div class="row">
                    <div class="col-4">
                      <label>Motor Vehicles</label>
                      <input id="EditMotor_Vehicles" name="EditMotor_Vehicles" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Office Equipment</label>
                      <input id="EditOffice_Eq" name="EditOffice_Eq" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Hospital Equipment</label>
                      <input id="EditHospital_Eq" name="EditHospital_Eq" type="text" class="form-control" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-4">
                      <label>Med. Dental & Lab. equipment</label>
                      <input id="EditMed_dental_equipment" name="EditMed_dental_equipment" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Furniture And Fixtures</label>
                      <input id="EditFurnitureNFixtures" name="EditFurnitureNFixtures" type="text" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Information Technology</label>
                      <input id="EditInfo_Tech" name="EditInfo_Tech" type="text" class="form-control" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                      <label>Other Machineries & Equipment</label>
                      <input id="EditOther_Machine_Eq" name="EditOther_Machine_Eq" type="text" class="form-control" >
                    </div>
                    <div class="col-6">
                      <label>Other Asset</label>
                      <input id="EditOther_Asset" name="EditOther_Asset" type="text" class="form-control" >
                    </div>
                </div>
              <div class="form-group">
                <div class="col-12">
                    <label>Remark</label>
                    <input id="EditRemark" name="EditRemark" type="text" class="form-control" >
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
                      $('#delete_modal_Form').attr('action', 'tourism-delete/'+data[0]);
                      $('#deleteEmployeeModal').modal('show');
                  });

                  $('.TableData').on('click', '#editbtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();

                      $('#EditProperty_No').val(data[0]);
                      $('#EditDescription').val(data[1]);
                      $('#EditDate_Aquired').val(data[2]);
                      $('#EditAquisition_Cost').val(data[3]);
                      $('#EditAccountable_Person').val(data[4]);
                      $('#EditLocation').val(data[5]);
                      $('#EditMed_dental_equipment').val(data[6]);
                      $('#EditOffice_Eq').val(data[7]);
                      $('#EditHospital_Eq').val(data[8]);
                      $('#EditFurnitureNFixtures').val(data[9]);
                      $('#EditMotor_Vehicles').val(data[10]);
                      $('#EditInfo_Tech').val(data[11]);
                      $('#EditOther_Machine_Eq').val(data[12]);
                      $('#EditOther_Asset').val(data[13]);
                      $('#EditRemark').val(data[14]);
                      // $('#delete_modal_Form').attr('action', 'assets-delete/'+data[0]);
                      $('#editForm').attr('action', 'edittourism/'+data[0]);
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