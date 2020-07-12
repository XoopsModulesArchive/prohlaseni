<?php

//
//----------------------------------------------------------------------------//
// Admin header.
function proh_adminmenu($currentoption="0" ) {
global $xoopsModule, $xoopsConfig;

	/* Nice buttons styles */
	echo "
    	<style type='text/css'>
    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/prohlaseni/images/bg.png') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/prohlaseni/images/left_both.png') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/prohlaseni/images/right_both.png') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";

	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = $tblColors[3] = $tblColors[4] = $tblColors[5] = $tblColors[6] = $tblColors[7] = $tblColors[8] = '';
	//$tblColors[$currentoption] = 'current';
	if($currentoption>=0) {
		$tblColors[$currentoption] = 'current';
	}

	if (file_exists(XOOPS_ROOT_PATH . '/modules/prohlaseni/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once XOOPS_ROOT_PATH. '/modules/prohlaseni/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once XOOPS_ROOT_PATH . '/modules/prohlaseni/language/czech/modinfo.php';
	}

	echo "<div id='buttontop'>";
	echo "<table border=\"0\" style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	echo "<td style=\"width: 60%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"> <a href=\"../index.php\">"._PROH_ADMIN_GOTOMO."</a>";
	echo "</td>";
	echo "<td style=\"width: 40%; font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;\"><b>" . _PROH_ADMIN_MODULEADMIN . " \"" . $xoopsModule->name() . "\"</b>  </td>";
	echo "</tr></table>";
	echo "</div>";

	echo "<div id='buttonbar'>";
	echo "<ul>";
	echo "<li id='" . $tblColors[0] . "'><a href=\"index.php\"\"><span>" . _PROH_ADMIN_INDEX . "</span></a></li>\n";
	echo "<li id='" . $tblColors[1] . "'><a href=\"index.php?op=change\"><span>" . _PROH_ADMIN_SET . "</span></a></li>\n";

	echo "</ul></div>";
	echo "<br /><br /><pre>&nbsp;</pre><pre>&nbsp;</pre>";
	
} // end function



//----------------------------------------------------------------------------//
//
function proh_adminfooter() {
global $xoopsModule;
    
    echo "<span style=\"font-size: smaller;\">";
    echo "<br />";
    echo $xoopsModule->getVar('name') . " "._PROH_ADMIN_VERSION." " . round($xoopsModule->getVar('version')/100 , 2) . ".<br />";
    echo _PROH_ADMIN_UPDATES.": <a href=\"http://www.zirafoviny.cz\" target=\"_blank\">http://www.zirafoviny.cz</a>";
    echo "</span>";
    
} // end function



?>