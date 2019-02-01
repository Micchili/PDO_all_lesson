<?php
    require_once "../database.php";
    $id = "9";
    $pass = "11111";
    $img = "9999";
    try {
        $pdo = new PDO(DSN,DB_USER,DB_PASSWORD);
        //エラーモード変更
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //エミュ変更
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $sql = "INSERT INTO user VALUES(:id,:pass,:img)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(":id",$id);
        $ps->bindValue(":pass",$pass);
        $ps->bindValue(":img",$img);
        
        // $ps->execute();
        for ($i=0; $i < 1000; $i++) { 
            $ps->bindValue(":id",$id.$i);
            $ps->bindValue(":pass",$pass);
            $ps->bindValue(":img",$img);
            $ps->execute();
        }
    } catch ( Exception $e) {
        echo $e->getMessage();
    }
    $pdo = null;
