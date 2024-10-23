<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    @if(session('sucesso'))
        <div class="sucesso">
            {{ session('sucesso') }}
        </div>
    @elseif(session('erro'))
        <div class="erro">
            {{ session('erro') }}
        </div>
    @endif

    <a href="{{ route('categorias.create') }}">Cadastrar</a>
    @if($categorias->isEmpty())
        <p>Nenhuma categoria cadastrada.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->descricao }}</td>
                        <td>
                            <a href="{{ route('categorias.show', $categoria->id) }}">Visualizar</a>
                            <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>