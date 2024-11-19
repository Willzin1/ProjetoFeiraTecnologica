<?php
    namespace App\model;

    class Reserva{
        private $id_reserva;
        private $data_reserva;
        private $hora_reserva;
        private $numero_pessoas;
        private $id_usuario;

        public function getIdReserva(){
            return $this->id_reserva;
        }

        public function getDataReserva(){
            return $this->data_reserva;
        }

        public function getHoraReserva(){
            return $this->hora_reserva;
        }

        public function getNumeroPessoas(){
            return $this->numero_pessoas;
        }

        public function getIdUsuario(){
            return $this->id_usuario;
        }

        public function setIdReserva($id_reserva){
            return $this->id_reserva = $id_reserva;
        }

        public function setHoraReserva($hora_reserva){
            return $this->hora_reserva = $hora_reserva;
        }

        public function setDataReserva($data_reserva){
            return $this->data_reserva = $data_reserva;
        }

        public function setNumeroPessoas($numero_pessoas){
            return $this->numero_pessoas = $numero_pessoas;
        }

        public function setIdUsuario($id_usuario){
            return $this->id_usuario = $id_usuario;
        }
    }