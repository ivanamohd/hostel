<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Status Update</title>
</head>

<body>
    <b>Ticket Details:</b>
    <p>ID: {{$data['id']}}</p>
    <p>Category: {{$data['category']}}</p>
    <p>Description: {{$data['description']}}</p> <br>
    <p>The status of your report has been changed to <b>{{$data['status']}}</b>. For more information, please visit the
        HostelCare website.</p>
</body>

</html>