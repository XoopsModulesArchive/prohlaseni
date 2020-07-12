<?php
$modversion['name']                          = _PROH_MODULE_NAME;
$modversion['version']                       = 2.52;
$modversion['description']                   = _PROH_MODULE_DESC;
$modversion['author']                        = "Sasa Svobodova (Zirafka)";
$modversion['credits']                       = "www.zirafoviny.cz";
$modversion['help']                          = "no";
$modversion['license']                       = "GNU GPL";
$modversion['official']                      = "no";
$modversion['image']                         = "images/logo.gif";
$modversion['dirname']                       = "prohlaseni";

// Mainmenu
$modversion['hasMain']                       = 1;

// Administration
$modversion['hasAdmin']                      = 1;
$modversion['adminindex']                    = "admin/index.php";
$modversion['adminmenu']                     = "admin/menu.php";

// Database
$modversion['sqlfile']['mysql']              = "sql/mysql.sql";
$modversion['tables'][0]                     = "prohlaseni";

// Xoops Templates
$modversion['templates'][1]['file']          = 'proh_index.html';
$modversion['templates'][1]['description']   = 'Templet for Statement module';

// XOOPS Search
$modversion['hasSearch']                     = 1;
$modversion['search']['file']                = "include/search.inc.php";
$modversion['search']['func']                = "proh_search";

// Xoops Notification

$modversion['hasNotification']               = 0;

?>