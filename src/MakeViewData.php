<?php
ini_set('display_errors', "On");

function mssqlconnect()
{
    $dsn = 'example';
    $user = 'example';
    $password = 'example';

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    } catch (PDOException $Exception) {
        die('エラー:' . $Exception->getMessage());
    }

    return $pdo;
}

$sql = "SELECT * FROM example";
$pdo = mssqlconnect();
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);