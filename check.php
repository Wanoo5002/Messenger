<?
mysql_connect("localhost", "vanka", "1234123");
mysql_select_db("users");
if(isset($_COOKIE['id']) and isset($_COOKIE['hash'])){

	 $query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
     $userdata = mysql_fetch_assoc($query);

        print "Привет, ".$userdata['user_login'].". Всё работает!";
        echo "<script> setTimeout(() => { location.href='index.php'; }, 3000);</script>";
        exit;


}

else

{

    print "Включите куки";

}


   

?>