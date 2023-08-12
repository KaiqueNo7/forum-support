<h1>Listagem das dúvidas</h1>

<a href="{{ route('supports/create') }}">Criar duvida</a>

<table>
    <th>Assunto</th>
    <th>Status</th>
    <th>Descrição</th>
    <th></th>
    <tbody>
        @foreach ($supports as $support)
        <tr>
            <td>{{ $support->subject }}</td>
            <td>{{ $support->status }}</td>
            <td>{{ $support->body }}</td>
            <td>
                <a href="{{route('supports/show', $support->id)}}">Ir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>