<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hi,</title>
</head>
<body>

<p>
    Please see the {{Auth::user()->position}} and follow the link below to verify if you have already submitted it for renewal.
    <a href="{{url('/contract_info')}}">verify</a>
</p>

</body>
</html>
