<?php

namespace App\Controller;

use PDO;
use App\model\Usuario;

class ReservaCrudController
{

    private $pdo;

    // Método para fazer a conexão com o banco de dados;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create (){
        
    }
}
