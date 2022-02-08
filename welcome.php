<HTML>
<BODY>
 

Welcome/Bienvenido <?php echo $_POST ["name"]; ?> <br>
Tu dirección electronica es : <?php echo $_POST ["email"]; ?> <br>
<br />
<hr />
<?php echo "La hora actual es : " . date("h:i:sa"); ?>
<br />
<hr />

<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
     $conn = new PDO ("mysql:host=$servername;dbname=PCI_VIDANTA_RM", $username, $password);
 /* $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);<?php */
	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 echo "Connected succeefully Conección Exitosa";
	 }
catch(PDOExeption $e)
    {
	echo "Connecction failed: " . $e->getMessage();
	}
?>

</BODY>
</HTML>