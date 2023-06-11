<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Status Update</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 15px">
    <b>Ticket Details:</b>
    <p>ID: {{$data['id']}}</p>
    <p>Category: {{$data['category']}}</p>
    <p>Description: {{$data['description']}}</p>
    <p>Person In Charge: {{$data['assign']}}</p> <br>
    <p>The status of your report has been changed to <b>{{$data['status']}}</b>. For more information, please visit the
        HostelCare website.</p>
</body>

</html>