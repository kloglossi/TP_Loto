<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Title</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Item</a>
            </li>

        </ul>
    </div>
</nav>


    <div class="container">
        <ul id="items" class="list-group"></ul>
    </div>

<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset('js/ms.js')}}" type="javascript"></script>
</body>
</html>