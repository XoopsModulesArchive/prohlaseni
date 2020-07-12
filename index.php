<?php
// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------------------------------------------------

require_once("../../mainfile.php");																							// vlozeni systemovych promenych
global $xoopsTpl;
$xoopsOption['template_main'] = 'proh_index.html'; 	     												// vlozeni hlavni sablony, toto MUSI byt vlozeno pred HEADERem!!!!
include(XOOPS_ROOT_PATH."/header.php");               													// vlozeni hlavicky stránky

$myts =& MyTextSanitizer::getInstance();    																		// Aktivace SANITIZERU, cili fungovani XoopsKodu a podobne

// -----------------[ Vlastni vykonny kod modulu ] -----------------------------------------------------------------------

	$sql = "SELECT * FROM " . $xoopsDB -> prefix('prohlaseni') . " WHERE id=1";   // Z DB vyctu nadpis
  $result = $xoopsDB -> query($sql);
  $myrow = $xoopsDB->fetchArray($result);
  $html = $myrow['html'];
  $smiley = $myrow['smiley'];
  $xcodes = $myrow['xcodes'];
  $breaks = $myrow['breaks'];
  $images = $myrow['images'];

  $text = $myts->displayTarea($myrow['text'], $html, $smiley, $xcodes, $images, $breaks);

  $xoopsTpl->assign('p_header', nl2br($myrow['header']));										// Zobrazeni nadpisu

	$xoopsTpl->assign('p_text', $text);																				// Zobrazeni textu

			 			$hodina = date("H",$myrow['dat']);      // vypsani casu zaznamu
						if ( ($hodina == 2) || ($hodina == 3) || ($hodina == 4) || ($hodina == 12) || ($hodina == 13) || ($hodina == 14) || ($hodina == 20) ||($hodina == 21) ||($hodina == 22) || ($hodina == 23) )
						{
			  		 	 $predlozka=_PROH_IN1;
					  }
						else
						{
		   		 	 		$predlozka=_PROH_IN2;
						}

	$xoopsTpl->assign('p_footer', _PROH_LASTCHANGE." ". date("j.n.Y",$myrow['dat'])." ".$predlozka." ".date("H:i",$myrow['dat'])."." );						// Zobrazeni paticky

	if ( is_object($xoopsUser) && $xoopsUser->isAdmin())
	{
	$xoopsTpl->assign('p_admin', "<a href='./admin/index.php'>"._PROH_ADMINISTRATION."</a>");// Pokud jsem ADMIN, tak zobrazim odkaz
	}

// ----------------- [ Vlozeni paticky stranky ] ----------------------------------------------------------------------------
include(XOOPS_ROOT_PATH."/footer.php");             		// vlozeni paticky stranky
?>