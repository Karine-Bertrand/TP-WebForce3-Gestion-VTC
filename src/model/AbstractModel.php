<?php

namespace App\Model;

use PDO;

abstract class AbstractModel {

    public static function getPdo() {
        return new PDO(
                'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT.';charset=utf8',
                DB_USERNAME,
                DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
    }
}