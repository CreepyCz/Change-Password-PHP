<?php
	ob_start();
	session_start();
	require_once 'souborspripojenimkdatabazi.php';
	
	// pokud nejsi prihlaseny hodi te to na index
	if( !isset($_SESSION['user']) ) {
		header("Location: /index");
		exit;
	}
  
	// vyberu data z databaze
	$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);

?>

<?php
$passw = $_POST['passw'];
if(isset($_POST['zmena'])) {$heslo = hash('sha256', $passw);
mysql_query("UPDATE users SET pass='$heslo' WHERE username='".$userRow['username']."'");

echo "<meta http-equiv='refresh' content='3;url=logout.php?logout'>";
echo'  <div class="alert alert-success">
    <strong>INFO:</strong> ZMĚNA HESLA BYLA ÚSPĚŠNĚ PROVEDENA! Nyní budeš odhlášen!
  </div>';};?>
<form action="" method="POST">
<i class="fa fa-cog"></i> Změna hesla
<input type="text" name="passw" placeholder="Zadejte nové heslo">
<input type="text" name="heslo_znova" placeholder="Zopakujte nové heslo">
<button style="margin-top: 10px; margin-left:640px;" name="zmena">Odeslat</button></form>

<!-- http://new.creepos.eu/ Online demo v záložce účet -->


Tento kód potřeba změnit podle sebe, (sessiony, název db, tabulka, username atd atd..)
