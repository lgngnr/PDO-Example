<?php

    // DB Params
    $host = "localhost";
    $db_name = "test-api";
    $username = "test";
    $password = "123456";

    // Set DNS
    $dns = "mysql:host=$host;dbname=$db_name";

    // Create PDO instance
    $pdo = new PDO($dns, $username, $password);

    /** PDO QUERY */
    $stmt = $pdo->query("SELECT * FROM products");

    echo "<p>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $row['title'] . "<br/>";
    }
    echo "</p>";

    $stmt = $pdo->query("SELECT * FROM products");
    echo "<p>";
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        echo $row->title . "<br/>";
    }
    echo "</p>";
?>