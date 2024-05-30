<?php

class Database {
    public function getConnection() {
        try {
            $pdo = new PDO("mysql:dbname=hotel1;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $err) {
            echo "erro" . $err;
        }
    }
 }