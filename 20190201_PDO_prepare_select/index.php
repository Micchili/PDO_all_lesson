<?php
    require_once "../database.php";
    $id = "9";
    $pass = "11111";
    try {
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
        //エラーモード変更
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //エミュ変更
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $sql = "SELECT * FROM user WHERE id=? OR password=?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$id);
        $ps->bindValue(2,$pass);

        $ps->execute();
        $recorde = $ps->fetchAll(PDO::FETCH_ASSOC);
        print_r($recorde);

    } catch ( Exception $e) {
        echo $e->getMessage();
    }
    $pdo = null;
