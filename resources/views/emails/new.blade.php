<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Created</title>
</head>

<body>
    <p>We have successfully received your report. You can track the progress of your ticket via our website.
        Additionally, we will notify you via email if there are any changes to your ticket's status.</p><br>
    <b>Ticket Details:</b>
    <p>ID: {{$data['id']}}</p>
    <p>Category: {{$data['category']}}</p>
    <p>Description: {{$data['description']}}</p> <br>
</body>

</html>