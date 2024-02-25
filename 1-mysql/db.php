<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

function ExecuteSql(PDO $dbh, string $sql, array $data = []): void
{
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
}

//##########################################################################

$dsn = 'mysql:dbname=my_db;host=db;port:3306';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn, $user, $password);

ExecuteSql(
    $dbh,
    "CREATE TABLE IF NOT EXISTS `my_table` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(1024) NOT NULL,
        `status` varchar(256) NOT NULL,
        `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);

while (true) {
    ExecuteSql(
        $dbh,
        "INSERT INTO `my_table` (name, status) VALUES (:name, :status)",
        [
            ':name' => sprintf('name-%d', rand(1, 9999)),
            ':status' => sprintf('status-%d', rand(1, 9999)),
        ]
    );

    sleep(1);
    echo '.';
}
