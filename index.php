Paweł
#0974

EboveR — Dziś o 12:04
f<?php 
ini_set( 'display_errors', 'On' );
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
#error_reporting( E_ALL );
# zmienne
$config_file = "config.php";
// Rozwiń
// install.php
// 16 KB
// ﻿
// f<?php 
// ini_set( 'display_errors', 'On' );
// error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
#error_reporting( E_ALL );
# zmienne
// $config_file = "config.php";


function form_install_1(){
global $config_file;
echo "<h4>Instalacja serwisu</h4>\n";
echo "<form name=install_1 action=install.php method=post>\n";
echo "<table class=''table>\n";
echo "<tr><td align=right>Nazwa lub adres serwera</td><td><input type='text' name='host' value=".@$_POST['host']."></td><td rowspan=5 valign=top width=160>Te informacje musisz uzyskać od adnimistratora serwera.</td></tr>";
echo "<tr><td align=right>Nazwa bazy danych</td><td><input type='text' name='dbname' value=".@$_POST['dbname']."></td></tr>\n";
echo "<tr><td align=right>Nazwa użytkownika</td><td><input type='text' name='user' value=".@$_POST['user']."></td></tr>\n";
echo "<tr><td align=right>hasło</td><td><input type='password' name='usepasswd' value=".@$_POST['passwd']."></td></tr>\n";
echo "<tr><td align=right>Prefix tabeli</td><td><input type='text' name='prefix' value=".@$_POST['prefix']."></td></tr>\n";
echo "<tr><td align=right><input type='hidden' name='step' value='2'></td><td colspan='2'><input class='btn btn-info' type='submit' name='submit_install_1' value=\"Krok 2\"></td></tr>\n";
echo "</table>\.table\n";
echo "</form>\n";
}

function step2(){
        global $config_file;
if(isset($_POST['submit_install_1'])){
    if(isset($_POST['host']) && $_POST['host']<>"") {
        $a = TRUE;
    }
    else {
        $a = FALSE;
        $message[] = "Proszę wprowadzić poprawną nazwę lub adres hosta.";
    }
    if(isset($_POST['dbname']) && $_POST['dbname']<>"") {
        $b = TRUE;
    }
    else {
        $b = FALSE;
        $message[] = "Proszę wprowadzić poprawną nazwę bazy danych.";
    }
    if(isset($_POST['user']) && $_POST['user']<>"") {
        $c = TRUE;
    }
    else {
        $c = FALSE;
        $message[] = "Proszę wprowadzić poprawną nazwę użytkownika.";
    }
    if(isset($_POST['passwd']) && $_POST['passwd']<>"") {
        $d = TRUE;
    }
    else {
        $d = FALSE;
        $message[] = "Proszę wprowadzić hasło.";
    }
    if(isset($_POST['prefix']) && $_POST['prefix']<>"") {
        $e = TRUE;
    }
    else {
        $e = FALSE;
        $message[] = "Proszę wprowadzić prefix [np. nazwę bazy].";
    }
}

if($a AND $b AND $c AND $d AND $e) {
$file=fopen($config_file,"w");
$config = "<?php
 \$host=\"".$_POST['host']."\";
 \$user=\"".$_POST['user']."\";
 \$password=\"".$_POST['passwd']."\";
 \$dbname=\"".$_POST['dbname']."\";
 \$prefix=\"".$_POST['prefix']."\";
 \$link = mysqli_connect(\$host, \$user, \$password, \$dbname);\n";
   if(!fwrite($file, $config)) {
        print "Nie mogę zapisać do pliku ($file)";
        exit;
   }
   echo "<p>Krok 2 zakończony: \n";
   echo "Plik konfiguracyjny utworzony</p>";

   fclose($file);

echo "<form name='install_2' action='install.php' method='post'>\n";
echo "<input type='hidden' name='step' value='3'>\n";
echo "<input class='btn btn=info' type='submit' name='submit_install_2' value=\"Przejdź do kroku 3\">\n";
echo "</form>\n";



}
if(isset($message)) {
        echo "<div align=\"left\"><b>Wystąpił następujący problem:</b><br />\n";
        foreach ($message as $key => $value) {
                echo "$value <br />\n";
        }
form_install_1();
}

}

