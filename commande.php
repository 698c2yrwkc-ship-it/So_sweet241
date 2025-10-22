<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "so_sweet_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$nom_client   = $_POST['nom_client'];
$telephone    = $_POST['telephone'];
$produit      = $_POST['produit'];
$quantite     = $_POST['quantite'];
$prix_unitaire = $_POST['prix_unitaire'];
$total = $quantite * $prix_unitaire;

$sql = "INSERT INTO commandes (nom_client, telephone, produit, quantite, prix_unitaire, total)
        VALUES ('$nom_client', '$telephone', '$produit', '$quantite', '$prix_unitaire', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Commande enregistrée avec succès !</h2>";
    echo "<p>Merci $nom_client, votre commande de $quantite $produit(s) a bien été enregistrée.</p>";
    echo "<p>Total à payer : <strong>$total FCFA</strong></p>";
    echo '<a href=\"Contacts.html\">↩️ Retour à la page</a>';
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>