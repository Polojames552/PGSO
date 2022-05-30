<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- <form action="PDF_Form" method="post" enctype="multipart/form-data"> -->

    <!-- </form> -->
     <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script> 
   
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
            <b>
            INVENTORY OF SERVICE EQUIPMENT<br>
            As of 
            <?php
                $today = date("F, Y");   
                echo $today
            ?><br>
            PRIETO DIAZ MEDICARE HOSPITAL<br>
            Prieto Diaz Sorsogon<br>
            </b>
          </p> 
    <table id="emp">
    
                <td style="width: 70%;"><b><center>INVENTORY</center></b></td>
                <td><b><center>INSPECTION</center></b></td>
            <tr>
                <th>Date Aquired</th>
                <th>Particulars</th>
                <th>Property No.</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total Cost</th>
                <th>Accumulated Depreciation</th>
                <th>Net Book Value</th>
                <th>Remark</th>
                <th>Appraised Value</th>
                <th>Disposition</th>
                <th>Remark</th>
            </tr>
    
        <tbody>
            <tr>
            <?php $total_Unit_Cost = 0?>
            <?php $total_Cost = 0?>
            <?php $n = $count?>
            @foreach($data as $data)
            <tr>
            <?php
            if($data->Unit_Cost!=""){
                $total_Unit_Cost = $data->Unit_Cost + $total_Unit_Cost;}
            ?>
            <?php $total_Cost = $data->Total_Cost + $total_Cost ?>
                    <td>{{$data->Date_Aquired}}</td>
                    <td>{{$data->Particulars}}</td>
                    <td>{{$data->Property_No}}</td>
                    <td>{{$data->Quantity}}</td>
                    <td>{{$data->Unit_Cost}}</td>
                    <td>{{$data->Total_Cost}}</td>
                    <td>{{$data->Accumulated_Depreciation}}</td>
                    <td>{{$data->NetBookValue}}</td>
                    <td>{{$data->Remark}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
/* th{
  font-size: 19px;
}
td{
  font-size: 15px;
} */
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
   </style>


</body>

</html>