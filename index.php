<?php
include ('db.php');
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Czyż Marcin CV - grafik komputerowy / frontend developer </title>
  <link rel="stylesheet" href="stylesheets/global.css">
  



  
</head>
<body>
<!-- //////////////////////////////////////////////////////////////////////////////////////// -->

<?php
$zapytanie_dane = mysqli_query ($con,"SELECT * FROM user");
//$dane = mysqli_fetch_row ($zapytanie_dane);
list ($imie,$nazwisko,$telefon,$miasto,$kod_pocztowy,$ulica,$email) = mysqli_fetch_row ($zapytanie_dane);
?>



<!-- //////////////////////////////////////////////////////////////////////////////////////// -->



<div class="container">

<!--  -->

  <div class="info__container">
   <div class="info__box"><div class="icon user"></div><div class="sign"><?php echo $imie.' '.$nazwisko ?></div></div>
    <div class="info__box"><div class="icon home"></div><div class="sign"><p><?php echo $ulica  ?></p><?php echo $kod_pocztowy; echo " "; echo $miasto; ?></div></div>
  </div>



  <div class="avatar__container"><div class="avatar__box"></div></div>




  <div class="info__container">
    <a href="tel:+48<?php echo $telefon ?>"><div class="info__box"><div class="icon phone"></div><div class="sign"><?php echo $telefon ?></div></div></a>
   <div class="info__box"><div class="icon mail"></div><div class="sign"><?php echo $email ?></div></div>



  </div>



<div class="bigbox__container">
  <div class="big__box first__bigbox"><div class="icon wrench"> <ul>
   <div class="align__left">
   <?php
   $petla_umiejetnosci_zap = mysqli_query ($con,"SELECT id_skill FROM skills");
   $liczba_umiejetnosci = mysqli_num_rows($petla_umiejetnosci_zap);  //working

    for ($licznik=1;$licznik<=4;$licznik++) {

        $umiejetnosc = mysqli_query($con, "SELECT * FROM skills WHERE id_skill = $licznik");
        list ($id_skill, $skill_name, $skill_level) = mysqli_fetch_row ($umiejetnosc);



echo '<li><img src="images/png/check.png" class="list__icon">';
        echo $skill_name;
        for ($l_level = 1; $l_level<=$skill_level; $l_level++ ) {
            echo ' <img src="images/png/star.png" class="level" alt="">';
        }
        echo '</li>';
    }
   ?></div>

              <div class="align__right">
                  <?php

                  for ($licznik=5;$licznik<=$liczba_umiejetnosci;$licznik++) {

                      $umiejetnosc = mysqli_query($con, "SELECT * FROM skills WHERE id_skill = $licznik");
                      list ($id_skill, $skill_name, $skill_level) = mysqli_fetch_row ($umiejetnosc);



                      echo '<li><img src="images/png/check.png" class="list__icon">';
                      echo $skill_name;
                      for ($l_level = 1; $l_level<=$skill_level; $l_level++ ) {
                          echo ' <img src="images/png/star.png" class="level" alt="">';
                      }
                      echo '</li>';
                  }
                  ?></div>





          </ul>
    <p><div class="sign">Umiejętności</div></p></div></div>
    <div class="big__box">
      <div class="icon loop"> <ul>
      <div class="align__left">

          <?php
          $petla_prac_zap = mysqli_query ($con,"SELECT id_prac FROM work");
          $liczba_prac = mysqli_num_rows($petla_prac_zap);  //working

          for ($licznik=1;$licznik<=$liczba_prac;$licznik++) {

              $praca = mysqli_query($con, "SELECT * FROM work WHERE id_prac = $licznik");
              list ($id_prac, $firma, $stanowisko) = mysqli_fetch_row ($praca);
             //echo '<li><img src="images/png/add.png" class="list__icon">';

             echo  '<li><img src="images/png/add.png" class="list__icon">'.$firma .'<div class="small__sign">'.$stanowisko.'</div></li>';

          }
          ?>
      </div>

      
    </ul>
    <p><div class="sign">Doświadczenie</div></p></div>  </div>
</div>


<!--  -->

<div class="mediumbox__container">
  <div class="medium__box"><div class="icon book"></div><div class="half__medium">Wyższa <br>
szkoła biznesu <br>
w Dąbrowie Górniczej
Inżynier informatyk
</div>
<div class="sign">Wykształcenie</div></div>
    <div class="medium__box"><div class="icon car"></div><div class="half__medium"><!-- <p>Obsługa wózka widłowego</p> -->
            <?php
            $petla_up_zap = mysqli_query ($con,"SELECT id_cours FROM courses");
            $liczba_up = mysqli_num_rows($petla_up_zap);  //working

            for ($licznik=1;$licznik<=$liczba_up;$licznik++) {

                $up = mysqli_query($con, "SELECT * FROM courses WHERE id_cours = $licznik");
                list ($id_up, $uprawnienie) = mysqli_fetch_row ($up);


                echo  '<p>'.$uprawnienie.'</p>';

            }
            ?>
        </div>
            <div class="sign">Uprawnienia i kursy</div></div>
</div>

<!--  -->


<div class="smallbox__container">
  <div class="small__box"><div class="icon photo"></div><div class="sign">Fotografia</div></div>

  <div class="small__box"><div class="icon computer"></div><div class="sign">Grafika komputerowa</div></div>
  <div class="medium__box english"><div class="icon chat"></div><div class="sign">Język angielski</div></div>
</div>





<div class="footer">Wyrażam zgodę na przetwarzanie moich danych osobowych zawartych w niniejszym CV dla potrzeb niezbędnych do realizacji
procesu rekrutacji, zgodnie z Ustawą z dnia 29.08.1997 roku o Ochronie Danych Osobowych; tekst jednolity: Dz. U. z 2014r. poz.
1182.</div>




</div>



<!-- //////////////////////////////////////////////////////////////////////////////////////// -->


</body>
</html>
