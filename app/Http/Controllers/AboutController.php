<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Você pode passar quaisquer dados necessários para a view aqui
        $dados = [
            'title' => 'Sobre o Projeto',
            'description' => 'Este é um projeto Laravel incrível!'
        ];

        return view('about', $dados);
    }
}