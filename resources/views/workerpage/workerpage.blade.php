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
    </div>
</nav>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/worker_page/line" method="post">
                @csrf
                <div class="form-group">
                    <label >Eile</label>
                    <select name="id" class="browser-default custom-select">
                        <option value="" disabled selected>Pasirinkite eile.</option>
                        @foreach ($lines as $line)
                            <option  value="{{$line->id}}">{{$line->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pasirinkti</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
