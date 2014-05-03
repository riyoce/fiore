<?php

class Connect {

    private $host = "localhost";
    private $user = "floreri2_user";
    private $pass = "Fiore696";
    private $db = "floreri2_fiore";
    private $port = "3306";

    public function conectar() {
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }else{
            return $mysqli;
        }
    }

}

?>
