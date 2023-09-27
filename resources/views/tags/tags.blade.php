<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Tags</title>
</head>

<body>
    <h1>Listagem de Tags</h1>

    <a href="{{ route('tags.create') }}">Adicionar nova tag</a>
</body>

</html><!DOCTYPE html>
<html>

<head>
    <title>Listagem de Tags</title>
</head>

<body>
    <h1>Listagem de Tags</h1>
    <ul>
        @foreach ($tags as $tags)
        <!-- Dentro do loop que lista os posts -->
        <li>
            <h2>{{ $tags->title }}</h2>
            <p>{{ $tags->content }}</p>
            <a href="{{ route('tags.show', $post->id) }}">Ver Detalhes</a>
            <a href="{{ route('tags.delete.confirmation', $post->id) }}">Excluir</a>
            
        </li>
        @endforeach
    </ul>

    <a href="{{ route('tags.create') }}">Criar Novo Post</a>
</body>

</html>