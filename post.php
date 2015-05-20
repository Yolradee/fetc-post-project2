<?php
function error($e) {
  $ret = array('response' => false, 'errmsg' => $e);
  echo json_encode($ret);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
  isset($_POST['Fast7']) && isset($_POST['Thor']) && isset($_POST['Taken'])) {
  
  $c = new mysqli("localhost", "u5522773787", "1652527", "u5522773787");
  if ($c->connect_errno) {
    error("Unable to connect to the database");
    die();
  }
  $f = $c->real_escape_string($_POST['Fast7']);
  $t = $c->real_escape_string($_POST['Thor']);
  $ta = $c->real_escape_string($_POST['Taken']);
if (strlen($u) >= 1024 && strlen($m) >= 2048) {
    error("Invalid message");
    die();
  }
  $r = $c->query("INSERT INTO movie (Fast7, Thor, Taken) VALUES ('{$f}','{$t}','{$ta}');");
  if ($r) {
    $ret = array('response' => true, 'errmsg' => '');
    echo json_encode($ret);
  }
  else {
    error('Unable to update the database');
    die();
  }
}
else {
  error("Invalid request");
  die();
}
?>

