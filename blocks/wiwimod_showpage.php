<?php
/**
 * This block displays a Wiwi page.
 *
 * Page selection is done within block administration (TODO)
 * if the reader has modification privilege, shows the "edit" button (TODO) >> see bug
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

$wikiModDir = basename(dirname(dirname(__FILE__)));
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_showpage ($options) {
	global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $myts;
	$wikiModDir = basename(dirname(dirname(__FILE__))) ;
	 
	$block = array();
	$pageObj = new wiwiRevision($options[0]);
	if ($pageObj->id == 0) {
		$block['notfound'] = true;
		$block['_MD_SWIKI_PAGENOTFOUND'] = _MB_SWIKI_PAGENOTFOUND_MSG;
	} else {
		$block['notfound'] = false;
		if (!$pageObj->canRead()) {
			$pagecontent = xoops_warning(_MD_SWIKI_NOREADACCESS_MSG);
		} else {
			// Handle pagebreaks
			$pagecontent = $pageObj->body;
			$cpages = explode ("[pagebreak]", $pagecontent);
			if (isset($_GET['wiwistartpage'])) $startpage = (int) $_GET['wiwistartpage'] ; else $startpage = 0;
			if (count($cpages) > 0) {
				include_once ICMS_ROOT_PATH . '/class/pagenav.php';
				$pagenav = new XoopsPageNav(count($cpages), 1, $startpage, 'wiwistartpage', '');
				$block['nav'] = $pagenav->RenderNav();
				$pagecontent = $cpages[$startpage];
			}
			$pagecontent = $pageObj->render($pagecontent);
		}
		$block['keyword'] = $pageObj->keyword;
		$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
		$block['title'] = $pageObj->title;
		$block['body'] = $pagecontent;
		$block['lastmodified'] = formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING);
		$block['author'] = xoops_getLinkedUnameFromId($pageObj->u_id);

		$block['mayEdit'] = $pageObj->canWrite();
		$block['EDIT'] = _EDIT;
		$block['dirname'] = $wikiModDir;
		$block['showTitle'] = isset($options[1]);
		$block['showAuthor'] = isset($options[2]);
	}
	return $block;
}

function swiki_contextshow($options) {
	global $xoopsDB, $xoopsModuleConfig, $xoopsUser, $myts;
	$wikiModDir = basename(dirname(dirname(__FILE__))) ;
	// Get content to display
	$preg_res = array();
	$sidePage = '';
	$block = array();
	if (preg_match("#\?page=([^&]+)#ie", htmlspecialchars($GLOBALS['xoopsRequestUri'], ENT_QUOTES),  $preg_res)) {
		$page = urldecode($preg_res[1]);
	} else $page=_MB_SWIKI_HOME;

	$sql = 'SELECT contextBlock FROM ' . $xoopsDB->prefix('wiki_pages') . ' WHERE keyword="' . $page . '" ORDER BY pageid DESC LIMIT 1';
	$result = $xoopsDB->query($sql);
	list($sidePage) = $xoopsDB->fetchRow($result);
	if ($sidePage != '') {
		$pageObj = new wiwiRevision($sidePage);
		if ($pageObj->id != 0) {
			if ($pageObj->canRead()) {
				$block['keyword'] = $pageObj->keyword;
				$block['encodedurl'] = $pageObj->encode($pageObj->keyword);
				$block['title'] = $pageObj->title;
				$block['body'] = $pageObj->render();
				$block['lastmodified'] = formatTimestamp(strtotime($pageObj->lastmodified), _SHORTDATESTRING);
				$block['author'] = xoops_getLinkedUnameFromId($pageObj->u_id);
				$block['mayEdit'] = $pageObj->canWrite();
				$block['EDIT'] = _EDIT;
			} else {
				$block['keyword'] = $sidePage;
				$block['title'] = '';
				$block['body'] = _MB_SWIKI_NOREADACCESS_MSG;
				$block['lastmodified'] = '';
				$block['author'] = '';
				$block['mayEdit'] = false;
				$block['EDIT'] = _EDIT;
			}
		}
		$block['dirname'] = $wikiModDir;
	}
	return $block;
}

function swiki_showpage_blockedit ($options) {
	$form = _MB_SWIKI_SHOWPAGE_DESC . "&nbsp;:&nbsp;<input type='text' name='options[0]' value='" . $options[0] . "' /><br />";
	$form .= _MB_SWIKI_SHOW_TITLE . "&nbsp;:&nbsp;<input type='checkbox' name='options[1]' value='1'" . (isset($options[1]) ? " checked='checked'" : "") . " /><br />";
	$form .= _MB_SWIKI_SHOW_AUTHOR . "&nbsp;:&nbsp;<input type='checkbox' name='options[2]' value='1'" . (isset($options[2]) ? " checked='checked'" : "") . " />";
	
	return $form;
}
