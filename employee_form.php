<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>TP 4 - PHP - Inscription d'employés</title>
<link rel=".'stylesheet'." href=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'." integrity=".'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'." crossorigin=".'anonymous'.">
<script src=".'https://code.jquery.com/jquery-3.3.1.slim.min.js'." integrity=".'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'." crossorigin=".'anonymous'."></script>
<script src=".'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'." integrity=".'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'." crossorigin=".'anonymous'."></script>
<script src=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'." integrity=".'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'." crossorigin=".'anonymous'."></script>
</head>
<body style="background-color: #ffcc00;">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset>
<legend><b>Inscrire un employé</b></legend>
<label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="text" name="nom" value="" size="30" maxlength="60" required="required"/><br/><br/>
<label>Salaire :&nbsp;</label>
<input type="number" name="salaire" min="0" max="100000" step="5000" size="6" required="required"/><br/><br/>
<label>Age :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
<input type="number" name="age" min="18" max="100" size="6" required="required"/><br/><br/>
<input type="submit" value="Inscrire" name="inscrire" />
</fieldset>
</form>
<?php

if(isset($_POST["nom"] )){
$inscriptions[]= array("nom" =>$_POST["nom"], "age" =>$_POST["age"], "salaire"=>$_POST["salaire"]);
}
echo "<table class=".'table'."> 
<thead>
<tr>
<th scope=".'col'.">Id</th>
<th scope=".'col'.">Nom</th>
<th scope=".'col'.">Salaire</th>
<th scope=".'col'.">Age</th>
</tr>
</thead>
<tbody>";

if(isset($_POST["inscrire"])) {

    foreach ($inscriptions as $inscription){
    
    echo " <tr>
    <th scope=".'row'.">".$inscription["nom"]."</th>
    <td>".$inscription["nom"]."</td>
    <td>".$inscription["nom"]."</td>
    <td>".$inscription["nom"]."</td>
    </tr>";
}
}

echo" </tbody> </table>";
?>

<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>