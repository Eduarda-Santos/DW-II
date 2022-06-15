<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/aluno', function () {
    $dados = [["nome" => "Carlos Eduardo"],
        ["nome" => "Maria Claudia"],
        ["nome" => "João Pedro"],
        ["nome" => "Artur Amorim"],
        ["nome" => "Thomas Zambujal"],
        
    ];

    $aluno = "<ul>";
    
    for($a=0; $a<5; $a++) {
        $aluno = $aluno."<li>".$dados[$a]['nome']."</li>";
    }

    $aluno = $aluno."</ul>";
    return $aluno;
    //return view('aluno');
})->name('aluno');

Route::get('/aluno/limite/{total}', function ($total) {
    $dados = [["nome" => "Carlos Eduardo"],
        ["nome" => "Maria Claudia"],
        ["nome" => "João Pedro"],
        ["nome" => "Artur Amorim"],
        ["nome" => "Thomas Zambujal"],
        
    ];

    $aluno = "<ul>";
    
    if($total <= count($dados)) {
        for($a=0; $a<$total; $a++) {
            $aluno = $aluno."<li>".$dados[$a]['nome']."</li>";
        }
    }

    $aluno = $aluno."</ul>";
    return $aluno;

})->name('aluno.limite')->where('total', '[0-9]+');

Route::get('/aluno/matricula/{matricula}', function ($matricula) {
    $dados = [["nome" => "Carlos Eduardo"],
    ["nome" => "Maria Claudia"],
    ["nome" => "João Pedro"],
    ["nome" => "Artur Amorim"],
    ["nome" => "Thomas Zambujal"],
    ];

    $aluno = "<ul>";
    
    if($matricula <= count($dados)) {
        $aluno = $aluno."<li>".$dados[$matricula]['nome']."</li>";
 
    }
    else{
        $aluno = $aluno."<li>Não encontrado!</li>";
    }

    $aluno = $aluno."</ul>";
    return $aluno;


})->name('aluno.matricula')->where('total', '[0-9]+');

Route::get('/aluno/nome/{nome}', function ($nome) {
    $dados = [["nome" => "Carlos Eduardo"],
    ["nome" => "Maria Claudia"],
    ["nome" => "João Pedro"],
    ["nome" => "Artur Amorim"],
    ["nome" => "Thomas Zambujal"],
    ];

    $aluno = "<ul>";
    
    if($nome == count($dados)) {
        $aluno = $aluno."<li>".$dados[$nome]['nome']."</li>";
    }

    $aluno = $aluno."</ul>";
    return $aluno;


})->name('aluno.nome');

Route::get('/nota', function () {
    $dados = [
        ["nome" => "Carlos Eduardo"],
        ["nome" => "Maria Claudia"],
        ["nome" => "João Pedro"],
        ["nome" => "Artur Amorim"],
        ["nome" => "Thomas Zambujal"],
        
        ["nota" => "8"],
        ["nota" => "9"],
        ["nota" => "7"],
        ["nota" => "8"],
        ["nota" => "5"],
    ];

    $nota = "<ul>";
    
    for($a=0; $a<5; $a++) {
        $nota = $nota."<li>".$dados[$a]['nota']."</li>";
    }

    $nota = $nota."</ul>";
    return $nota;
})->name('nota');


Route::get('/aluno/notas', function () {
    return view('notas');
})->name('notas');


Route::post('/aluno/add', function (Request $request) {
    return "<h1>Adicionar Aluno (POST)</h1>";
    });
    