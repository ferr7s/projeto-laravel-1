<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    //Função para listar todos os posts.
    public function index()
    {
        //Recupera todos os posts do banco de dados
        $posts = Post::all();
        //Retorna uma view que lista os posts
        return view('index', ['posts' => $posts]);
    }

    //Função para exibir o formulário de criação de post
    public function create()
    {
        return view(
            'posts.create',
            ['categories' => Category::all(), 'tags' => Tag::all()]
        );
    }

    //Função para processar a submissão do formulário de criação
    public function store(Request $request)
    {
        $post = Post::create($request->all());

        if (isset($request['tags'])) {
            //Use o attach para adicionar as tags associadas
            $post->tags()->attach($request['tags']);
        }
        return redirect(route('posts.index'));
    }

    //Função para exibir o formulário de edição de uma postagem existente
    public function edit(Post $post)
    {
        return view(
            'posts.edit',
            [
                'post' => $post, 'categories' => Category::all(),
                'tags' => Tag::all()
            ]
        );
    }

    //Função para processar a submissão do formulário de edição
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        if (isset($request['tags'])) {
            //Use sync para atualizar as tags associadas
            $post->tags()->sync($request['tags']);
        } else {
            //Remova todas as tags associadas
            $post->tags()->detach();
        }
        return redirect(route('posts.show', $post->id));
    }

    //Função para exibir uma página de confirmação de exclusão de uma postagem
    public function deleteConfirmation($id)
    {
        //Recebe o ID da postagem a ser excluída como parâmetro
        $post = Post::findOrFail($id);
        //Retorna uma view que exibe uma mensagem de confirmação
        return view('deleteConfirmation', compact('post'));
    }

    //Função para processar a exclusão de uma postagem
    public function destroy($id)
    {
        //Recebe o ID da postagem a ser excluída como parâmetro
        $post = Post::findOrFail($id);
        //Exclui a postagem do banco de dados
        $post->delete();
        //Redireciona o usuário para a listagem de posts
        return redirect()->route('posts.index');
    }

    //Função para exibir o conteúdo completo de uma postagem
    public function show($id)
    {
        //Recebe o ID da postagem a ser visualizada como parâmetro
        $post = Post::findOrFail($id);
        //Retorna uma view que exibe o conteúdo completo da postagem
        return view('show', compact('post'));
    }
}
