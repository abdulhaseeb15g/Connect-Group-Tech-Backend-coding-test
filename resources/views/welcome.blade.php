<!DOCTYPE html>
<html lang="en">
<head>
    <title>BackEnd Task</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
        .csv-btn{
            position: absolute;
            right: 5%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">home</a></li>
                <li><a href="{{route('challenge1')}}" target="_blank">Challenge1</a></li>
                <li><a href="{{route('challenge2')}}" target="_blank">Challenge2</a></li>
                <li><a href="{{asset('challenge3/challenge3.pdf') }}" target="_blank">Challenge3</a></li>
                <li><a href="{{route('challenge4')}}" target="_blank">Challenge4</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
{{--                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container text-center">

        <h1>Backend Tasks</h1>



    </div>
</div>




</body>
</html>
