<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Examen 2ª Evaluación DSW</h1>
    <a href="{{route('discos_carmen.create')}}">Crear disco</a>
    @foreach ($discos as $disco)
        <div style="border:1px solid black; width:20%; margin:2%;">
            <h1>Discos Carmen {{$disco->id}}</h1>
            <p><span>Título: </span>{{$disco->titulo}}</p>
            <p><span>Autor: </span>{{$disco->autor}}</p>
            <a href="{{route('discos_carmen.edit', $disco)}}">modificar</a>
            <br>
            <form action="{{route('discos_carmen.destroy',$disco)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">eliminar</button>
            </form>
        </div>
    @endforeach
</body>
</html>