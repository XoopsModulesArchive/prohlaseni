<?php

function proh_search($queryarray, $andor, $limit, $offset, $userid)

{
	global $xoopsDB;
	$sql = "SELECT * FROM ".$xoopsDB->prefix('prohlaseni')."  WHERE id=1";

	if ( is_array($queryarray) && $count = count($queryarray) ) {
		$sql .= " AND ((text LIKE '%$queryarray[0]%')";
		for($i=1;$i<$count;$i++){
			$sql .= " $andor ";
			$sql .= "(text LIKE '%$queryarray[$i]%')";
		}
		$sql .= ") ";
	}
	$sql .= "ORDER BY dat DESC";
	$result = $xoopsDB->query($sql,$limit,$offset);
	$ret = array();
	$i = 0;

 	while($myrow = $xoopsDB->fetchArray($result)){
		$ret[$i]['image'] = "images/logo_m.gif";                                    // Obrazek pro stranku s vysledky
		$ret[$i]['link'] = "index.php";                                             // Kam prejit po kliknuti na vysledek?
		$ret[$i]['title'] = $myrow['header'];                                       // Text pro stranku s vysledky
		$ret[$i]['time'] = $myrow['dat'];                                           // Datum (unix stamp)
		$ret[$i]['uid'] = 1;                                                        // Kdo text vlozil? UID, cili cislo uzivatele
		$i++;
	}
	return $ret;
}
?>
