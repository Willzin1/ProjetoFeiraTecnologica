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

    public function create ($dataReserva, $horaReserva, $pessoasReserva){
        $stmt = $this->pdo->prepare("INSERT INTO reservas (data_reserva, hora_reserva, numero_pessoas) VALUES (:data, :hora, :pessoas)");
        if($stmt->execute(['data' => $dataReserva, 'hora' => $horaReserva, 'pessoas' => $pessoasReserva])){
            header("Location: ./../views/part_view_perfil.php");
            exit();
        }
    }

    public function update(){

    }

    public function delete(){

    }
}
