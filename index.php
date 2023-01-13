<!-- <? 
if(isset($_POST['exit'])) {
  setcookie("id", "", time()-3600);
  setcookie("hash", "", time()-3600);
}
?> -->


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Скрывашка</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <div id="title"><a href='index.php'><h1>Скрывашка</h1></a></div>
    <div id="main">
<!-- <?
mysql_connect("localhost", "vanka", "1234123");
mysql_select_db("users");
if(isset($_COOKIE['id']) and isset($_COOKIE['hash'])){

   $query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
     $userdata = mysql_fetch_assoc($query);

        print "Привет, ".$userdata['user_login'].". Всё работает!";
        echo "<form method='POST'><input type='submit' name='exit' value='выйти'></input></form>";


}
else{
  echo "<div>
        <form action='login.php'>
        <button href='login.php'>Логин</button>
      </form>
      </div>";
}

?> -->
    </div>
</body>
</html>