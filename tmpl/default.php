<?php

defined('_JEXEC') or die('Illegal Access');

$url = JUri::base(true);

JHTML::_('stylesheet', 'reports.css', $url.'modules/'.$module->module.'/assets/');


$outData = '';

$link = $links;

if ($show !=0) {
	
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
					$query
						->select('*')
						->from('`#__eiko_einsatzarten`')
						->where('id = "' .$frontReports[0]->data1.'"  AND state = "1" ');
					$db->setQuery($query);
					$data1 = $db->loadObject();

$outData = 'letzter Einsatz der '.$feuerwehr.' >'.$data1->title.'<   '.$frontReports[0]->summary.' in '.$frontReports[0]->address.'  am '.date('d.m.Y', strtotime($frontReports[0]->date1)).' um'.date(' H:i', strtotime($frontReports[0]->date1)).' Uhr';

$link = JRoute::_('index.php?option=com_einsatzkomponente&Itemid='.$mymenuitem.'&view=einsatzbericht&id=' . (int)$frontReports[0]->id); 

}

//print_r ($frontReports);





?>





 <tr align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="<?php echo $width; ?>" height="<?php echo $height; ?>" align="middle">

<param name="movie" value="<?php echo $url; ?>/modules/mod_eiko_led/assets/led.swf" />

<param name="quality" value="low" />

<param name="menu" value="false" />

<param name="allowScriptAccess" value="always" />

<PARAM NAME=FlashVars VALUE="txt=<?php echo $first.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$outData; ?>&lin=<?php echo $link;?>"> 



<embed src="<?php echo $url; ?>/modules/mod_eiko_led/assets/led.swf" FlashVars="txt=<?php echo $first.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$outData; ?>&lin=<?php echo $link;?>" quality="low" menu="false" width="<?php echo $width; ?>" height="<?php echo $height; ?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always">

</embed>

</object></tr>



<?PHP 





?>

