<?php
session_start();
require('../mainte/db_connection.php');

if(isset($_SESSION['id'])){
  $id = $_REQUEST['id'];

  $messages = $pdo->prepare('SELECT * FROM posts WHERE id=?');
  $messages->execute(array($id));
  $message = $messages->fetch();

  if($message['member_id'] == $_SESSION['id']){
    $del = $pdo->prepare('DELETE FROM posts WHERE id=?');
    $del->execute(array($id));
  }
}

header('Location: index.php');
exit();
?>