<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Švieslentė</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">NFQ</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Švieslentė <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/register">Registracija</a>
            <a class="nav-item nav-link" href="/worker_page">Darbuotojo puslapis</a>
            <a class="nav-item nav-link" href="/waiting">Kiek liko laukti?</a>
        </div>
    </nav>
    <div class="container">
        <div class="mt-2">

        @foreach($lines as $line)
                @php($count = 0)
            @foreach($line->users as $user)
                @if($user->serviced == 0)
                    <div class="card">
                        <div class="card-body">
                            #{{$user->number}} {{$line->name}}
                            <br>
                            Liko laukti: {{$line->average() * ++$count}} minutes.
                        </div>
                    </div>
                    @endif
            @endforeach
        @endforeach
        </div>
    </div>
</body>
</html>
