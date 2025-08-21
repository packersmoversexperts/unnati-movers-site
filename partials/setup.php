<?php
const SETUP_ACCESS_KEY = 'UNNATI-DSC-19870619';
if (!isset($_GET['key']) || $_GET['key']!==SETUP_ACCESS_KEY){ http_response_code(403); exit('Access denied. Add ?key='.SETUP_ACCESS_KEY); }
function h($s){ return htmlspecialchars($s,ENT_QUOTES,'UTF-8'); }
if($_SERVER['REQUEST_METHOD']==='POST'){
  $DB_HOST=$_POST['db_host']; $DB_USER=$_POST['db_user']; $DB_PASS=$_POST['db_pass']; $DB_NAME=$_POST['db_name'];
  $ADMIN_EMAIL=$_POST['admin_email']; $ADMIN_PASS=$_POST['admin_pass'];
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysqli = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME); $mysqli->set_charset('utf8mb4');

  // write config
  @mkdir(__DIR__.'/includes',0755,true);
  $cfg="<?php\n\$DB_HOST='".addslashes($DB_HOST)."';\$DB_USER='".addslashes($DB_USER)."';\$DB_PASS='".addslashes($DB_PASS)."';\$DB_NAME='".addslashes($DB_NAME)."';\$SITE_URL='https://".$_SERVER['HTTP_HOST']."';\$ADMIN_EMAIL='".addslashes($ADMIN_EMAIL)."';\n";
  file_put_contents(__DIR__.'/includes/config.php',$cfg);

  // import schema
  $sql = file_get_contents(__DIR__.'/Unnati_DB_Schema.sql');
  foreach(array_filter(array_map('trim', preg_split('/;\s*[\r\n]+/',$sql))) as $q){ $mysqli->query($q); }

  // create admin
  $hash = password_hash($ADMIN_PASS, PASSWORD_BCRYPT);
  $stmt = $mysqli->prepare("INSERT INTO users(name,email,password,role,is_active) VALUES('Admin',?,?,'admin',1) ON DUPLICATE KEY UPDATE email=email");
  $stmt->bind_param('ss',$ADMIN_EMAIL,$hash); $stmt->execute();

  @unlink(__FILE__);
  echo "✅ Installed. Go to /admin/login.php";
  exit;
}
?><!doctype html><html><head><meta charset="utf-8"><title>Unnati Installer</title>
<meta name="viewport" content="width=device-width,initial-scale=1"><style>body{font-family:system-ui;padding:24px}input{padding:10px;width:100%;margin-bottom:10px}button{padding:12px 16px;background:#1E3A8A;color:#fff;border:0;border-radius:10px;font-weight:700}</style></head><body>
<h2>Unnati Movers – Installer</h2>
<form method="post">
  <input name="db_host" placeholder="DB Host" value="localhost" required>
  <input name="db_name" placeholder="DB Name" required>
  <input name="db_user" placeholder="DB User" required>
  <input name="db_pass" type="password" placeholder="DB Password">
  <input name="admin_email" type="email" value="leads.unnatimovers@gmail.com" placeholder="Admin Email" required>
  <input name="admin_pass" type="password" placeholder="Admin Password" required>
  <button>Install</button>
</form>
<p>Access key required → append <code>?key=<?php echo SETUP_ACCESS_KEY; ?></code> to the URL.</p>
</body></html>
