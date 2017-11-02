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
    <h1 class="italic centrat"><span class="litera italic">A</span>daugare</h1><br />
    <form name="formular" enctype="multipart/form-data" method="post" action="inserare.php" class="centrat">
     <table class="login centrat">
      <tr>
       <td>Categoria:</td>
       <td> 
        <select name="combo">
          <option selected value="initial">(Alege categoria)</option>
          <?php
          include("conn.php");

          class Categorii {
          public $id_categ;
          public $categoria;
        }

        if(isset($cnx)) {
        $cda= "SELECT * FROM categorii";
        $stmt = $cnx->prepare($cda);
        $stmt->execute();
        while ($categ = $stmt->fetchObject('Categorii')) {
        echo '<option value="' . $categ->id_categ . '">' . $categ->categoria . '</option>\n';
      }
      $cnx = null;
    }
    ?>
</select>
</td>
</tr>

<tr>
   <td>Selectati imaginea: </td>
   <td><input type="file" name="fisier" /></td>
</tr>


<tr>
   <td>Imaginea mare: </td>
   <td><input type="file" name="mare" /></td>
</tr>

<tr>
   <td>Numele produsului: </td>
   <td><input type="text" name="nume" /></td>
</tr>

<tr>
   <td>Prezentare:</td>
   <td><textarea name="prez"></textarea></td>
</tr>

<tr>
   <td>Pastrare:</td>
   <td><textarea name="pastr"></textarea></td>
</tr>

<tr>
   <td>Limbajul florilor:</td>
   <td><textarea name="limbaj"></textarea></td>
</tr>

<tr>
  <td>Pretul:</td>
  <td><input type="text" name="pret" /></td>
</tr>

<tr>
   <td><input type="submit" name="submita" value="Adauga"></td>
   <td><input type="reset" name="submitr" value="Sterge"></td>
</tr>
</table>
</form>
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