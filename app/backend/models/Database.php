<?php

class Database {
    public function getConnection() {
        try {
            $pdo = new PDO("mysql:dbname=hotel;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $err) {

        }
    }
 }