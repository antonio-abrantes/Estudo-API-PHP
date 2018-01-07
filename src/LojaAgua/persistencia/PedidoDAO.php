<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 07/01/2018
 * Time: 11:39
 */

namespace LojaAgua\persistencia;

use LojaAgua\entidades\Pedido;
use LojaAgua\persistencia\AbstractDAO;
use LojaAgua\persistencia\UsuarioDAO;

class PedidoDAO extends AbstractDAO
{
    public function __construct()
    {
        parent::__construct('\LojaAgua\entidades\Pedido');
    }

    public function insert($obj)
    {
        $usurPersisted = $this->entityManager->find('LojaAgua\entidades\Usuario', $obj->getUsuario()->getId());
        $obj->setUsuario($usurPersisted);
        parent::insert($obj);
    }
}