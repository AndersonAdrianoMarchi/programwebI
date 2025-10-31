 <?php
 
         class Pessoa {
            private $nome;
            private $sobrenome;
            private $dataNascimento;
            private $cpfcnpj;
            private $tipo;
            private $telefone;
            private $endereco;
        
            public function getNomeCompleto() {
                return $this->nome. " ". $this->sobrenome;
            }

            public function getNome () {
                return $this -> nome;
            }

            public function setNome ($nome) {
                $this -> nome = $nome;
            }

            public function getSobrenome() {
                return $this -> sobrenome;
            }   

            public function setSobrenome($sobrenome) {
                $this -> sobrenome = $sobrenome;
            }

            public function getDataNascimento() {
                return $this -> dataNascimento;
            }

            public function setDataNascimento($dataNascimento) {
                $this -> dataNascimento = $dataNascimento;
            }

            public function getCpfCnpj() {
                return $this -> cpfcnpj;
            }

            public function setCpfCnpj($cpfcnpj) {
                $this -> CpfCnpj = $cpfcnpj;
            }

            public function getTipo() {
                return $this -> tipo;
            }

            public function setTipo ($tipo) {
                $tipo -> tipo = $tipo;
            }

            public function getTelefone() {
                return $this -> telefone;
            }

            public function setTelefone ($telefone) {
                $this -> telefone = $this;
            }

            public function getEndereco() {
                return $this -> endereco;
            }

            public function setEndereco ($endereco) {
                $this -> endereco = $endereco;
            }
        }

?>