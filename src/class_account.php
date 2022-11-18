<?PHP

class konto
	{			
		public static $konto = array();
		
		public function getData ($login, $pass)
		{
			if ($login == '') $login = $_SESSION['login'];
			if ($pass == '') $pass = $_SESSION['pass'];
			
			self::$konto = mysql_fetch_array(mysql_query("SELECT * FROM konta WHERE login='$login' AND pass = PASSWORD('$pass') LIMIT 1;"));
			return self::$konto;
		}
		
		public function getDataById ($id) 
		{
			$konto =mysql_fetch_array(mysql_query("SELECT * FROM konta WHERE id='$id' LIMIT 1;"));
			return $konto;
		}
		
		public function isLogged ()
		{
			if (empty($_SESSION['login']) || empty($_SESSION['pass']))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
?>