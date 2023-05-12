<?php
include('./includes/config.inc.php');
// Írjuk ide ideiglenesen: print_r($_GET);
if (isset($_GET['oldal'])) { // ha a címlaptól eltérő oldal hivatkozására kattintunk
$oldal = $_GET['oldal'];
// Ha az $oldalak tömbben fel lett véve a $_GET['oldal'] értéke és létezik a ./templates/pages/ mappában a 
//hozzá tartozó .tpl.php fájl:
if (isset($oldalak[$oldal]) && 
file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
// $keres –be az oldalak tömb adott sorát teszi, ami szintén egy tömb.
// vagyis a $keres tömb adatával azonosítja, hogy melyik oldalt és onnan mit kell betöltenie
$keres = $oldalak[$oldal];
}
else if (isset($extrak[$oldal]) && 
file_exists("./templates/pages/{$extrak[$oldal]['fajl']}.tpl.php")) {
$keres = $extrak[$oldal];
}
else { 
// különben hiba
$keres = $hiba_oldal;
header("HTTP/1.0 404 Not Found");
}
}
// Első beolvasásnál, vagy ha később a címlap hivatkozására kattintunk:
else $keres = $oldalak['/'];
// a $keres tömböt majd később használjuk fel (templates/index.tpl.php)
include('./templates/index.tpl.php'); 
// templates/index.tpl.php végzi el a fő feladatot, az index.php-ban is lehetne
// ./ jelentése: az adott munka-mappa
?>