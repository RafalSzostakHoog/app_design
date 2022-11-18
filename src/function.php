<?PHP
require_once("./configuration/configuration.php");
function mysqli() 
{
	return mysqli_connect(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
}
	
function connect_mysql()
{
	$mysql_serwer = "80.211.240.68";  		//IP SERWERA
	$mysql_admin = "root";  					   //NAZWA KONTA
	$mysql_pass = "Kocham250316xx";                   //HASŁO KONTA
	$mysql_db = "allelektryk";                       //BAZA DANYCH
	
	//FUNKCJA KTÓRA ŁĄCZY Z mysql_admin
		return mysqli_connect($mysql_serwer, $mysql_admin, $mysql_pass, $mysql_db);
}

function head_html()
{
	echo "<head>";
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">";
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
	echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"./styles/styles_main.css\">";
	echo "<link rel=\"icon\" href=".IMAGE_LOGO." type=\"image/png\">";
	echo "<script src=\"/_SILNIKI/jquery-3.2.1.js\"></script>";
	echo "<script src=\"/js/start.js\"></script>";
	echo "<script src=\"/js/ajax.js\"></script>";
	echo "<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.10/css/all.css\" >";
	echo "<title>".TITLE_NAME."</title>";
	echo "</head>";
}

?>