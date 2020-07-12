<?php

// -----------------[ File header and system resources ]------------------------
// -----------------[ Hlavicka sousobru a systemove prostredky ] ---------------

include '../../../include/cp_header.php';                                       // system header / systemova hlavicka souboru

if ( file_exists("../language/".$xoopsConfig['language']."/admin.php") )        // Check for language files / Kontrola existence jazykovych souboru
{
   include_once ("../language/".$xoopsConfig['language']."/admin.php");         // Pokud existuje, pouzije se
   include_once("../language/".$xoopsConfig['language']."/modinfo.php");        // If exist use it
}
else
{
    include_once("../language/czech/admin.php");                                // Pokud neexistuje, pouziju svuj, tady cestinu
    include_once("../language/czech/modinfo.php");                              // if don´t exist, use Czech language
}

include_once("../include/functions.inc.php");
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";

//----------------------------------------------------------------------------//

?>