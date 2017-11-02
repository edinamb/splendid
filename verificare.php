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
   include("conn.php");

function testare($data) {
   $data = trim($data); 
   $data = stripslashes($data); 
   $data = htmlspecialchars($data); 
   return $data; 
}

class Admin {
   public $id_admin;
   public $nume;
   public $parola;
}

$n = testare($_REQUEST["numeletau"]); 
$p = testare($_REQUEST["parolata"]);

if(isset($cnx)) {

   $cda= "SELECT * from admin";
   $stmt = $cnx->prepare($cda);
   $stmt->execute();
   $gasit = false;

   while ($utilizator = $stmt->fetchObject('Admin'))
    {
      if($utilizator->nume == $n && $utilizator->parola == $p) 
      {
         echo '<h1 class="italic centrat"><span class="litera italic"> S</span>unteti autorizat</h1><br />';
    echo '<form class="centrat" method="post" action="adaugare.php">';
         echo '<input type="submit" name="submit1" value="Adaugare">';
         echo '</form></center>';
         $gasit = true;
         break;
      }
   }
   if(!$gasit) 
   {
      echo '<h1 class="italic centrat"><span class="litera italic"> NU</span>aveti acces in baza de date</h1><br />';
      echo '<form class="centrat"><input type="button" value="Mai incearca" onClick="location.href=\'login.html\'"></form></center>';
   }
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