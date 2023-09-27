<!DOCTYPE html>
<html>

<head>
    <title>Listagem de Posts</title>
</head>

<body>
    <h1>Listagem de Posts</h1>
    <a href="{{ route('posts.create') }}">Criar Novo Post</a>

    @foreach ($posts as $post)
    <h2>
        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a> | {{ $post->category->title }}
    </h2>
    <p>{{ $post->content }}</p>
    <p><b>Tags:</b>
        @foreach ($post->tags as $tag)
        <span>{{ $tag->title }}</span>
        @endforeach
    </p>
    <hr>
    @endforeach
    </ul>

    <table class="table">
        <thead>
            <tr>
                <th>Tag</th>
                <th>Quantidade de Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>
                    <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->title }}</a>
                </td>
                <td>{{ $tag->posts->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('tags.create') }}">Criar Nova Tag</a>


    <table class="table">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Quantidade de Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">
                        {{ $category->title }}
                    </a>
                </td>
                <td>{{ $category->posts->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('categories.create') }}">Criar Novo Categoria</a>
</body>

</html>