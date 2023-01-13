<?
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

?>