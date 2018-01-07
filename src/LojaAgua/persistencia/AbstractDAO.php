<?php
/**
 * Created by PhpStorm.
 * User: Antonio
 * Date: 07/01/2018
 * Time: 11:25
 */

namespace LojaAgua\persistencia;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class AbstractDAO
{
    protected $entityManager;
    private $entityPath;

    public function __construct($entidade)
    {
        $this->entityManager = $this->createEntityManager();
        $this->entityPath = $entidade;

    }

    public function createEntityManager()
    {
        $path = array(
            'src/LojaAgua/entidades'
        );

        $DevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($path, $DevMode);

        $conn = array(
            'dbname' => 'vendaagua',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );

        return EntityManager::create($conn, $config);
    }

    public function insert($obj)
    {
        $this->entityManager->persist($obj);
        $this->entityManager->flush();
    }

    public function update($obj)
    {
        $this->entityManager->merge($obj);
        $this->entityManager->flush();
    }

    public function delete($obj)
    {
        $this->entityManager->remove($obj);
        $this->entityManager->flush();
    }

    public function findById($id)
    {
        return $this->entityManager->find($this->entityPath, $id);
    }

    public function findAll()
    {
        $collection = $this->entityManager->getRepository($this->entityPath)->findAll();

        $data = array();
        foreach ($collection as $obj) {
            $data [] = $obj;
        }

        return $data;
    }

}