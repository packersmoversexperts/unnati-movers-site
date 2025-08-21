<?php
require_once __DIR__ . '/../../includes/security.php';
function is_logged_in(){ return !empty($_SESSION['admin_id']); }
function login($email,$password){
  global $mysqli;
  if (!$mysqli) return false;
  $s = $mysqli->prepare("SELECT id,password FROM users WHERE email=? AND is_active=1 LIMIT 1");
  $s->bind_param('s',$email); $s->execute(); $r=$s->get_result();
  if ($r->num_rows){
    $u = $r->fetch_assoc();
    if (password_verify($password, $u['password'])){ $_SESSION['admin_id']=$u['id']; return true; }
  }
  return false;
}
function logout(){ session_destroy(); }