function step3(){
    global $config_file;
if(!file_exists($config_file) || filesize($config_file) == 0) {header("location:install.php");exit;}
else {
    include($config_file);
}

if(file_exists("sql/lab2021finish.sql.php")) {
    include("sql/lab2021finish.sql.php");
    echo "Tworzę tabele bazy: ".$dbname.".<br>\n";
    mysqli_select_db($link, $dbname) or die(mysqli_error($link));
    for($i=0;$i<count($create);$i++){
            echo "<p>".$i.". <code>".$create[$i]."</code></p>\n";
            mysqli_query($link, $create[$i]);
    }
    echo "Krok 3 zakończony.<br>\n";
    echo "<form name='install_3' action='install.php' method='post'>\n";
    echo "<input type='hidden' name='step' value='4'>\n";
    echo "<input class='btn btn-info' type='submit' name='submit_install_3' value=\"Przejdź do kroku 4\">\n";
    echo "</form>\n";
    } else {
        echo "<p>Error 3: Brak pliku z bazą.</p>";
    }
}

function step4(){
        global $config_file;
if(!file_exists($config_file) || filesize($config_file) == 0) {header("location:install.php");exit;}
else {
        include($config_file);

        if(file_exists("sql/lab2021finish.sql.php")) {
            include ("sql/lab2021finish.sql.php");
            echo "<p>Wstawiam dane do tabel bazy: ".$dbname.".</p>\n";
            mysqli_select_db($link, $dbname) or die(mysqli_error($link));
            for($i=0;$i<count($insert);$i++){
                echo "<p>".$i.". <code>".$insert[$i]."</code></p>\n";
                mysqli_query($link, $insert[$i]);
        }
        echo "Krok 4 zakończony.<br>\n";
        echo "<form name='install_4 action='install.php' method='post'>\n";
        echo "<input type='hidden' name='step' value='5'>\n";
        echo "<input class='btn btn-info' type='submit' name='submit_install_4' value=\"Przejdź do kroku 5\">\n";
        echo "</form>\n";
        } else {
        echo "<p>Error 3: Brak pliku z bazą.</p>";
    }
}
}

