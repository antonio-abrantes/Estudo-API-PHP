<?php

//Usar o comando $ composer dump-autoload -o
require __DIR__ . '/vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use LojaAgua\entidades\Usuario;
use LojaAgua\entidades\Pedido;
use LojaAgua\entidades\Item;
use LojaAgua\controlador\UsuarioController;
use LojaAgua\controlador\PedidoController;

use LojaAgua\persistencia\UsuarioDAO;
use LojaAgua\persistencia\PedidoDAO;


$settings = require __DIR__ . '/src/LojaAgua/settings.php';
$app = new Slim\App($settings);

$usuarioCtrl = new UsuarioController();
$pedidoCtrl = new PedidoController();

//require __DIR__.'/src/LojaAgua/routes.php';


$app->get('/', function () {
    echo json_encode([
        "api" => "Venda de Agua",
        "version" => "1.4.0"
    ]);
});

$app->get('/usuario[/{id}]', function ($request, $response, $args) use ($usuarioCtrl) {

    if (isset($args['id'])):
        echo json_encode($usuarioCtrl->get($args['id']));
    else:
        echo json_encode($usuarioCtrl->get(null));
    endif;

});

$app->post('/usuario[/]', function ($request, $response, $args)  use  ($usuarioCtrl){

    $json = json_decode ( $request->getBody());
    echo json_encode ($usuarioCtrl->insert( $json ) );
});

$app->put('/usuario[/]', function (){
    echo "PUT\n";
});

$app->delete('/usuario/{id}', function (){
    echo "DELETE\n";
});

//Pedidos
$app->get ( '/pedido[/{id}]', function ($request, $response, $args) use  ($pedidoCtrl){

    if (isset($args['id'])):
        echo json_encode($pedidoCtrl->get($args['id']));
    else:
        echo json_encode($pedidoCtrl->get(null));
    endif;
});

$app->post ( '/pedido(/)', function ($request, $response, $args)  use  ($pedidoCtrl){

    //$novo = new Usuario(0, 'testedeinsercao@hot.com', '25145', 'Rua qualuqer');
//    $novoDao = new UsuarioDAO();
//    $data = new DateTime('now');
//
//    $pedido = new Pedido(0, $data,$novoDao->findById(1), array());
//
//    $pDao = new PedidoDAO();
//    $pDao->insert($pedido);
//
//    $json = json_encode($pedido->toArray());
//
//    $json = json_decode ( $request->getBody());
//    echo json_encode ($pedidoCtrl->insert( $json ) );

} );

$app->put ( '/pedido[/]', function () {
    echo "PUT\n";
} );

$app->delete ( '/pedido/{id}', function () {
    echo "DELETE\n";
} );


$app->run();
