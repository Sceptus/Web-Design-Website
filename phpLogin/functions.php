<?php
    function login($username, $password) {
        if ($username == "vishal" && sha1($password) == "147e81309435d1f60319f4775d96a6e272e29b2c") {
            return true;
        }
        else {
            return false;
        }
    }
?>