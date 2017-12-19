<html>
<head>
<Title>Регистрационная форма</Title>
<style type="text/css">
    body { background-color:
 #fff; border-top: solid 10px #000;
 color: #333; font-size: .85em;
 margin: 20; padding: 20;
 font-family: "Segoe UI",
 Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000;
margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em;
 text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em;
border: 0 none; }
</style>
</head>
<body>
<h1>Регистрация</h1>
<p>Заполните своё имя, пароль, электронный адрес, а затем нажмите <strong> "Регистрация" </strong> .</p>
<form method="post" action="index.php"
      enctype="multipart/form-data" >
Имя  <input type="text"
       name="name" id="name"/></br>
Пароль  <input type="text"
       name="password" id="password"/></br>  
Повторите пароль  <input type="text"
       name="confirm_password" id="confirm_password"/></br>
Email <input type="text"
       name="Email" id="Email"/></br>
<input type="submit"
       name="submit2" value="Проверить" /></br>
<input type="submit"
       name="submit" value="Регистрация" />
    


    <?php
try {
$conn = new PDO("sqlsrv:server = tcp:pinyasova.database.windows.net,1433; Database = Progr", "Valera", "Hswfhmlyz08");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_POST["submit2"])){
    $password = $_POST['password'];
$confirmpassword = $_POST['confirm_password'];
    if($password == $confirmpassword)
    {
        echo "<h3>Пароль введен верно</h3>";
    }
    else {echo "<h3>Пароль введен неверно</h3>";}}
    
    
}
catch (PDOException $e) {
print("Error connecting to SQL Server.");
die(print_r($e));
}

try {
$conn = new PDO("sqlsrv:server = tcp:pinyasova.database.windows.net,1433; Database = Progr", "Valera", "Hswfhmlyz08");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Error connecting to SQL Server.");
die(print_r($e));
}
if(isset($_POST["submit"])) {
    if($_POST["name"] =="" || $_POST["password"|| $_POST["email"] ==""){echo "Введите логин и пароль";}
    else{
try {
$name = $_POST['name'];
$email = $_POST['Email'];
$date = date("Y-m-d");
$password = $_POST['password'];


    
// Insert data
$sql_insert =
"INSERT INTO test_tbl1 (name, email, date, password) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $date);
$stmt->bindValue(4, $password);
$stmt->execute();
}   
catch(Exception $e) {
die(var_dump($e));
}
echo "<h3>Вы зарегистрированы!</h3>";
}
}

$sql_select = "SELECT * FROM test_tbl1";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
    echo "<h2>Люди, которые зарегистрированы:</h2>";
    echo "<table>";
    echo "<tr><th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Date</th>";
    echo "<th>Password</th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td>".$registrant['name']."</td>";
        echo "<td>".$registrant['email']."</td>";
        echo "<td>".$registrant['date']."</td>";
        echo "<td>".$registrant['password']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>Ни один пользователь не зарегистрирован.</h3>";
}

?>
   
</form>

</body>
</html>
