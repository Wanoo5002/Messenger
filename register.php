<?
mysql_connect("localhost", "vanka", "1234123");
mysql_select_db("users");

if(isset($_POST['submit']))
{
    $err = array();

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }


    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }


    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[] = "Пользователь с таким логином уже существует в базе данных";

    }

    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {
        $login = $_POST['login'];

        

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

        

        mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");

        header("Location: http://localhost/denwer/index.php"); exit();

    }
    else{
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
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
    <div id="title"><h1>Скрывашка</h1></div>
    <div>
        <form method="POST">
            <input name="login" type="text" placeholder='Логин'/>
            <input name="password" type="password" placeholder='Пароль'/>
            <input type='submit' name="submit"value='Создать аккаунт'>
            <a href='login.php'>Есть аккаунт?</a>
        </form>
    </div>
    <div id="main">
    </div>
</body>
</html>