<?php
/**
 * Functions for editing and displaying blocks
 *
 * @package SimplyWiki
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

/* These are here for cross-platform compatibility */
defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

global $xoopsConfig;
$wikiModDir = basename(dirname(dirname(__FILE__)));
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';
//I don't want to have this language constant in multiple files - just include the other file
if (!defined('_MD_SWIKI_ADDPAGE_BTN')) {
	if (file_exists(ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $xoopsConfig['language'] . '/main.php')) {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/' . $xoopsConfig['language'] . '/main.php';
	} else {
		include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/language/english/main.php';
	}
}
/** Displays a sorted list of pages
 *
 * @param array $options Block options -
 * - $options[0] = number of pages to return
 * - $options[1] = field criteria
 * - $options[2] = sort order
 * - $options[3] = display mode
 * - $options[4] = datetime format
 * $return array $block
 */
function swiki_listpages ($options) {
	global $xoopsDB;
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	$limit = (int) $options[0];
	$field = $sort = $display = $datetime = '';
	$field = in_array($options[1], array('createdate', 'lastmodified', 'revisions', 'lastviewed', 'views'), true) ? (string) $options[1] : '';
	$sort = in_array($options[2], array('ASC', 'DESC'), true) ? (string) $options[2] : '';
	$display = in_array($options[3], array('compact', 'light', 'full'), true) ? (string) $options[3] : '';
	$datetime = (string) htmlspecialchars(trim($options[4]));
	$block = array();
	$myts =& MyTextSanitizer::getInstance();
	$sql = 'SELECT keyword, title, ' . $field  .' as date, r.userid as u_id, prid, summary FROM ' . $xoopsDB->prefix('wiki_pages') . ' p, ' . $xoopsDB->prefix('wiki_revisions') . ' r WHERE p.pageid=r.pageid AND lastmodified=modified ORDER BY '. $field .' ' . $sort .' LIMIT ' . $limit;
	$result = $xoopsDB->query($sql);

	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while ($content = $xoopsDB->fetcharray($result)) {
		$prf->load($content['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($content['keyword']);
			$link['title'] = $content['title'];
			if ($link['title'] == "") $link['title'] = $content['keyword'];
			if ($options[1]!=='revisions' && $options[1]!=='views'){
				$link['date'] = formatTimestamp(strtotime($content['date']), $datetime !== '' ? $datetime : _SHORTDATESTRING); //
			} else {
				$link['date'] = (int) $content['date'];
			}
			$link['user'] = xoops_getLinkedUnameFromId($content['u_id']);
			$link['summary'] = $content['summary'];
			$link['display_mode'] = $display;
			$block['links'][] = $link;
		}
	}

	$block['dirname'] = $wikiModDir;
	return $block;
}

/**
 * Creates form for editing the block options
 * @param array $options Block options -
 * - $options[0] = number of pages to return
 * - $options[1] = field criteria
 * - $options[2] = sort order
 * - $options[3] = display mode
 * - $options[4] = datetime format
 * @return string $form HTML for input options on the form
 */
function swiki_listpages_blockedit ($options) {
	$form = _MB_SWIKI_NUM_DISP_DESC . "&nbsp;<input type='text' name='options[0]' value='" . $options[0] . "' /><br />";
	$form .= _MB_SWIKI_FIELD_DESC . "&nbsp;<select name='options[1]' size='1'><option value='createdate'" 
		. ($options[1]=="createdate" ? "selected='selected'>" : ">") . _MB_SWIKI_CREATE_DATE . "</option><option value='lastmodified'" 
		. ($options[1]=="lastmodified" ? "selected='selected'>" : ">") . _MB_SWIKI_MODIFIED_DATE . "</option><option value='lastviewed'" 
		. ($options[1]=="lastviewed" ? "selected='selected'>" : ">") . _MB_SWIKI_LASTVIEWED_DATE . "</option><option value='revisions'"
		. ($options[1]=="revisions" ? "selected='selected'>" : ">") . _MB_SWIKI_REVISIONS . "</option><option value='views'" 
		. ($options[1]=="views" ? "selected='selected'>" : ">") . _MB_SWIKI_VIEWS . "</option></select><br />";
	$form .= _MB_SWIKI_SORT_OPTION . "&nbsp;<select name='options[2]' size='1'><option value='ASC'" 
		. ($options[2]=="ASC" ? "selected='selected'>" : ">") . _MB_SWIKI_ASCENDING . "</option><option value='DESC'" 
		. ($options[2]=="DESC" ? "selected='selected'>" : ">") . _MB_SWIKI_DESCENDING . "</option></select><br />";
	$form .= _MB_SWIKI_DISPLAY_MODE . "&nbsp;<select name ='options[3]' size='1'><option value='compact'" 
		. ($options[3]=="compact" ? "selected='selected'>" : ">") . _MB_SWIKI_DISPLAY_COMPACT . "</option><option value='light'" 
		. ($options[3]=="light" ? "selected='selected'>" : ">") . _MB_SWIKI_DISPLAY_LIGHT . "</option><option value='full'" 
		. ($options[3]=="full" ? "selected='selected'>" : ">") . _MB_SWIKI_DISPLAY_FULL . "</option></select><br />";
	$form .= _MB_SWIKI_DATETIME_FORMAT . "&nbsp;<input type='text' name='options[4]' value='" . $options[4] . "' /><br />" ._MB_SWIKI_DATETIME_FORMAT_INFO;
	return $form;
}

/**
 * Displays a block with a quick add form for adding new pages
 * Only displays if the current user has write privileges for the wiki and can be used anywhere in your site
 * @return array $block
 */
function swiki_addpage (){
	global $xoopsUser;
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	$block = array();

	$user = $xoopsUser ? $xoopsUser : NULL;
	$writeProfiles = new WiwiProfile();
	$WritePrivileges = count($writeProfiles->getWriteProfiles($user));

	if ($WritePrivileges !== 0) {
		$block['addpage'] = _MD_SWIKI_ADDPAGE_BTN;
		$block['target'] = ICMS_URL . '/modules/' . $wikiModDir .'/index.php';
	}
	return $block;
}

/**
 * Displays a tag cloud for the wiki
 * @param array $options Block options
 * - $options[0] - number of tags to display
 * - $options[1] - time duration, in days, 0 for all the time
 * - $options[2] - max font size (px or %)
 * - $options[3] - min font size (px or %)
 * @return array
 */
function swiki_tag_block_cloud_show($options) {
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/include/functions.php';
	if (isTagModuleActivated()) {
		include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
		return tag_block_cloud_show($options, $wikiModDir);
	}
}

/**
 * Edit the options for the tag cloud
 * @param array $options Block options
 * - $options[0] - number of tags to display
 * - $options[1] - time duration, in days, 0 for all the time
 * - $options[2] - max font size (px or %)
 * - $options[3] - min font size (px or %)
 * @return string $form HTML for input options on the form
 */
function swiki_tag_block_cloud_edit($options) {
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/include/functions.php';
	if (isTagModuleActivated()) {
		include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
		return tag_block_cloud_edit($options);
	}
}

/**
 * Displays top tags for the wiki
 * @param array $options
 * - $options[0] - number of tags to display
 * - $options[1] - time duration, in days, 0 for all the time
 * - $options[2] - sort: a - alphabet; c - count; t - time
 * @return array
 */
function swiki_tag_block_top_show($options) {
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/include/functions.php';
	if (isTagModuleActivated()) {
		include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
		return tag_block_top_show($options, $wikiModDir);
	}
}

/**
 * Edit the options for the top tag block
 * @param array $options Block options
 * - $options[0] - number of tags to display
 * - $options[1] - time duration, in days, 0 for all the time
 * - $options[2] - sort: a - alphabet; c - count; t - time
 * @return string $form HTML for input options on the form
 */
function swiki_tag_block_top_edit($options) {
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/include/functions.php';
	if (isTagModuleActivated()) {
		include_once ICMS_ROOT_PATH . '/modules/tag/blocks/block.php';
		return tag_block_top_edit($options);
	}
}
