<?php

namespace LojaAgua\persistencia;

use LojaAgua\persistencia\AbstractDAO;
use LojaAgua\entidades\Usuario;
//use function Sodium\add;

class UsuarioDAO extends AbstractDAO
{

    public function __construct()
    {
        parent::__construct('LojaAgua\entidades\Usuario');

    }
}