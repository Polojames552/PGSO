<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- <form action="PDF_Form" method="post" enctype="multipart/form-data"> -->

    <!-- </form> -->

   
</head>
<body>
    <style>
        #emp{
            border-collapse: collapse;
            width:100%;
        }
        #emp td, #emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        p.small {
        line-height: 1.3;
        }
    </style>
        <!-- <div class="col-auto-float-right ml-auto">
            <div class="btn-group btn-group-sm">
                 <button type="submit" class="btn btn-success" onclick="printDiv()"><i class="fas fa-file-download"></i> PDF</button>
                <button class="btn btn-white" @click.prevent="printme" target="_blank"><a href="" @click.prevent="printme" target="_blank">PDF</a></button>
                <button class="btn btn-white"><a href="" @click.prevent="printme" target="_blank">Print</a></button>
            </div>
        </div> -->
               
          <p class="small" align="center">
          INVENTORY OF SERVICE EQUIPMENT <br>
          As of December 2021<br>
          PRIETO DIAZ MEDICARE HOSPITAL<br>
          Prieto Diaz Sorsogon<br>
          </p>
              
            
    <table id="emp">
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
            </tr>
        </thead>
        <tbody>
        <?php $total_Aquisition_Cost = 0?>
        <?php $page_Aquisition_Cost = 0?>

        <?php $total_Med_Dental = 0?>
        <?php $page_Med_Dental = 0?>

        <?php $total_Office_Eq = 0?>
        <?php $page_Office_Eq = 0?>

        <?php $total_Hospital_Eq = 0?>
        <?php $page_Hospital_Eq = 0?>

        <?php $total_FnF = 0?>
        <?php $page_FnF = 0?>

        <?php $total_Motor_V = 0?>
        <?php $page_Motor_V = 0?>

        <?php $total_Information_Tech = 0?>
        <?php $page_Information_Tech = 0?>

        <?php $total_Other_Machine_Eq = 0?>
        <?php $page_Other_Machine_Eq = 0?>
        <?php $n = 1 ?>
        <?php $totloop = 0 ?>
        <?php $page = 1 ?>
            @foreach($health as $health)
            <tr>
            @if($n == 18)
                <th></th>
                <th>Page Total</th>
                <th></th>
                <th><?php echo $page_Aquisition_Cost ?></th>
                <th></th>
                <th></th>
                <th><?php echo $page_Med_Dental ?></th>
                <th><?php echo $page_Office_Eq ?></th>
                <th><?php echo $page_Hospital_Eq ?></th>
                <th><?php echo $page_FnF ?></th>
                <th><?php echo $page_Motor_V ?></th>
                <th><?php echo $page_Information_Tech ?></th>
                <th><?php echo $page_Other_Machine_Eq ?></th>
                <th></th>
                <th></th>
              <!-- <center><p class="sign">Page</p></center> -->
                <?php $n++ ?>
                <?php $page++ ?>
                <?php $page_Aquisition_Cost = 0?>
                <?php $page_Med_Dental = 0?>
                <?php $page_Office_Eq = 0?>
                <?php $page_Hospital_Eq = 0?>
                <?php $page_FnF = 0?>
                <?php $page_Motor_V = 0?>
                <?php $page_Information_Tech = 0?>
                <?php $page_Other_Machine_Eq = 0?>
            @elseif($n == 40)
                <th></th>
                <th>Page Total</th>
                <th></th>
                <th><?php echo $page_Aquisition_Cost ?></th>
                <th></th>
                <th></th>
                <th><?php echo $page_Med_Dental ?></th>
                <th><?php echo $page_Office_Eq ?></th>
                <th><?php echo $page_Hospital_Eq ?></th>
                <th><?php echo $page_FnF ?></th>
                <th><?php echo $page_Motor_V ?></th>
                <th><?php echo $page_Information_Tech ?></th>
                <th><?php echo $page_Other_Machine_Eq ?></th>
                <th></th>
                <th></th>
               <!-- <center><p class="sign">Page</p></center> -->
                 <?php $n = $n - 21  ?>
                <?php $page++ ?>
                <?php $page_Aquisition_Cost = 0?>
                <?php $page_Med_Dental = 0?>
                <?php $page_Office_Eq = 0?>
                <?php $page_Hospital_Eq = 0?>
                <?php $page_FnF = 0?>
                <?php $page_Motor_V = 0?>
                <?php $page_Information_Tech = 0?>
                <?php $page_Other_Machine_Eq = 0?>
            @else
                <?php $page_Aquisition_Cost = $health->Aquisition_Cost + $page_Aquisition_Cost ?>
                <?php $total_Aquisition_Cost = $page_Aquisition_Cost + $total_Aquisition_Cost ?>
                
                <?php $page_Med_Dental = $health->Med_dental_equipment + $page_Med_Dental ?>
                <?php $total_Med_Dental = $page_Med_Dental + $total_Med_Dental ?>

                <?php $page_Office_Eq = $health->Office_Eq + $page_Office_Eq ?>
                <?php $total_Office_Eq = $page_Office_Eq + $total_Office_Eq ?>

                <?php $page_Hospital_Eq = $health->Hospital_Eq + $page_Hospital_Eq ?>
                <?php $total_Hospital_Eq = $page_Hospital_Eq + $total_Hospital_Eq ?>

                <?php $page_FnF = $health->FurnitureNFixtures + $page_FnF ?>
                <?php $total_FnF = $page_FnF + $total_FnF ?>
                
                <?php $page_Motor_V = $health->Motor_Vehicles + $page_Motor_V ?>
                <?php $total_Motor_V = $page_Motor_V + $total_Motor_V ?>

                <?php $page_Information_Tech = $health->Info_Tech + $page_Information_Tech ?>
                <?php $total_Information_Tech = $page_Information_Tech + $total_Information_Tech ?>

                <?php $page_Other_Machine_Eq = $health->Other_Machine_Eq + $page_Other_Machine_Eq ?>
                <?php $total_Other_Machine_Eq = $page_Other_Machine_Eq + $total_Other_Machine_Eq ?>
                
                <?php $n++ ?>
                <?php $totloop++ ?>
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
            @endif
            </tr>
            @endforeach
            <tr>
                <th></th>
                <th>Page Total</th>
                <th></th>
                <th><?php echo $page_Aquisition_Cost ?></th>
                <th></th>
                <th></th>
                <th><?php echo $page_Med_Dental ?></th>
                <th><?php echo $page_Office_Eq ?></th>
                <th><?php echo $page_Hospital_Eq ?></th>
                <th><?php echo $page_FnF ?></th>
                <th><?php echo $page_Motor_V ?></th>
                <th><?php echo $page_Information_Tech ?></th>
                <th><?php echo $page_Other_Machine_Eq ?></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th></th>
                <th>GrandTotal</th>
                <th></th>
                <th><?php echo $total_Aquisition_Cost ?></th>
                <th></th>
                <th></th>
                <th><?php echo $total_Med_Dental ?></th>
                <th><?php echo $total_Office_Eq ?></th>
                <th><?php echo $total_Hospital_Eq ?></th>
                <th><?php echo $total_FnF ?></th>
                <th><?php echo $total_Motor_V ?></th>
                <th><?php echo $total_Information_Tech ?></th>
                <th><?php echo $total_Other_Machine_Eq ?></th>
                <th></th>
                <th></th>
            </tr>
                
        </tbody>
    </table>
  
    <!-- <center><p class="sign">Page</p></center> -->

    <br>
    <br>
    <br>
        <div class="container">
            <div class="row">
                    <div class="column">
                        <p class="sign">Prepared by:</p>
                        <p class="sign" id="head"><u>CHRISTINE J. JERESANO</u></p>
                        <p class="sign">Admin. Adie IV</p>
                    </div>
                    <div class="column">
                        <p class="sign">Reviewed by:</p>
                        <p class="sign" id="head"><u>MARILOU S. ROMERO</u></p>
                        <p class="sign">Admin. Officer V</p>
                    </div>
                    <div class="column">
                        <p class="sign">Approved by:</p>
                        <p class="sign" id="head"><u>ROSALINA V. HAINTO</u></p>
                        <p class="sign">PGDH/PGSO</p>
                    </div>
            </div>
        </div>
   <style>
       /* Create three equal columns that floats next to each other */
#head {
  font-weight: bold;
}
.column {
  text-align: center;
  float: left;
  width: 30%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}
.column1 {
  text-align: center;
}
p.sign {
  font-size: 19px;
}
th{
    font-size: 20px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
   </style>




</body>
<!-- <script>
function printDiv() {
    var divContents = document.getElementById("emp").innerHTML;
    var a = window.open('', '', 'height=1500, width=1500');
    a.document.write('<html>');
    a.document.write('<body > <h1>San Youths<br>');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}
</script> -->
</html>