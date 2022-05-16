@extends('layouts.app', ['activePage' => 'ESS', 'titlePage' => __('ESS')])
	  
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
                                ESS
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
                            <p align="right">
                               <!-- <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Add New Record</button>
								                <button class="btn btn-danger" data-toggle="modal">Export to PDF</button> -->
                                <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-user-plus"></i></button>
                                <button class="btn btn-danger" id="btnPDF" onclick="GenPDF()"><i class="fas fa-file-download"></i></button>
                            </p>
					    </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="TableData">
                                    <thead>
                                        <tr>
											<th>ID</th>
                                            <th>ESS</th>
                                            <th>Number</th>
                                            <th>Operations</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>ESS</th>
                                            <th>Number</th>
                                            <th>Operations</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data_ess as $data_ess) 
                                        <tr>
                                  <td>{{$data_ess->id}}</td>
                                  <td>{{$data_ess->ess_name}}</td>
                                  <td>{{$data_ess->number}}</td>
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
			<form action="add_ess" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Add ESS Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
                
			<div class="modal-body">					
            
                    <div class="form-group">
                        <div class="col-12">
                            <label>ESS</label>
                            <input name="ess_name" type="text" class="form-control" required>
                        </div>	
                    </div>		
                    <div class="form-group">
                        <div class="col-12">
                            <label>Number</label>
                            <input name="Number" type="text" class="form-control" required>
                        </div>	
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
            
            <form action="editess" method="post" enctype="multipart/form-data" id="editForm">
                      {{ csrf_field() }}
					<div class="modal-header">						
						<h4 class="modal-title">Edit ESS Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
          <div class="modal-body">
                    <div class="form-group">
                        <div class="col-12">
                            <label>ESS</label>
                            <input id="EditEss" name="EditEss" type="text" class="form-control" required>
                        </div>	
                    </div>		
                    <div class="form-group">
                        <div class="col-12">
                            <label>Number</label>
                            <input id="EditNumber" name="EditNumber" type="text" class="form-control" required>
                        </div>	
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
                     
                    {text: 'ID', style: 'tableHeader', alignment: 'center'},
                    {text: 'GPSS', style: 'tableHeader', alignment: 'center'},
                    {text: 'Number', style: 'tableHeader', alignment: 'center'},
                    ],
                   
                    [
                    // foreach($health as $health)
                    {text: 'sample1', style: 'content', alignment: 'left'},
                    {text: 'sample2', style: 'content', alignment: 'left'},
                    {text: 'sample3', style: 'content', alignment: 'left'},
               
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
                      $('#delete_modal_Form').attr('action', 'ess-delete/'+data[0]);
                      $('#deleteEmployeeModal').modal('show');
                  });

                  $('.TableData').on('click', '#editbtn', function(){
                    $tr = $(this).closest('tr');

                      var data = $tr.children("td").map(function(){
                          return $(this).text();
                      }).get();
                      $('#EditEss').val(data[1]);
                      $('#EditNumber').val(data[2]);
                      $('#editForm').attr('action', 'editess/'+data[0]);
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