<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<p>Hi,</p>
<p>
    The {{$contract->from}} did not receive one of the contracts you submitted.
    Please <a href="{{url('/edit_user/'.$contract->man_number)}}">review this  Contract</a> <br>
    or see the {{$contract->from}} to figure out what went wrong.

</p>

</body>
</html>
