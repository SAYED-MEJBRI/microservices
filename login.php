<!DOCTYPE html>
<html>
  <head>
<?php 	include_once('inc/head.php');?>
<link rel="stylesheet" href="css/login_style.css">
</head>
<body>
<?php 	include_once('inc/header.php');?>
	<h1>Page de connexion et d'inscription</h1>
    <div id="login-form">
  <h2>Connexion</h2>
  <form method="POST" action="control_login.php">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password">
    <br>
    <button type="submit">Connexion</button>
  </form>
  <p>Pas encore de compte ? <a href="#" id="signup-link">Inscrivez-vous ici</a>.</p>
</div>

<div id="signup-form" style="display:none;">
  <h2>Inscription</h2>
  <form action="control_inscription.php" method="POST">
    <label for="new-username">Nom d'utilisateur:</label>
    <input type="text" id="new-username" name="new-username">
    <br>
    <label for="new-email">Email d'utilisateur:</label>
    <input type="email" id="email" name="email">
    <br>
    <label for="new-password">Mot de passe:</label>
    <input type="password" id="new-password" name="new-password">
    <br>
    <label for="confirm-password">Confirmez le mot de passe:</label>
    <input type="password" id="confirm-password" name="confirm-password">
    <br>
    <button type="submit">Inscription</button>
  </form>
  <p>Déjà membre ? <a href="#" id="login-link">Connectez-vous ici</a>.</p>
</div>
<script src="js/login.js"></script>
</body>
</html>