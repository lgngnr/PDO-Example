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

    /** Prepared Statements: Positional Parameters */
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $id = 1;
    $stmt->execute([$id]);
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo "<p>";
    foreach($products as $product){
        echo "$product->title <br/>";
    }
    echo "</p>";

    /** Prepared Statements: Named Parameters */
    $sql = "SELECT * FROM products WHERE id = :id AND category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    $id = 2;
    $category_id = 1;
    $stmt->execute(['id'=>$id, 'category_id'=>$category_id]);
    $products = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo "<p>";
    foreach($products as $product){
        echo "$product->title <br/>";
    }
    echo "</p>";
?>