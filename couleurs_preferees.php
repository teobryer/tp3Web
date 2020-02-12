<?php 
echo "<!DOCTYPE html>
<head>
<title>TP 4 - PHP - Inscription d'employés</title>
    
<link rel=".'stylesheet'." href=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'." integrity=".'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'." crossorigin=".'anonymous'.">
 <script src=".'https://code.jquery.com/jquery-3.3.1.slim.min.js'." integrity=".'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'." crossorigin=".'anonymous'."></script>
<script src=".'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'." integrity=".'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'." crossorigin=".'anonymous'."></script>
<script src=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'." integrity=".'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'." crossorigin=".'anonymous'."></script>
</head>";

if(isset($_POST["couleur1"])) {
    setcookie("couleur1",$_POST["couleur1"],time()+15);
    setcookie("couleur2",$_POST["couleur2"],time()+15);
    
    echo "<body class='".$_POST["couleur1"]." ".$_POST["couleur2"]."'>";
}


else {
    if (isset($_COOKIE["couleur1"]))
    echo "<body class='".$_COOKIE["couleur1"]." ".$_COOKIE["couleur2"]."'>";
    else echo "<body>";
}








?>



<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset>
<legend><b>Choissisez vos couleurs préférés</b></legend>
<label>Couleur 1 :&nbsp;&nbsp;&nbsp;&nbsp;</label>
<select name="couleur1">
  <option value=''>vide</option>
  <option value='bg-primary'>bleu</option>
  <option value='bg-white'>blanc</option>
  <option value='bg-danger'>rouge</option>
</select> 
<br/>
<label>Couleur 2 :&nbsp;</label>
<select name="couleur2" >
  <option value=''>vide</option>
  <option value='text-secondary'>noir</option>
  <option value='text-success'>vert</option>
  <option value='text-warning'>jaune</option>
</select> 
<br/>
<input type="submit" value="Valider" name="couleur" />
</fieldset>
</form>

<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>