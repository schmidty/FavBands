<!DOCTYPE html>
<html>
    <head>
        <title>FavBands Application - Matthew Schmidt</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>

    </head>
    <body>
        <header><center><h2><b>FavBands Application - Matthew Schmidt</b></h2></center></header>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html