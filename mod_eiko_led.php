 <?php
defined('_JEXEC') or die('Illegal Access');
$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$width = $params->get('width', '100%');
$height = $params->get('height', '30px');
$first = $params->get('first', '');
$show = $params->get('show', '');
$links = $params->get('links', '');
$menuStyle = $params->get('menu_style', 'block');
$menuCount = 1;
$menuNone = $params->get('menu_none', 'No Reports Found');
$feuerwehr = $params->get('feuerwehr', 'XY');
$frontReports = getEinsatz($menuCount);
$mymenuitem = $params->get('mymenuitem', '');
require JModuleHelper::getLayoutPath('mod_eiko_led', $params->get('layout', 'default'));
function getEinsatz($count = 1)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM `#__eiko_einsatzberichte` WHERE state=1 ORDER BY date1 DESC LIMIT '.$count;
		$db->setQUery($query);
		$fpReports = $db->loadObjectList();
		return $fpReports;
	}
?>
