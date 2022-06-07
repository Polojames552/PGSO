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
                        <th>Article</th>
                        <th>Description</th>
                        <th>Stock No.</th>
                        <th>Unit of Measurement</th>
                        <th>Unit Value</th>
                        <th>Balance Card</th>
                        <th>On Hand Count</th>
                        <th>Shortage Quantity</th>
                        <th>Shortage Value</th>
                        <th>Remark</th>
                    </tr>
            @foreach($data as $data)
            <tr>
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
            </tr>
            @endforeach
      
                </table>
</body>
  
</html>