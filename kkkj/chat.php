<?php
session_start();
include('includes/db.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $username = $_SESSION['user'];

    $sql = "INSERT INTO chat (username, message) VALUES ('$username', '$message')";
    $conn->query($sql);
}

$messages = $conn->query("SELECT * FROM chat ORDER BY id DESC");

?>

<form method="POST">
    <textarea name="message" placeholder="Digite sua mensagem"></textarea>
    <button type="submit">Enviar</button>
</form>

<div id="chat">
    <?php while ($row = $messages->fetch_assoc()): ?>
        <p><strong><?php echo $row['username']; ?>:</strong> <?php echo $row['message']; ?></p>
    <?php endwhile; ?>
</div>
