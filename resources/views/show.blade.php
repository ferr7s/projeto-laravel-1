<!DOCTYPE html>
<html>

<head>
    <title>{{ $post->title }}</title>
</head>

<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.index') }}">Voltar para a Listagem de Posts</a>
</body>

</html>