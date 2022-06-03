@extends('layouts.app', ['activePage' => 'PGSOMedicalDental', 'titlePage' => __('PGSOMedicalDental')])
	  
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
                                PGSO-Medical And Dental Supplies
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
                      
                                <button id="addData" href="#addEmployeeModal" class="btn" data-toggle="modal"><i class="fas fa-user-plus"></i> Add Data</button>
                                <!-- <button class="btn btn-danger" id="btnPDF" onclick="GenPDF()"><i class="fas fa-file-download"></i></button> -->
                                <!-- <button href="#PDFModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-file-download"></i> PDF</button> -->
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Export<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <!-- <li><a id="exportmenu" href="{{route('PrietoDiazMedHospital_PDF')}}">PDF</a></li> -->
                                  <li><a id="exportmenu" href="#" onclick="window.open('PdfPrietoDiazMedHospital', '_blank', 'fullscreen=yes'); return false;">PDF</a> </li>
                                  <li><a id="exportmenu" href="PrietoDiazMedHospital_export">Excel</a></li>
                                  <!-- <li><a id="exportmenu" href="{{route('PDFpreview')}}">My PDF preview</a></li> -->
                                  <!-- <li><a id="exportmenu" onClick="window.print()">Print Preview</a></li> -->
                                </ul>
                                    <button href="#ImportDataModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-file-import"></i> Import Data</button>
                              </div>
                      </div>
                      <script>
                          function myFunction() {
                              document.getElementById("health_Excel").submit();
                          }
                          // function print() {
                          //     window.print();
                          // }
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
											<th>ID</th>
											<th>ARTICLE</th>
											<th>DESCRIPTION</th>
											<th>STOCK NO</th>
											<th>UNIT OG MEASUREMENT</th>
											<th>UNIT VALUE</th>
											<th>BALANCE PER CARD (QUANTITY)</th>
											<th>ON HAND PER COUNT (QUANTITY)</th>
											<th>SHORTAGE QUANTITY</th>
											<th>SHORTAGE VALUE</th>
											<th>Remark</th>
											<th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>ID</th>
											<th>ARTICLE</th>
											<th>DESCRIPTION</th>
											<th>STOCK NO</th>
											<th>UNIT OG MEASUREMENT</th>
											<th>UNIT VALUE</th>
											<th>BALANCE PER CARD (QUANTITY)</th>
											<th>ON HAND PER COUNT (QUANTITY)</th>
											<th>SHORTAGE QUANTITY</th>
											<th>SHORTAGE VALUE</th>
											<th>Remark</th>
											<th>Operations</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $data) 
                                        <tr>
										<td>{{$data->id}}</td>
                                        <td>{{$data->article}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{$data->stockno}}</td>
										<td>{{$data->unitofmeasurement}}</td>
                                        <td>{{$data->unitvalue}}</td>
                                        <td>{{$data->balancecard}}</td>
										<td>{{$data->onhandcount}}</td>
                                        <td>{{$data->shortageqty}}</td>
                                        <td>{{$data->shortagevalue}}</td>
										<td>{{$data->remark}}</td>
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
			<form action="{{route ('ImportPrietoDiazMedHospital') }}" method="post" enctype="multipart/form-data">
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
			<form action="add_PGSOMedicalDental" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add Health Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                
					<div class="modal-body">					
                  <div class="row">
                    <div class="col-6">
                      <label>Article</label>
                      <input name="article" type="text" class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label>Stock No.</label>
                      <input name="stockno" type="number" class="form-control">
                    </div>
                </div>
                <br>

            <div class="form-group">
              <div class="col-12">
							  <label>Description</label>
                <input name="description" type="text" class="form-control" required>
              </div>
							<!-- <textarea name="name" class="form-control" required></textarea> -->
			</div>

				
                <div class="row">
                    <div class="col-4">
                      <label>Unit Of Measurement</label>
                      <input name="unitofmeasurement" type="text" class="form-control" >
                    </div>
                  
                    <div class="col-4">
                      <label>Unit Value</label>
                      <input name="unitvalue" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Balance Card(qty)</label>
                      <input name="balancecard" type="number" class="form-control" >
                    </div>
                </div>
                <br>
			
                <div class="row">
                    <div class="col-4">
                      <label>On Hand Per Count(qty)</label>
                      <input name="onhandcount" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Shortage/Overage (qty)</label>
                      <input name="shortageqty" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Shortage/Overage (value)</label>
                      <input name="shortagevalue" type="number" class="form-control" >
                    </div>
                </div>
                <br>
              
                <div class="form-group">
                  <div class="col-12">
                        <label>Remark</label>
                        <input name="remark" type="text" class="form-control" >
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
						<h4 class="modal-title">Edit Medical And Dental Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                
					<div class="modal-body">					
                  <div class="row">
                    <div class="col-6">
                      <label>Article</label>
                      <input id="Editarticle" name="Editarticle" type="text" class="form-control" required>
                    </div>
                    <div class="col-6">
                      <label>Stock No.</label>
                      <!-- <inpu id="Editstockno" name="stockno" type="number" class="form-control"> -->
					  <input id="Editstockno" name="Editstockno" type="number" class="form-control">
                    </div>
                </div>
                <br>

            <div class="form-group">
              <div class="col-12">
							  <label>Description</label>
                <input id="Editdescription" name="Editdescription" type="text" class="form-control" required>
              </div>
							<!-- <textarea name="name" class="form-control" required></textarea> -->
			</div>

				
                <div class="row">
                    <div class="col-4">
                      <label>Unit Of Measurement</label>
                      <input id="Editunitofmeasurement" name="Editunitofmeasurement" type="text" class="form-control" >
                    </div>
                  
                    <div class="col-4">
                      <label>Unit Value</label>
                      <input id="Editunitvalue" name="Editunitvalue" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Balance Card(qty)</label>
                      <input id="Editbalancecard" name="Editbalancecard" type="number" class="form-control" >
                    </div>
                </div>
                <br>
			
                <div class="row">
                    <div class="col-4">
                      <label>On Hand Per Count(qty)</label>
                      <input id="Editonhandcount" name="Editonhandcount" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Shortage/Overage (qty)</label>
                      <input id="Editshortageqty" name="Editshortageqty" type="number" class="form-control" >
                    </div>
                    <div class="col-4">
                      <label>Shortage/Overage (value)</label>
                      <input id="Editshortagevalue" name="Editshortagevalue" type="number" class="form-control" >
                    </div>
                </div>
                <br>
              
                <div class="form-group">
                  <div class="col-12">
                        <label>Remark</label>
                        <input id="Editremark" name="Editremark" type="text" class="form-control" >
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
                      $('#Editarticle').val(data[1]);
					  $('#Editdescription').val(data[2]);
                      $('#Editstockno').val(data[3]);
                      $('#Editunitofmeasurement').val(data[4]);
                      $('#Editunitvalue').val(data[5]);
                      $('#Editbalancecard').val(data[6]);
                      $('#Editonhandcount').val(data[7]);
                      $('#Editshortageqty').val(data[8]);
                      $('#Editshortagevalue').val(data[9]);
                      $('#Editremark').val(data[19]);
                      // $('#delete_modal_Form').attr('action', 'assets-delete/'+data[0]);
                      $('#editForm').attr('action', 'editPGSOMedicalDental/'+data[0]);
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