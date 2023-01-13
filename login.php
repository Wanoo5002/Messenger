<?
session_start();
function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;

}
mysql_connect("localhost", "vanka", "1234123");
mysql_select_db("users");  
if(isset($_POST['submit']))
{
  $query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login = '".mysql_real_escape_string($_POST['login'])."' LIMIT 1");
  $data = mysql_fetch_assoc($query);
  if($data['user_password'] == md5(md5($_POST['password']))){
    $hash = md5(generateCode(10));
     mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
     setcookie("id", $data['user_id'], time()+60*60*24*30);
     setcookie("hash", $hash, time()+60*60*24*30);
     header("Location: check.php"); exit();
  }
  else{
    print "Неверный пароль";
  }
}
?>
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
<div>
<form method='POST'>
<input name="login" type="text" placeholder='Логин'/>
<input name="password" type="password" placeholder='Пароль'/>
<a href='register.php'>Нет аккаунта?</a>
<input type='submit' name="submit"value='Войти'>
</form>
</div>
    <div id="title"><a href='index.php'><h1>Скрывашка</h1></a></div>
    <div id="main">
    </div>
</body>
</html>