<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Hi,</title>
</head>
<body>

<p>
    The following people's contracts need to be renewed this month:
    <ol>
    @foreach($users as $user)
         <li>{{$user->first_name}} {{$user->last_name}}</li>
    @endforeach
        </ol>
</p>
    Please follow the link below to view or update them.
    <a href="{{url('HomeController@index')}}">View/Update</a>

</body>
</html>