function url_origin($s, $use_forwarded_host = false)
{
    $ssl      = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on');
    $sp       = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port     = $s['SERVER_PORT'];
    $port     = ((!$ssl && $port=='80') || ($ssl && $port='443')) ? '' : ':'.$port;
    $host     = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host     = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host = false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

function step5(){
        global $config_file;
        $url = pathinfo(full_url($_SERVER));
if(!file_exists($config_file) || filesize($config_file) == 0) {header("location:install.php");exit;}
else {
    include($config_file);
    if(!$_POST['base_url']) $base_url = $url['dirname']."/";
    else $base_url = $_POST['base_url'];

    echo "<Form name='install_5' action='install.php' method='post'>\n";
    echo "<table class='table'>\n";
    echo "<tr><td align=right>Nazwa serwisu</td><td><input class='form-control' type='text' name='nazwa_aplikacji' value='".$_POST['nazwa_aplikacji']."'></td><td valign='top' width='260'>Nazwa aplikacji</td></tr>\n";
    echo "<tr><td align=right>Adres serwisu</td><td><input class='form-control' type='text' name='base_url' value=".$base_url."></td><td valign='top' width='260'>Adres domenowy, np.:www.eksoc.uni.lodz.pl/zie</td></tr>\n";
    echo "<tr><td align=right>Data powstania</td><td><input class='form-control' type='text' name='data_powstania' value='".date("d.m.Y",time())."'></td><td valign='top' width='260'>Data powstania serwisu, czyli domyślnie dzisiejsza data</td></tr>";
    echo "<tr><td align=right>Wersja</td><td><input class='form-control' type='text' name='wersja' value='".$_POST['wersja']."'></td><td valign='top' width='260'>wersja aplikacji</td></tr>\n";
    echo "<tr><td align=right>Nazwa firmy</td><td><input class='form-control' type='text' name='brand' value='".$_POST['brand']."'></td><td valign='top' width='260'>Nazwa firmy</td></tr>\n";
    echo "<tr><td align=right>Ulica</td><td><input class='form-control' type='text' name='adres1' value='".$_POST['adres1']."'></td><td valign='top' width='260'>Adres firmy (ulica)</td></tr>\n";
    echo "<tr><td align=right>Masto, kod</td><td><input class='form-control' type='text' name='adres2' value='".$_POST['adres2']."'></td><td valign='top' width='260'>Adres firmy (miasto, kod)</td></tr>\n";
    echo "<tr><td align=right>Telefon</td><td><input class='form-control' type='text' name='phone' value='".$_POST['phone']."'></td><td valign='top' width='260'>Telefon do firmy (ulica)</td></tr>\n";

    echo "<tr><th class='text_center' colspan=3>Konto administratora</th></tr>";
    echo "<tr><td align=right>Login Administratora</td></tr><input class='form-control' type=text name=admin_login value=".$_POST['admin_login']."></td><td valgin=top width=260>Nazwa konta administratora</td></tr>\n";
    echo "<tr><td align=right>Hasło Admninistratora</td><td><input class='form-control' type=password name=passwd value=\"\"></td><td valgin=top width=260 rowspan=2>Hasło konta administratora</td></tr>\n";
    echo "<tr><td align=right>Potwierdzenie hasła Administratora</td><td><input class='form-control' type=password name=v_passwd value=\"\"></td></tr>\n";
    echo "</table>/.table\n";
    echo "<input type='hidden' name='step' value='6'>\n";
    echo "<input class='btn btn-info' type='submit' name='submit_install_5' value=\"Krok6\n";
    echo "</form>\n";
}
}

function step6(){
        global $config_file;
if(isset($_POST['submit_install_5'])){
    if(isset($_POST['nazwa_aplikacji']) && $_POST['nazwa_aplikacji']<>"") {
         $a = TRUE;
      }
      else {
         $a = FALSE;
         $message[] = "Proszę wprowadzić poprawną nazwę aplikacji.";
      }
      if(isset($_POST['base_url']) && $_POST['base_url']<>"") {
         $b = TRUE;
      }
      else {
         $b = FALSE;
         $message[] = "Proszę wprowadzić poprawny adres serwisu.";
      }
      if(isset($_POST['wersja']) && $_POST['wersja']<>"") {
         $c = TRUE;
      }
      else {
         $c = FALSE;
         $message[] = "Proszę podać wersję aplikacji.";
      }
      if(isset($_POST['admin_login']) && $_POST['admin_login']<>"") {
         $d = TRUE;
      }
      else {
          $d = FALSE;
         $message[] = "Proszę wprowadzić identyfikator Administratora, np. admin.";
      }
      if(isset($_POST['passwd']) && $_POST['passwd']<>"" && $_POST['v_passwd'] == $_POST['passwd']) {
          $e = TRUE;
      }
      else {
         $e = FALSE;
         $message[] = "Proszę wprowadzić hasło / potwierdzenie hasła lub hasło i potwiedzenie są różne.";
      }
      if(isset($_POST['brand']) && $_POST['brand']<>"") {
        $f=TRUE;
      }
      else {
        $f=FALSE;
        $message[] = "Proszę podać nazwę firmy.";
      }
}

if($a AND $b AND $c AND $d AND $e AND $f) {

    $config = "\n# konfiguracja aplikacji\n
    \$base_url=\"".$_POST['base_url']."\";
    \$nazwa_aplikacji=\"".$_POST['nazwa_aplikacji']."\";
    \$data_powstania=\"".$_POST['data_powstania']."\";
    \$wersja=\"".$_POST['wersja']."\";
    \$brand=\"".$_POST['brand']."\";
    \$adres1=\"".$_POST['adres1']."\";
    \$adres2=\"".$_POST['adres2']."\";
    \$phone=\"".$_POST['phone']."\";
    \$img_footer=\"".$_POST['base_url']."img/kashyyyk.jpg\";
    ";
    if(is_writable($config_file)) {
        if(!$uchwyt = fopen($config_file, 'a')) {
            echo "Nie mogę otworzyć pliku ($config_file)";
            exit;
        }
        if(fwrite ($uchwyt, $config) == FALSE) {
            echo "Nie mogę zapisać do pliku ($config_file)";
            exit;
        }
        echo "Sukces, zapisano (<code>konfigurację</code>) do pliku (".$config_file.")";
        fclose($uchwyt);
    } else {
        echo "Plik ".$config_file." ni jest zapisywalny";
    }

    if(!file_exists($config_file) || filesize($config_file) == 0) {
        #header("location:install.php");exit;
        echo "error brak pliku";
    }
    else {
        include($config_file);
        $insert[] = "INSERT INTO `".$prefix."_users` (`u_id`, `login`, `haslo`, `rola`, `active`) VALUES
                        (1, '".$_POST['admin_login']."', '".password_hash($_POST('passwd'), PASSWORD_DEFAULT)."', 1, '1');";
        $insert[] = "INSERT INTO `".$prefix."_profiles` (`u_id`, `imie`, `nazwisko`, `email`, `telefon`, `adres`, `updated_date`) VALUES
                        (1, 'Admin', 'Adminowski', 'admin@wookie.pl', '".$_POST['phone']."', '".$_POST['adres1']."\n".$_POST['adres2']."', CURRENT_TIMESTAMP);";
        $insert[] = "INSERT INTO `".$prefix."_acl` (`acl_id`, `u_id`, `m_id`) VALUES
                        (1, '1', '1'),
                        (2, '1', '2');";
        
        mysqli_select_db($link, $dbname) or die (mysqli_error($link));
        for($i=0;$i<count($insert);$i++){
                echo "<p>".$i.". <code>".$insert($i)."</code></p>\n";
                mysqli_query($link, $insert[$i]);
        }
    echo "<p>Konfiguracja zapisana.<br>\n";
    echo "Krok 5 i 6 zakończony.</p>\n";
    echo "<form name='install_6' action='install.php' method='post'>\n";
    echo "<input type='hidden' name='step' value='7'>\n";
    echo "<input class='btn btn-info type='submit' name='submit_install_6' value=\"Przejdź do kroku 7\">\n";
    echo "</form>\n";
    }
    if(isset($message)) {
        echo "<div algin=\"left\"><b>Wystąpił następujący problem:</b><br />\n";
        foreach($message as $key => $value) {
                echo "$value <br />\n";
        }
    step5();
    }
}
}

function step7(){
    global $dbname, $link, $tb_config;
    global $config_file;
    if(!file_exists($config_file) || filesize($config_file) == 0) {header("location:install.php");exit;}
    else include($config_file);
    echo "<h4 algin=center>Instalacja zakończona!</h4>\n";
    echo "<p algin center>Dziękujemy</p>\n";
    echo "<center>Przejdź do serwisy <a href='".$base_url."'>".$nazwa_aplikacji."</a>, który powstał ".$data_powstania.".";
}

#if(isset($_GET['step'])) $step=$_GET['step'];
#if(isset($_POST['step'])) $step=$_POST['step'];
if(isset($_REQUEST['step'])) $step=$_REQUEST['step'];
else $step = 1;
?>
  <!DOCTYPE html>
      <html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE-edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Instalator</title>
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    padding-top: 40px;
                    padding-bottom: 40px;
                    background-color: #f5f5f5;
                }
            </style>
      </head>
      <body>
        <div class="container">
            <main>
                <h1 class="mb-3">Instalator :: <code>krok: <?php echo $step; ?></code></h1>
                <?php
switch($step){

case 2:
step2();
break;

case 3:
step3();
break;

case 4:
step4();
break;

case 5:
step5();
break;

case 6:
step6();
break;

case 7:
step7();
break;

// case 8:
// step8();
// break;

// case 9:
// step9();
// break;

default:
if(file_exists($config_file)){
    if(is_writable($config_file)){
        $step = 1;
        form_install_1();
    } else {
        echo "<p>Zmień uprawnienia do pliku <code>".$config_file."</code><br>np. <code>chmod o+2 ".$config_file."</code></p>";
        echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
    }
} else {
    echo "<p>Stwórz plik <code>".$config_file."</code><br>np. <code>touch ".$config_file."</code></p>";
    echo "<p><button class='btn btn-info' onClick='window.location.href=window.location.href'>Odśwież stronę</button></p>";
}
break;
}
?>
?>
            </main>
                     </div>/.container

      </body>
      </html>
install.php
16 KB