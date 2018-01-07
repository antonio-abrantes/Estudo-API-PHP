<?php

$app->get('/', function (){
    $u = new LojaAgua\entidades\Usuario();
    $u->login = 'AntonioAbrantes';

    echo "Funcionando...<br>";
    echo "Hello {$u->login}";
});


$app->get('/teste/{nome}', function (Request $request, Response $response, array $args){

    echo "Funcionando...{$args['nome']};<br>";

});