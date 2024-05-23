<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);


// $sql = "select * from produit";
// $res_produit = $conn->query($sql);

?>

<table style="width:700px;border:1px solid #000000">
	<tr>
		<td style="height:50px;border:1px solid #000000">
			Vente des produits informatiques
		</td>
	</tr>
	<tr>
		<td style="height:500px;border:1px solid #000000">
			
			
			
			
			<form method="post" action="genererFacture.php">
				<table>
					<tr>
					<?php 
					if ($res_produit->num_rows > 0) {
						while($row = $res_produit->fetch_assoc()) {
							?>
						<td>
							<?php echo $row["Designation"] ?><br>
							<?php echo $row["PrixHT"]. 'DH'?><br>
							<img width="50" height="50" src="<?php echo 'img/'.$row["Image"]?>"/><br>
							Qte : <input type="text" name="<?php echo $row["Identifiant"] ?>"/>
						</td>
					<?php }} ?>
					</tr>		
				</table>
				<br>
				<table>
					<tr>
						<td>Nom:<input type="text" name="nom"/></td>
						<td>Prenom:<input type="text" name="prenom"/></td>
						<td>Email:<input type="text" name="email"/></td>
					</tr>
				</table>
				
				<input type="submit" value="Valider"/>
			</form>
			
			
			
			
		</td>
	</tr>
</table>