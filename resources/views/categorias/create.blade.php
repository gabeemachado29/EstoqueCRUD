<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" required>

        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao"></textarea>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>