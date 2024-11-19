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

    // Método irá criar uma reserva. Parâmetros passados via formulário da reserva.
    public function create($dataReserva, $horaReserva, $pessoasReserva)
    {
        session_start();
        $id_usuario = $_SESSION['id'];

        $stmt = $this->pdo->prepare("INSERT INTO reservas (data_reserva, hora_reserva, numero_pessoas, id_usuario) VALUES (:data, :hora, :pessoas, :id_usuario)");
        if ($stmt->execute(['data' => $dataReserva, 'hora' => $horaReserva, 'pessoas' => $pessoasReserva, 'id_usuario' => $id_usuario])) {
            header("Location: ./../../src/views/part_view_perfil.php");
            exit();
        }
    }

    // Método irá buscar reservas pelo id do usuário que está logado. 
   public function read($id_usuario)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM reservas WHERE id_usuario = :id_usuario");
        $stmt->execute(['id_usuario' => $id_usuario]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Reserva::class);
        return $stmt->fetchAll();
    }

    // Método irá alterar as informações de uma reserva. Parâmetros passados via formulário de alteração de reserva.
    public function update($id_usuario, $id_reserva, $novaData, $novaHora, $novaPessoas){
        $stmt = $this->pdo->prepare("UPDATE reservas SET data_reserva = :novaData, hora_reserva = :novaHora, numero_pessoas = :novaPessoas WHERE id_usuario = :idUsuario AND id_reserva = :idReserva");
        if($stmt->execute(['novaData' => $novaData, 'novaHora' => $novaHora, 'novaPessoas' => $novaPessoas, 'idUsuario' => $id_usuario, 'idReserva' => $id_reserva])){
            header("Location: ./../../src/views/part_view_perfil.php");
            exit();
        }
    }

    // Método irá deletar uma reserva.
    public function delete($id_usuario, $id_reserva){
        session_start();
        $id_usuario = $_SESSION['id'];
        $id_reserva = $_SESSION['id_reserva'];

        $stmt = $this->pdo->prepare("DELETE FROM reservas WHERE id_usuario = :id_usuario AND id_reserva = :id_reserva");
        if($stmt->execute(['id_usuario' => $id_usuario, 'id_reserva' => $id_reserva])){
            header("Location: ./../../src/views/part_view_perfil.php");
            exit();
        }
    }

    
}
