<?php

// -----------------[ File header and system resources ]------------------------
// -----------------[ Hlavicka sousobru a systemove prostredky ] ---------------

include 'header.php';

// -[ Request without parameter or with bad parameter ]-------------------------
// -[ Prichod na stranku bez parametru nebo se spatnym parametrem ]-------------

if (!isset($_GET["op"]) || ( isset($_GET["op"]) && ($_GET["op"]!="change"))    )
{
 global $xoopsModule;

   if (isset($_POST['form_op']))    																						// Save to database / ulozeni dat do databaze
   {
			if ($_POST["form_op"]=="change")
			{
      if (isset($_POST['form_html'])) { $html = 1; }
      else { $html = 0;}
      if (isset($_POST['form_smiley'])) { $smiley = 1; }
      else { $smiley = 0;}
      if (isset($_POST['form_xcodes'])) { $xcodes = 1; }
      else { $xcodes = 0;}
      if (isset($_POST['form_breaks'])) { $breaks = 1; }
      else { $breaks = 0;}
      if (isset($_POST['form_images'])) { $images = 1; }
      else { $images = 0;}

    	$sql = "UPDATE " . $xoopsDB -> prefix('prohlaseni') . " SET text=\"".$_POST['form_text']."\", header=\"".$_POST['form_header']."\", dat=\"".time()."\", html=\"".$html."\", smiley=\"".$smiley."\", xcodes=\"".$xcodes."\", breaks=\"".$breaks."\", images=\"".$images."\" WHERE id=1 ";
			$result = $xoopsDB -> query($sql);
				 
      if ( isset($result) && ($result==1))
      {
         redirect_header('index.php', 3, _PROH_ADMIN_AKTUAL_OK);                 // Save to database OK / Aktualizace DB dopadla dobre
      } else
      {
         redirect_header('index.php', 3, _PROH_ADMIN_AKTUAL_KO);                 // Sava to database KO / Aktualizace DB nedopadla dobre
      }
				 
				 
		 }
	}

// --[ Administration index ] --------------------------------------------------
// --[ Uvodni stranka administrace ] -------------------------------------------
	
xoops_cp_header();
proh_adminmenu(0);

// -- Zobrazeni prehledove tabulky na prvni strance administrace
   $sql = "SELECT * FROM " . $xoopsDB -> prefix('prohlaseni') . " ";
   $result = $xoopsDB -> query($sql);
   $myrow = $xoopsDB->fetchArray($result);

   $html = $myrow['html'];
   $smiley = $myrow['smiley'];
   $xcodes = $myrow['xcodes'];
   $breaks = $myrow['breaks'];
   $images = $myrow['images'];

   if ($html == 1)                                                              
   {
      $html=_PROH_ADMIN_ENABLE;
      $barva1="green";
   } else

   {
    $html=_PROH_ADMIN_DISABLE;
    $barva1="red";
   }

   if ($xcodes == 1)
   {
      $xcodes=_PROH_ADMIN_ENABLE;
      $barva2="green";
   } else

   {
    $xcodes=_PROH_ADMIN_DISABLE;
    $barva2="red";
   }

   if ($breaks == 1)
   {
      $breaks=_PROH_ADMIN_ENABLE;
      $barva3="green";
   } else

   {
    $breaks=_PROH_ADMIN_DISABLE;
    $barva3="red";
   }

   if ($smiley == 1)
   {
      $smiley=_PROH_ADMIN_ENABLE;
      $barva4="green";
   } else

   {
    $smiley=_PROH_ADMIN_DISABLE;
    $barva4="red";
   }

   if ($images == 1)
   {
      $images=_PROH_ADMIN_ENABLE;
      $barva5="green";
   } else

   {
    $images=_PROH_ADMIN_DISABLE;
    $barva5="red";
   }

   echo "<fieldset>";
   echo "<legend style=\"color: #990000; font-weight: bold;\">"._PROH_ADMIN_INFO."</legend>";
   echo _PROH_ADMIN_LEN.": <b>". strlen($myrow['text']) . "</b> znaků<br>";
   echo _PROH_ADMIN_HTML.": <span style=\"color: ".$barva1.";\"><b>". $html . "</b></span><br>";
   echo _PROH_ADMIN_XCODE.": <span style=\"color: ".$barva2.";\"><b>". $xcodes . "</b></span><br>";
   echo _PROH_ADMIN_BREAK.": <span style=\"color: ".$barva3.";\"><b>". $breaks . "</b></span><br>";
   echo _PROH_ADMIN_SMILEY.": <span style=\"color: ".$barva4.";\"><b>". $smiley . "</b></span><br>";
   echo _PROH_ADMIN_IMAGE.": <span style=\"color: ".$barva5.";\"><b>". $images . "</b></span><br>";
   echo _PROH_ADMIN_LASTCHANGE.": <b>". date( "d. n. Y" ,($myrow['dat'])) . "</b><br>";
   echo "</fieldset";

   proh_adminfooter();                                                          // Nice style footer / Moje paticka stranek
   xoops_cp_footer();   																												// System footer / Paticka stranky administrace.

}
// -----------------------------------------------------------------------------------------------------------------------

