<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
session_name('UNNATI_SESS');
if (session_status()===PHP_SESSION_NONE) session_start();

if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
function csrf_field(){ return '<input type="hidden" name="csrf" value="'.htmlspecialchars($_SESSION['csrf']).'">'; }
function csrf_check(){ if($_SERVER['REQUEST_METHOD']==='POST' && (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf']))) { http_response_code(403); exit('Invalid CSRF'); } }

require_once __DIR__ . '/config.php';
$mysqli = @new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if ($mysqli && !$mysqli->connect_errno) { $mysqli->set_charset('utf8mb4'); }
header_remove('X-Powered-By');
