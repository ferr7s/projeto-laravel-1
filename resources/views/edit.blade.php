<!DOCTYPE html>
<html>

<head>
    <title>Editar Post</title>
</head>

<body>
<h1>Editar Post: {{ $post->title }}</h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div>
      <label for="title">Title:</label>
      <input type="text" name="title" value="{{ $post->title }}" required>
    </div>
    <div>
      <label for="content">Conteúdo:</label>
      <textarea name="content" required>{{ $post->content }}</textarea>
    </div>
    
    <!-- Campo para a categoria -->
    <div>
      <label for="category_id">Categoria:</label>
      <select name="category_id" required>
          @foreach ($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
          @endforeach
      </select>
    </div>

    <!-- Campos para tags (seleção múltipla) -->
    <div>
      <label for="tags">Tags:</label>
      <select name="tags[]" multiple>
          @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" 
                    {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $tag->title }}
                </option>
          @endforeach
      </select>
    </div>
    <button type="submit">Atualizar Post</button>
</form>

<a href="{{ route('posts.index') }}">Voltar para a Listagem de Posts</a>


    <h1>Editar Tag: {{ $tag->title }}</h1>

    <form method="POST" action="{{ route('tags.update', $tag->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Nome da Tag</label>
            <input type="text" id="title" name="title" placeholder="Digite o nome da tag" value="{{ $tag->title }}">
        </div>
        <button type="submit">Salvar Alterações</button>
    </form>


    <h1>Editar Categoria: {{ $category->title }}</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Nome da Categoria</label>
            <input type="text" id="title" name="title" placeholder="Digite o nome da categoria" value="{{ $category->title }}">
        </div>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>

</html>