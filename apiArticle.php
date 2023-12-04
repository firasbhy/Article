<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
$host = "localhost";
$db_name = "test_smatconsiel";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configure PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	try {
        $query = "SELECT * FROM article";
        $stmt = $conn->query($query);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
        return (json_encode($data));
    } catch (PDOException $e) {
        echo "Erreur dans la requête : " . $e->getMessage();
    }
    echo json_encode(["message" => "Réponse de l'API pour la requête GET"]);
}

?>