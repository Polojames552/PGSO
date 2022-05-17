<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <center>
        <h3>INVENTORY OF SERVICE EQUIPMENT</h3>
        <h3>As of December 2021</h3>
        <h3>PRIETO DIAZ MEDICARE HOSPITAL</h3>
        <h3>Prieto Diaz Sorsogon</h3>
    </center>
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
    </style>
    
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
                <th>Other Machineries Equipment</th>
                <th>Other Asset</th>
                <th>Remark</th>
            </tr>
        </thead>
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
                <td>{{$health->Other_Machine_Eq}}</td>
                <td>{{$health->Other_Asset}}</td>
                <td>{{$health->Remark}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>