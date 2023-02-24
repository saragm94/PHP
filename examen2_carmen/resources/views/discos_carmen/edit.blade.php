<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>editar discos</h1>
    <form action="{{route('discos_carmen.store')}}" method="post">
        @csrf
        @method('PUT')
        <label>Título</label>
        <input type="text" name="titulo" value="{{$disco->titulo}}">
        <br>
        <label>autor</label>
        <input type="text" name="autor" value="{{$disco->autor}}">
        <br>
        <label>precio</label>
        <input type="text" name="precio" value="{{$disco->precio}}">
        <br>
        <button type="submit">editar disco</button>
    </form>
</body>
</html>