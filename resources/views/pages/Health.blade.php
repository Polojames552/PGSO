@extends('layouts.app', ['activePage' => 'Health', 'titlePage' => __('Health')])
	  
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
                                Health
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
                               <!-- <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Add New Record</button>
								                <button class="btn btn-danger" data-toggle="modal">Export to PDF</button> -->
                                <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i></button>
                                <!-- <button class="btn btn-danger" id="btnPDF" onclick="GenPDF()"><i class="fas fa-file-download"></i></button> -->
                                <!-- <button href="#PDFModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-file-download"></i> PDF</button> -->
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Export<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a id="exportmenu" href="{{route('Export_PDF')}}">PDF</a></li>
                                  <form action="health_export" method="GET" id="health_Excel">
                                    <li><a id="exportmenu" onclick="myFunction()">Excel</a></li>
                                  </form>
                                  <li><a id="exportmenu" href="#">Import Data</a></li>
                                </ul>
                            </div>
                      </div>
                      <script>
                          function myFunction() {
                              document.getElementById("health_Excel").submit();
                          }
                      </script>
                      <style>
                        #exportmenu:hover{
                          color: #fff;
                          background-color: rgba(87, 163, 255, 0.85);  /* changed to blue */
                          border-color: rgba(87, 163, 255, 0.85);  /* changed to blue */
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
                                    @foreach($health as $health) 
                                        <tr>
										                    <td>{{$health->Property_No}}</td>
                                        <td>{{$health->Description}}</td>
                                        <td>{{$health->Date_Aquired}}</td>
                                        <td>{{$health->Aquisition_Cost}}</td>
                                        <td>{{$health->Accountable_Person}}</td>
                                        <td>{{$health->Location}}</td>
                                        <td>{{$health->Med_dental_equipment}}</td>
                                        <td>{{$health->Office_Eq}}</td>
                                        <td>{{$health->Hospital_Eq}}</td>
                                        <td>{{$health->FurnitureNFixtures}}</td>
                                        <td>{{$health->Motor_Vehicles}}</td>
                                        <td>{{$health->Info_Tech}}</td>
                                        <td>{{$health->Other_Machine_Eq}}</td>
                                        <td>{{$health->Other_Asset}}</td>
                                        <td>{{$health->Remark}}</td>
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
			<form action="add_health" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add Health Data</h4>
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
                <input name="Accountable_Person" type="text" class="form-control" required>
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
      <form action="edithealth" method="post" enctype="multipart/form-data" id="editForm">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Edit Health Data</h4>
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
  	<!-- PDF-->
	<div id="PDFModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

			<form action="{{route('Export_PDF')}}" method="get" enctype="multipart/form-data" id="pdfForm">
            {{ csrf_field() }}
          <div class="modal-header">						
						<h4 class="modal-title">Download PDF</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
            <p class="text-warning"><small>Data will be save to PDF.</small></p>
						<p>Continue to Download PDF?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="No">
            <input type="submit" class="btn btn-primary" value="yes">
					</div>
				</form>

			</div>
		</div>
	</div>
  <!-- PDF End -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
        //   function sample() {
        //   var ajax = new XMLHttpRequest();
        //   var method = "GET";
        //   var url = "Health";
        //   var asyn = true;

        //   ajax.open(method, url, asyn);
        //   ajax.send();
        //   ajax.onreadystatechange = function(){
        //     if(this.readyState == 4 && this.status == 200){
        //       var data = JSON.parse(this.responseText);
        //       console.log(data);
        //       var html ="";
        //       for(var a = 0; a<data.length; a++){
        //         alert(data[a].Property_No);
        //       }
        //     }
        //   }
        // }
          var docDefinition ={
            pageOrientation: 'landscape',
            pageSize: 'Letter',
            content:[
              // {text: 'INVENTORY OF SERVICEABLE EQUIPMENT', style: 'header'},
              {
              text:[
                'INVENTORY OF SERVICEABLE EQUIPMENT\n',
                'As of\n',
                'PRIETO DIAZ MEDICARE HOSPITAL\n',
                'Prieto Diaz, Sorsogon\n',
              ],
              style: 'header1',
              alignment: 'center'
              },
              {
                style: 'tableExample',
                color: '#444',
                table: {
                  widths: ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
                  headerRows: 1,
                  // keepWithHeaderRows: 1,
                  body: [
                    [
                     
                    {text: 'Property No.', style: 'tableHeader', alignment: 'center'},
                    {text: 'Description', style: 'tableHeader', alignment: 'center'},
                    {text: 'Date Aquired', style: 'tableHeader', alignment: 'center'},
                    {text: 'Aquisition Cost', style: 'tableHeader', alignment: 'center'},
                    {text: 'Accountable Person', style: 'tableHeader', alignment: 'center'},
                    {text: 'Location', style: 'tableHeader', alignment: 'center'},
                    {text: 'Med. dental Equipment', style: 'tableHeader', alignment: 'center'},
                    {text: 'Office Equipment', style: 'tableHeader', alignment: 'center'},
                    {text: 'Hospital Equipment', style: 'tableHeader', alignment: 'center'},
                    {text: 'Furniture & Fixtures', style: 'tableHeader', alignment: 'center'},
                    {text: 'Motor Vehicles', style: 'tableHeader', alignment: 'center'},
                    {text: 'Other Machine Equipment', style: 'tableHeader', alignment: 'center'},
                    {text: 'Other Asset', style: 'tableHeader', alignment: 'center'},
                    {text: 'Remark', style: 'tableHeader', alignment: 'center'}
                    ],
                   
                    [
                    // foreach($health as $health)
                    {text: 'Property_No', style: 'content', alignment: 'left'},
                    {text: 'Description', style: 'content', alignment: 'left'},
                    {text: 'Date_Aquired', style: 'content', alignment: 'left'},
                    {text: 'Aquisition_Cost', style: 'content', alignment: 'left'},
                    {text: 'Accountable_Person', style: 'content', alignment: 'left'},
                    {text: 'Location', style: 'content', alignment: 'left'},
                    {text: 'Med_dental_equipment', style: 'content', alignment: 'left'},
                    {text: 'Office_Eq', style: 'content', alignment: 'left'},
                    {text: 'Hospital_Eq', style: 'content', alignment: 'left'},
                    {text: 'FurnitureNFixtures', style: 'content', alignment: 'left'},
                    {text: 'Motor_Vehicles', style: 'content', alignment: 'left'},
                    {text: 'Other_Machine_Eq', style: 'content', alignment: 'left'},
                    {text: 'Other_Asset', style: 'content', alignment: 'left'},
                    {text: 'Remark', style: 'content', alignment: 'left'}
                    // endforeach
                  ],
                    
                    // ['Sample value 1', 'Sample value 2', 'Sample value 3', 'Sample value 4', 'Sample value 5', 'Sample value 6', 'Sample value 7', 'Sample value 8', 'Sample value 9', 'Sample value 10', 'Sample value 11', 'Sample value 12', 'Sample value 13', 'Sample value 14'],
                  ]
                }
              }
            ],
            styles: {
            header: {
              fontSize: 9,
              bold: true,
              margin: [0, 0, 0, 10]
            },
            subheader: {
              fontSize: 9,
              bold: true,
              margin: [0, 10, 0, 5]
            },
            tableExample: {
              margin: [0, 5, 0, 15]
            },
            tableHeader: {
              bold: true,
              fontSize: 8,
              color: 'black'
            },
            header1: {
              fontSize: 9
            },
            content: {
              fontSize: 6
            }
          },
          defaultStyle: {
            // alignment: 'justify'
          }
          }

          function GenPDF() {
            // alert('hello');
            pdfMake.createPdf(docDefinition).download();
          }
         
          
              $(document).ready(function(){
                  
                  $('.TableData').on('click', '#deletebtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();
                      $('#delete_youth_id').val(data[0]);
                    //   $('#youth_name').val(data[1]);
                      $('#delete_modal_Form').attr('action', 'health-delete/'+data[0]);
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
                      $('#editForm').attr('action', 'edithealth/'+data[0]);
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