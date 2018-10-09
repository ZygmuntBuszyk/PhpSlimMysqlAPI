<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
ini_set('display_errors', 1);
// Get all members from database
$app -> get('/api/members', function(Request $request, Response $response){
  $sql = "SELECT * FROM members";

  try {
    // GET DB OBJECT
    // db() <---  z klasy z db.php
    $db = new db();
    // CONNECT 
    $db = $db->connect();


    $stmt = $db->query($sql);
    $members = $stmt->fetchAll(PDO::FETCH_OBJ); 
    $db = null; // zeruje wartość $db 
    echo json_encode($members);
  }
  catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
});

// GET SINGLE MEMBER(with ID)
$app -> get('/api/member/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM members WHERE id = $id";

  try {
    // GET DB OBJECT
    // db() <---  z klasy z db.php
    $db = new db();
    // CONNECT 
    $db = $db->connect();


    $stmt = $db->query($sql);
    $member = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null; // zeruje wartość $db 
    echo json_encode($member);
  }
  catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
});

// Add single member 
$app -> post('/api/member/add', function(Request $request, Response $response){
  $first_name = $request->getParam('first_name');
  $last_name = $request->getParam('last_name');
  $nickname = $request->getParam('nickname');
  $phone = $request->getParam('phone');
  $skype = $request->getParam('skype');
  $email = $request->getParam('email');
  $country = $request->getParam('country');
  
  $sql = "INSERT INTO members (first_name,last_name,nickname,phone,skype,email,country) VALUES (:first_name,:last_name,:nickname,:phone,:skype,:email,:country)";

  try {
    // GET DB OBJECT
    // db() <---  z klasy z db.php
    $db = new db();
    // CONNECT 
    $db = $db->connect();


    $stmt = $db->prepare($sql);

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':skype', $skype);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':country', $country);

    $stmt->execute();

    echo '{"notice": {"text": "Added Member" }';

  }
  catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
});
 
// UPDATE
$app -> put('/api/member/update/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');  
  $first_name = $request->getParam('first_name');
  $last_name = $request->getParam('last_name');
  $nickname = $request->getParam('nickname');
  $phone = $request->getParam('phone');
  $skype = $request->getParam('skype');
  $email = $request->getParam('email');
  $country = $request->getParam('country');
  
  $sql = "UPDATE members SET 
        first_name = :first_name,
        last_name = :last_name,
        nickname = :nickname,
        phone = :phone,
        skype = :skype,
        email = :email,
        country = :country
        WHERE id = $id ";

  try {
    // GET DB OBJECT
    // db() <---  z klasy z db.php
    $db = new db();
    // CONNECT 
    $db = $db->connect();


    $stmt = $db->prepare($sql);

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':skype', $skype);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':country', $country);

    $stmt-> execute();

    echo '{"notice": {"text": "Updated Member" }';

  }
  catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
});

// DELETE 
$app -> delete('/api/member/delete/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM members WHERE id = $id";

  try {
    // GET DB OBJECT
    // db() <---  z klasy z db.php
    $db = new db();
    // CONNECT 
    $db = $db->connect();


    $stmt = $db->prepare($sql);
    $stmt->execute(); 
    $db = null; // zeruje wartość $db 
    echo '{"notice": {"text": "Deleted Member" }';
  }
  catch(PDOException $e) {
    echo '{"error": {"text": '.$e->getMessage().'}';
  }
});