<?php
require_once __DIR__ . '/includes/auth.php';
if (!is_logged_in()) { header('Location: /admin/login.php'); exit; }
?><!doctype html><html><head><meta charset="utf-8"><title>Admin - Dashboard</title>
<link rel="stylesheet" href="/assets/css/theme.css"></head><body>
<header class="topbar"><div class="brand">Admin</div><nav class="menu"><a href="/admin/">Dashboard</a><a href="/admin/leads.php">Leads</a><a href="/admin/logout.php">Logout</a></nav></header>
<main class="container"><h1>Welcome to Admin Dashboard</h1><p>Use the menu to manage leads, quotes, invoices, tracking, complaints and posts.</p></main></body></html>
