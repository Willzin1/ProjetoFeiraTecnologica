<?php

namespace App\Controller;

use PDO;
use App\model\Reserva;

class ReservaCrudController
{
    private $pdo;

    // Método para fazer a conexão com o banco de dados;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create ($dataReserva, $horaReserva, $pessoasReserva){
        session_start();
            $id_usuario = $_SESSION['id'];


        $stmt = $this->pdo->prepare("INSERT INTO reservas (data_reserva, hora_reserva, numero_pessoas, id_usuario) VALUES (:data, :hora, :pessoas, :id_usuario)");
        if($stmt->execute(['data' => $dataReserva, 'hora' => $horaReserva, 'pessoas' => $pessoasReserva, 'id_usuario' => $id_usuario])){
            header("Location: ./../views/part_view_perfil.php");
            exit();
        }
    }

    public function read($id_usuario)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM reservas WHERE id_usuario = :id_usuario");
        $stmt->execute(['id_usuario' => $id_usuario]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Reserva::class);
        return $stmt->fetch();
    }

    public function update($id_usuario, $novaData, $novaHora, $novaPessoas){
        $stmt = $this->pdo->prepare("UPDATE reservas SET data_reserva = :novaData, hora_reserva = :novaHora, numero_pessoas = :novaPessoas");
        $stmt->execute(['novaData' => $novaData, 'novaHora' => $novaHora, 'novaPessoas' => $novaPessoas]);
    }

    public function delete($id_usuario){
        $stmt = $this->pdo->prepare("DELETE FROM reservas WHERE id_usuario = :id_usuario");
        return $stmt->execute(['id_usuario' => $id_usuario]);
    }
}
