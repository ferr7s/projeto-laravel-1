<!DOCTYPE html>
<html>

<head>
    <title>Criar Novo Post</title>
</head>

<body>
    <h1>Criar Novo Post</h1>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Conteúdo:</label>
            <textarea name="content" required>{{ old('content') }}</textarea>
        </div>

        <!-- Campo para a categoria -->
        <div>
            <label for="category_id">Categoria:</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campos para tags (seleção múltipla) -->
        <div>
            <label for="tags">Tags:</label>
            <select name="tags[]" multiple>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Criar Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Voltar para a Listagem de Posts</a>


    <h1>Criar Nova Tag</h1>

    <form method="POST" action="{{ route('tags.store') }}">
        @csrf
        <div>
            <label for="title">Nome da Tag</label>
            <input type="text" id="title" name="title" placeholder="Digite o nome da tag" value="{{ old('title') }}">
        </div>
        <button type="submit">Criar Tag</button>
    </form>


    <h1>Criar Nova Categoia</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div>
            <label for="title">Nome da Categoria</label>
            <input type="text" id="title" name="title" placeholder="Digite o nome da categoria" value="{{ old('title') }}">
        </div>
        <button type="submit">Criar Categoria</button>
    </form>
</body>

</html>