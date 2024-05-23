<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);



?>

<?php 

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];

$sql = "insert into client values ('','$nom','$prenom','$email')";
$conn->query($sql);
$last_idClient = $conn->insert_id;

$now = date('Y-m-d');

$sql = "insert into facture values ('','$last_idClient','$now')";
$conn->query($sql);
$last_idFacture = $conn->insert_id;


for($i=1;$i<100;$i++){
	if(isset($_POST["$i"])){
		$quantite = $_POST["$i"];
		if(is_numeric($quantite)){
			$idProduit = $i;
			$sql = "select * from produit where Identifiant=". $idProduit;
			$res_produit = $conn->query($sql);
			$row = $res_produit->fetch_assoc();			
			$prixHT = $row["PrixHT"] * $quantite;
			$sql = "insert into detail_facture values ('','$last_idFacture','$idProduit','$quantite','$prixHT')";
			$conn->query($sql);
		};
	}
}


$sql = "select df.PrixHT,p.Designation from detail_facture df,produit p where p.Identifiant = df.IdProduit and df.IdFacture=".$last_idFacture;
$res_detailfacture = $conn->query($sql);


 ?>
 
 <table border="1">
	<tr>
		<td>Facture N° : <?php echo $last_idFacture ?></td>
	</tr>
	<tr>
		<td>Client : <?php echo $nom . ' ' . $prenom ?></td>
	</tr>
	<?php if ($res_detailfacture->num_rows > 0) { 
		while($line = $res_detailfacture->fetch_assoc()) {
	?>
	<tr>
		<td>
			<?php echo $line["Designation"]?><br>
			<?php echo (($line["PrixHT"] * 0.20) + $line["PrixHT"]) . 'DH'?><br>
		</td>
	</tr>
	<?php }} ?>
 </table>