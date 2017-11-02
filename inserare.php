 <!DOCTYPE html>
 <html lang="ro">
 <head>
  <meta charset="UTF-8">
  <title>Floraria Splendid</title>
  <link href="css/splendid.css" rel="stylesheet">
  <link href="css/reset.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
</head>
<body>
 <div id="continut">

  <header>
   <img src="imagini/fundal_antet.png" class="ecran_mare" alt=""/> 
   <img src="imagini/fundal_antet_mobil.png" class="ecran_mic" alt="" /><!-- initial invizibil -->
   <a href="index.html">Magazinul Dv. favorit...</a>
 </header>

 <div id="continut_pag">
   <main>
 <?php
   function testare($data) {
      $data = trim($data); 
      $data = stripslashes($data); 
      $data = htmlspecialchars($data); 
      return $data; 
   }
   if (testare($_FILES["fisier"]["error"]) > 0) {
      echo "Error: " . $_FILES["fisier"]["error"] . "
"; 
      exit; 
   }
   if (testare($_FILES["mare"]["error"]) > 0) {
      echo "Error: " . $_FILES["mare"]["error"] . "
";
      exit; 
   }
   $numeimagine = testare($_FILES["fisier"]["name"]); 
   $poz = strrpos($numeimagine, "."); 
   $extensie = substr ($numeimagine, $poz); 
   $nmtmp = $_FILES["fisier"]["tmp_name"]; 
   $numeimaginemare = testare($_FILES["mare"]["name"]); 
   $pozm = strrpos($numeimaginemare, "."); 
   $extensiem = substr ($numeimaginemare, $pozm); 
   $nmtmpm = $_FILES["mare"]["tmp_name"]; 
   $categoria = testare($_REQUEST["combo"]); 
   $nume = testare($_REQUEST["nume"]); 
   $prezentare = testare($_REQUEST["prez"]); 
   $pastrare = testare($_REQUEST["pastr"]); 
   $limbajul = testare($_REQUEST["limbaj"]); 
   $pretul = testare($_REQUEST["pret"]);
   
   include("conn.php");
   if(isset($cnx)) {
   $cda= "INSERT INTO produse (id_produs, fisier_imagine, imagine_mare, id_categ, nume_produs, prezentare, pastrare, limbajul_florilor, pret) VALUES (null, :numeimagine, :numeimaginemare, :idcateg, :numeprod, :prez, :pastrare, :limbaj, :pret)";
   $stmt = $cnx->prepare($cda); 
   $stmt->bindParam(':numeimagine', $numeimagine, PDO::PARAM_STR);
   $stmt->bindParam(':numeimaginemare', $numeimaginemare, PDO::PARAM_STR);
   $stmt->bindParam(':idcateg', $categoria, PDO::PARAM_STR); 
   $stmt->bindParam(':numeprod', $nume, PDO::PARAM_STR); 
   $stmt->bindParam(':prez', $prezentare, PDO::PARAM_STR);
   $stmt->bindParam(':pastrare', $pastrare, PDO::PARAM_STR);
   $stmt->bindParam(':limbaj', $limbajul, PDO::PARAM_STR);
   $stmt->bindParam(':pret', $pretul, PDO::PARAM_STR);
   // se foloseste PARAM_STR chiar si pentru numere 
   $stmt->execute(); 
   // Preiau ID-ul pozei introduse in baza si construiesc un nou nume 
   $id = $cnx->lastInsertId(); 
   $numeimaginenou = "imagine".$id.$extensie; 
   $numeimaginemarenou = "imagine".$id."M".$extensie; 
   $cda = "UPDATE produse SET fisier_imagine='$numeimaginenou' WHERE id_produs = $id";
   $stmt = $cnx->prepare($cda); 
   $stmt->execute();
   // Construiesc calea pe care sa incarc fisierul 
   $cale = "imagini/$numeimaginenou"; 
   $rezultat = move_uploaded_file($nmtmp, $cale); 
   if (!$rezultat) { 
      echo "Eroare la incarcarea fisierului"; 
      exit; 
   } 
   $cda = "UPDATE produse SET imagine_mare='$numeimaginemarenou' WHERE id_produs = $id";
   $stmt = $cnx->prepare($cda); 
   $stmt->execute(); 
   $calem = "imagini/$numeimaginemarenou"; 
   $rezultat = move_uploaded_file($nmtmpm, $calem); 
   if (!$rezultat) { 
      echo "Eroare la incarcarea fisierului"; 
      exit; 
   }
   
   echo "<p class=\"inserare centrat\">";
   echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">P</span>rodusul<br />s-a adaugat in baza de date</h1><br />";
   echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"
      onClick=\"location.href='adaugare.php'\">";
   echo "<input type=button value=\"Home\" onClick=\"location.href='index.html'\"></form>";
   echo "</p><br /><br />";
   echo "<p class=\"inserare centrat\">Numele vechi al fisierului: $numeimagine</p>";
   echo "<p class=\"inserare centrat\">Numele vechi al fisierului mare:   $numeimaginemare</p>";
   echo "<p class=\"inserare centrat\">Categoria fisierului: $categoria</p>";
   echo "<p class=\"centrat inserare\">Noul nume al fisierului: $numeimaginenou</p>";
   echo "<p class=\"inserare centrat\">Imaginea mare: $numeimaginemarenou</p>"; 
   $cnx = null;
}
?>
</main>

<nav> <!-- Plasat pe coloana din dreapta! -->
 <h1>Categorii</h1>
 <ul>
   <li> <a href="buchete.html">Buchete</a></li>
   <li>Aranjamente</li>
   <li>Bonsai</li>
   <li>Promoții</li>
 </ul>

 <h1>Mai puteți cumpara...</h1>
 <ul>
   <li>Dulciuri</li>
   <li>Băuturi</li>
   <li>Jucării</li>
 </ul>

 <h1>Cele mai bine vândute</h1>
 <ul>
   <li>2009</li>
   <li>2008</li>
   <li>2007</li>
 </ul>

 <h1>Administrare</h1>
 <ul>
   <li><a href="login.html">Baza de date</a></li>
 </ul>
 <h1>Impresii</h1>
 <ul>
   <li>Cartea de oaspeti</li>
 </ul>
</nav>
</div> <!-- continut_pag -->

<footer>
 <p>Site proiectat de Informatică aplicată și programare.
 © I.A.P. 2017 </p>
</footer>
</div>
</body>
</html>