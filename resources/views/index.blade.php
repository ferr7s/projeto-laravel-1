<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Posts</title>
</head>

<body>
    <h1>Listagem de Posts</h1>
    <ul>
        @foreach ($posts as $post)
        <!-- Dentro do loop que lista os posts -->
        <li>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post->id) }}">Ver Detalhes</a>
            <a href="{{ route('posts.delete.confirmation', $post->id) }}">Excluir</a>
        </li>
        @endforeach
    </ul>

    <a href="{{ route('posts.create') }}">Criar Novo Post</a>
</body>

</html>