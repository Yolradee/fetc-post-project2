<?php
  function error($e) {
    $ret = array('response' => false, 'errmsg' => $e, 'msg' => array());
    echo json_encode($ret);
  }
  if ($_SERVER['REQUEST_METHOD']=='GET') {
    $c = new mysqli("localhost", "u5522773787", "1652527", "u5522773787");
 
    if ($c->connect_errno) {
      error("Unable to connect to the database");
      die();
    }
 
    
        
        $r = $c->query("SELECT SUM(Fast7) AS tf , SUM(Thor) AS ta, SUM(Taken) AS tk FROM movie;");
  
     

    if ($r) {
      $msg = array();
      while($row = $r->fetch_assoc()) {
        $m = array();
        $m['Fast7'] = $row['tf'];
        $m['Thor'] = $row['ta'];
        $m['Taken'] = $row['tk'];
        $msg[] = $m;  
      }
      $ret = array('response' => true, 'errmsg' => '', 'msg' => $msg);
      echo json_encode($ret);
      die();
    }
    else {
      error("Unable to fetch messages");
      die();
    } 
  }
  else {
    error("Invalid request");
    die();
  }
?>
