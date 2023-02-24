<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear discos</h1>
    <form action="{{route('discos_carmen.store')}}" method="post">
        @csrf
        <label>Título</label>
        <input type="text" name="titulo">
        <br>
        <label>autor</label>
        <input type="text" name="autor">
        <br>
        <label>precio</label>
        <input type="text" name="precio">
        <br>
        <button type="submit">Crear disco</button>
    </form>
</body>
</html>