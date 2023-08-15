<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Detalhes da dúvida {{$support->id}} </h1>

    <ul>
        <li>Assunto: {{ $support->subject}} </li>
        <li>Conteudo: {{ $support->status}} </li>
        <li>Status: {{ $support->body}} </li>
    </ul>

    <form action="{{ route('supports/destroy', $support->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar</button>
    </form>
</body>
</html>