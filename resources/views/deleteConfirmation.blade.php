<!DOCTYPE html>
<html>

<head>
    <title>Confirmação de Exclusão</title>
</head>

<body>
    <h1>Confirmação de Exclusão</h1>

    <p>Você está prestes a excluir a postagem:</p>
    <h2>{{ $post->title }}</h2>

    <p>Tem certeza de que deseja excluir esta postagem? Esta ação é irreversível.</p>

    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Confirmar Exclusão</button>
    </form>

    <a href="{{ route('posts.index') }}">Cancelar</a>
</body>

</html>