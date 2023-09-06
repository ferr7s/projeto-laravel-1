<!DOCTYPE html>
<html>
<head>
    <title>Criar Novo Post</title>
</head>
<body>
    <h1>Criar Novo Post</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
          <label for="title">Título:</label>
          <input type="text" name="title" id="title" required>
        </div>
        <div>
          <label for="content">Conteúdo:</label>
          <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">Criar Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Voltar para a Listagem de Posts</a>
</body>
</html>