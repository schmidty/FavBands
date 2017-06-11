<!DOCTYPE html>
<html>
    <head>
        <title>FavBands Application - Matthew Schmidt</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>
        <style>
            body {
                    margin: 2.5%;
            }
        </style>

    </head>
    <body>
        <header id="container-navbar" class="container"><center><h2><b>FavBands Application - Matthew Schmidt</b></h2></center></header>
        @section('sidebar')
        <div id="container-page-row" class="row">
            <div id="container-sidebar" class="col-lg-2 col-md-2 col-sm-3">
                    <center>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="/">Home</a></li>
                                <li><a href="/bands">Bands</a></li>
                                <li><a href="/albums">Albums</a></li>
                            </ul>
                    </center>
            </div>
        @show

                <div id="container-content" class="col-lg-10 col-md-10 col-sm-9">
                    @yield('content')
                </div>

            </div>
    </body>
</html>