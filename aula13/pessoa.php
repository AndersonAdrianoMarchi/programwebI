<?php

    class Pessoa {
        private $nome;
        private $sobrenome;
        private 

        /*public function __construct() {
            $this ->nome="";
            $this ->sobrenome="";
        }*/

        public function getNomeCompleto() {
            return $this->nome . " " . $this->sobrenome;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getSobrenome() {
            return $this->sobrenome;
        }

        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }
    }

?>