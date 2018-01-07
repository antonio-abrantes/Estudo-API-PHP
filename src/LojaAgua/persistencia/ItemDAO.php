<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 07/01/2018
 * Time: 11:35
 */

namespace LojaAgua\persistencia;

use LojaAgua\entidades\Item;
use LojaAgua\persistencia\AbstractDAO;


class ItemDAO extends AbstractDAO
{
    public function __construct()
    {
        parent::__construct('\LojaAgua\entidades\Item');
    }

}