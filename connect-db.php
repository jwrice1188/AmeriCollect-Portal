<?php
    $dsn='mysql:host=localhost;dbname=cndrqcbu_cigar';
    $username='cndrqcbu_user';
    $password='password';

    try {
        $db=new PDO($dsn, $username, $password);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;
        exit();
    }
?>