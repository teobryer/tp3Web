<?php echo "<!DOCTYPE html>
<head>
<title>TP 4 - PHP - Inscription d'employés</title>
    
<link rel=".'stylesheet'." href=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'." integrity=".'sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T'." crossorigin=".'anonymous'.">
 <script src=".'https://code.jquery.com/jquery-3.3.1.slim.min.js'." integrity=".'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'." crossorigin=".'anonymous'."></script>
<script src=".'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'." integrity=".'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'." crossorigin=".'anonymous'."></script>
<script src=".'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'." integrity=".'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'." crossorigin=".'anonymous'."></script>
</head>
<body>
";?>

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
$inscriptions = array();
session_start();
$dejaInscrit= false;

function alreadyExist() {
    if( isset($_POST["nom"]) && isset($_SESSION["tabInscrits"])){
    foreach($_SESSION["tabInscrits"] as $i){

if ( $i[0] == $_POST["nom"] && $i[1] == $_POST["age"] && $i[2]==$_POST["salaire"]){
     return true;   
}
    }
    }
   return false;
    
}


if(isset($_POST["nom"] ) && !alreadyExist()){
    
    $inscription= array($_POST["nom"], $_POST["age"], $_POST["salaire"]);
    $fp = fopen('employees.csv', 'a');
    
   
    
    fputcsv($fp, $inscription);
    $_SESSION["tabInscrits"][]= $inscription;
    
    fclose($fp);
    
}
else {
    
    if (alreadyExist()) $dejaInscrit=true;
}
$row = 1;
if (($handle = fopen("employees.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $inscription = array();
        $row++;
        for ($c=0; $c < $num; $c++) {
            $inscription[] = $data[$c];
        }
        
        $inscriptions[]= $inscription;
    }
    fclose($handle);
}




echo "<table class=".'table'."> 
<thead>
<tr>
<th scope=".'col'.">Nom</th>
<th scope=".'col'.">Age</th>
<th scope=".'col'.">Salaire</th>
</tr>
</thead>
<tbody>";

if(isset($_POST["inscrire"])) {

    foreach ($inscriptions as $inscription){
    
    echo " <tr>
    <th scope=".'row'.">".$inscription[0]."</th>
    <td>".$inscription[1]."</td>
    <td>".$inscription[2]."</td>
    </tr>";
}
}

echo" </tbody> </table>";
if($dejaInscrit){ echo "Vous êtes déjà inscrit !";}

?>

<a href="accueil.php">Retour à l'accueil</a>
</body>
</html>