// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:pinyasova.database.windows.net,1433; Database = Прогр", "Valera", "Hswfhmlyz08");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "Valera@pinyasova", "pwd" => "Hswfhmlyz08", "Database" => "Прогр", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:pinyasova.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