// --[ Form Change text ]-------------------------------------------------------
// --[ Zmena textu prohlaseni ]-------------------------------------------------

if (isset($_GET["op"]) && ($_GET["op"]=="change" ))
{
   global $xoopsModule;
   xoops_cp_header();
   proh_adminmenu(1);

   $sql = "SELECT * FROM " . $xoopsDB -> prefix('prohlaseni') . " ";
   $result = $xoopsDB -> query($sql);
   $myrow = $xoopsDB->fetchArray($result);

   $html = $myrow['html'];
   $smiley = $myrow['smiley'];
   $xcodes = $myrow['xcodes'];
   $breaks = $myrow['breaks'];
   $images = $myrow['images'];

// ------------- Systemovy formular

   $formular = new XoopsThemeForm(_PROH_ADMIN_FORM_HEADER, 'formular', 'index.php');
	 $formular->setExtra('enctype="multipart/form-data"');

   $options['editor'] = 'dhtmltextarea';
   $options['name'] = 'form_text';
   $options['value'] =  $myrow['text'];
   $options['rows'] = 50;
   $options['cols'] = 50;
   $options['width'] = '100%';
   $options['height'] = '400px';

   $formular->addElement(new XoopsFormText(_PROH_ADMIN_HEADER, 'form_header', 50, 255, $myrow['header']), true);
   $formular->addElement(new XoopsFormEditor(_PROH_ADMIN_TEXT, $options['name'], $options, $nohtml = false, $onfailure = 'textarea'), true);

   $options_tray = new XoopsFormElementTray(_PROH_ADMIN_VARIOUS,'<br />');      // Other parameters / Blok predvoleb vlastnosti textu

   $html_checkbox = new XoopsFormCheckBox( '', 'form_html', $html );
   $html_checkbox -> addOption( 1, _PROH_ADMIN_DOHTML );
   $options_tray -> addElement( $html_checkbox );

   $smiley_checkbox = new XoopsFormCheckBox( '', 'form_smiley', $smiley );
   $smiley_checkbox -> addOption( 1, _PROH_ADMIN_DOSMILEY );
   $options_tray -> addElement( $smiley_checkbox );

   $xcodes_checkbox = new XoopsFormCheckBox( '', 'form_xcodes', $xcodes );
   $xcodes_checkbox -> addOption( 1, _PROH_ADMIN_DOXCODE );
   $options_tray -> addElement( $xcodes_checkbox );

   $breaks_checkbox = new XoopsFormCheckBox( '', 'form_breaks', $breaks );
   $breaks_checkbox -> addOption( 1, _PROH_ADMIN_BREAKS );
   $options_tray -> addElement( $breaks_checkbox );

   $images_checkbox = new XoopsFormCheckBox( '', 'form_images', $images );
   $images_checkbox -> addOption( 1, _PROH_ADMIN_IMAGES );
   $options_tray -> addElement( $images_checkbox );

   $formular -> addElement( $options_tray );

		$formular->addElement(new XoopsFormHidden('form_op', 'change'), false);
    $formular->addElement(new XoopsFormButton('', 'save', _PROH_ADMIN_SAVE, 'submit'));

    $formular->display();

   xoops_cp_footer();                                                           // system footer / systemova paticka
}
// -----------------------------------------------------------------------------------------------------------------------


?>