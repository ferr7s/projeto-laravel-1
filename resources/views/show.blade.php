<!DOCTYPE html>
<html>

<head>
    <title>{{ $post->title }}</title>
</head>

<body>
    <h1>{{ $post->title }}</h1>
    <h2>{{ $post->category->title }}</h2>
    <p>{{ $post->content }}</p>
    <p><b>Tags:</b>
        @foreach ($post->tags as $tag)
        <span>{{ $tag->title }}</span>
        @endforeach
    </p>

    <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Confirmar Exclusão</button>
    </form>
    <a href="{{ route('posts.index') }}">Voltar para a Listagem de Posts</a>


    <h1>Detalhes da Tag: {{ $tag->title }}</h1>

    <h2>Posts associados a esta Tag:</h2>
    @if ($tag->posts->count() > 0)
    <ul>
        @foreach ($tag->posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </li>
        @endforeach
    </ul>
    @else
    <p>Nenhum post associado a esta tag.</p>
    @endif

    <a href="{{ route('tags.edit', $tag->id) }}">Editar</a>
    <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Confirmar Exclusão</button>
    </form>
    <a href="{{ route('tags.index') }}">Voltar para a Listagem de Posts</a>


    <h1>Detalhes da categoria: {{ $category->title}}</h1>

    <h2>Posts associados a esta Categoria:</h2>
    @if ($category->posts->count() > 0)
    <ul>
        @foreach ($category->posts as $post)
        <li>
            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        </li>
        @endforeach
    </ul>
    @else
    <p>Nenhum post associado a esta categoria.</p>
    @endif

    <a href="{{ route('categories.edit', $category->id) }}">Editar</a>
    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Confirmar Exclusão</button>
    </form>
    <a href="{{ route('categories.index') }}">Voltar para a Listagem de Posts</a>
</body>

</html>