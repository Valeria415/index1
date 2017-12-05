<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:pinyasova.database.windows.net,1433; Database = Progr", "Valera", "Hswfhmlyz08");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE registration1_tbl1(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    date DATE,
    password VARCHAR(30))";
   
    $conn->query($sql);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

?>
