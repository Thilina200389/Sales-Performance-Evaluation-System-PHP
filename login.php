<?php
$conn = new mysqli('localhost', 'root', '', 'spesv3');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$agentCode = $_POST['agentCode'];
$password = $_POST['password'];

$stmt = $conn->prepare('SELECT role FROM users WHERE agent_code=? AND password=MD5(?)');
$stmt->bind_param('ss', $agentCode, $password);
$stmt->execute();
$stmt->bind_result($role);
if ($stmt->fetch()) {
    echo json_encode(['success'=> true, 'role'=> $role]);
} else {
    echo json_encode(['success'=> false]);
}
$stmt->close();
$conn->close();
?>
