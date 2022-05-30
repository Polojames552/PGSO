<!DOCTYPE html>
<html>
  
<body>
<script type="text/javascript">
      window.onload = function() { window.print(); }
    </script> 
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

    <p class="small" align="center">
          <b>
          INVENTORY AND INSPECTION REPORT OF UNSERVICEABLE PROPERTY<br>
          As of 
          <?php
            $today = date("F, Y");   
            echo $today
          ?><br>
          OFFICE OF THE PROVINCIAL TOURISM<br>
          PROVINCIAL ADMINISTRATOR'S OFFICE<br>
          </b>
        </p> 

    <table id="emp">
        <tr>
            <td style="width: 73.6%;"><b><center>INVENTORY</center></b></td>
         
            <td><b><center>INSPECTION</center></b></td>
                <table id="emp">
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
      
                </table>
                <!-- <td><b><center>INSPECTION</center></b>
                <table id="emp">
                    <tr>
                        <th>Appraised Value</th>
                        <th>Disposition</th>
                        <th>Remark</th>
                    </tr>

                    @for($x = 0; $x <= $n; $x++)
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                    </tr>
                    @endfor
                </table>
            </td> -->
         
        </tr>
    </table>
</body>
  
</html>