<?PHP
  //ob_start();	
  //session_start();
  
  require_once("./configuration/configuration.php");
  require_once("./src/class_account.php");
  require_once("./src/function.php");
  mysqli();
?>
<html>
<?php 
head_html(); 
?>
<body>
<?php 
	$pokaz_formx = null;
	
	if(isset($_POST['go_rejestracja']))
	{
		header("Location: rejestracja.php");
	}
	if(isset($_GET['zaloguj']))
	{
		$login=addslashes($_POST['login']);	
		$pass=addslashes($_POST['pass']);
		
		$loginPrawda = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM konta WHERE login = '$login'"));
		
		//SPRAWDZAMY POLE Z LOGINEM
		if (!$login or empty($login))
		{
			$info_txt_login="Wpisz login";
			$blad=true; 
		}
		else if($loginPrawda[0] == 0)
		{
			$info_txt_login="Login nie istnieje";
			$blad=true; 
		}
		
		$hasloPrawda = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM konta WHERE login = '$login' AND pass = PASSWORD('$pass')"));
		//SPRAWDZAMY POLE Z HASLEM
		if (!$pass or empty($pass))
		{
			$info_txt_pass="Wpisz hasło";
			$blad=true; 
		}
		else if($hasloPrawda[0] == 0)
		{
			$info_txt_pass="Nieprawidłowe hasło";
			$blad=true; 
		}
		
		if(!$blad)
		{
			$pokaz_formx=true;
		
			$passhash = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM account WHERE password = PASSWORD('$pass')"));
		
		
			//UZYTKOWNIK ISTNIEJE
			$konto = konto::getData($login, $pass);
		
			$_SESSION['login'] = $login;
			$_SESSION['pass'] = $pass;
			
			header("Location: _SRC/index.php");
		}
		else
		{
				$pokaz_formx=false;
		}
	}
	
if($pokaz_formx!=true){?>

	<?php 
	
	require_once("./modules/modules_menu.php"); 
	?>
	
	<!--<div id="Mid">
			<br>
			<center><h1>Witaj na Allelektryk.pl</h1></center>
			<center><h6><div id="Text">
			Jesteś na stronie na której znajdziesz wszystko o elektryce i elektronice.
			Poznawaj z nami elektryke to przecież takie proste.Już dziś sprawdzaj symbole elektryczne i najnowszy 
			osprzęt elektryczny oraz maszyny który są zasilane prądem elektrycznym.
	
			</div></h6></center>
			<br>
			<hr style="width:300;">
			<center><h2>Zaloguj się</h2></center>
			<form id="form" method="POST" action="index.php?zaloguj=zaloguj">
					<div id="Mid-Formularz-Center">
						<br>
						<br>
						<div id="Obeject-Float" style="margin:auto;">		
							<div id="Obeject-Float-1" style="margin-top:-1; width:50"><div id="Mid-Formularz-Czcionka"><img src="/_IMG/UI/User.png"></div></div>
							<div id="Obeject-Float-2" style="margin-left:-4; width:10"><input type="text" maxlength="16" size="16" id="login" name="login"  placeholder="Podaj Login..." value="<?php echo $login ?>"/></div>
							<div id="Obeject-Float-5" style="margin-left:60; width:200"><font color="#e70000" ><div id="wiadomosc_login"><?php echo $info_txt_login ?></div></font></div>
						</div>
						<br>
						<div id="Obeject-Float" style="margin:auto;">		
							<div id="Obeject-Float-1" style="margin-top:-2; width:50"><div id="Mid-Formularz-Czcionka"><img src="/_IMG/UI/Pass.png"></div></div>
							<div id="Obeject-Float-2" style="margin-left:-4; width:10"><input type="password" maxlength="20" size="16" id="pass" name="pass"  placeholder="Podaj Hasło..." value="<?php echo $pass ?>"/></div>
							<div id="Obeject-Float-5" style="margin-left:60; width:200"><font color="#e70000" ><div id="wiadomosc_pass"><?php echo $info_txt_pass ?></div></font></div>
							<font color="#e70000" ><div id="test"></div></font>
						</div>
						<br>
						<br>
						<center><input type="button" value="Zaloguj Się" name="zaloguj "id="buttonek" /></center>
						<br>
						<center><input type="submit" value="Zarejestruj Się" name="go_rejestracja" /></center>
						<br>
					</div>
					<script>
						$(document).ready(function()
						{
							$("#buttonek").click(function()
							{
								var login = $("#login").val();
								var pass = $("#pass").val();
								
								$.ajax(
								{
									url: "LOGOWANIE_WALIDACJA.php",
									type: "POST",
									dataType: 'json',
									data: "login="+login +"&pass="+pass,
									success: function(data)
									{
										if(data.error_login == true)
										{
											$("#wiadomosc_login").text(data.login_msg);
											$("#login").removeClass("valid").addClass("invalid");
										}
										else
										{
											$("#wiadomosc_login").text(data.login_msg);	
											$("#login").removeClass("invalid").addClass("valid");
										}
										
										if(data.error_pass == true)
										{
											$("#wiadomosc_pass").text(data.pass_msg);
											$("#pass").removeClass("valid").addClass("invalid");
										}
										else
										{
											$("#wiadomosc_pass").text(data.pass_msg);
											$("#pass").removeClass("invalid").addClass("valid");
										}

										if(data.error_all == true)
										{
											$('form').submit();
											

										}
										
										
									},
									error: function()
									{
										$("#wiadomosc_login").text("BŁAD AJAXX");
									}
								});
							});
						});
					</script>
			</form>
	</div>-->
	<!--<?php require_once("./modules/modules_down.php");  ?>-->
<?php
}
else{
}
?>		
</body>
</html>
