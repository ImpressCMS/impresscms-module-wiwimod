<?php
/**
 * Add comments for a page
 * 
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
/** Be sure to add mainfile from the root */
include '../../mainfile.php';
$com_itemid = isset($_REQUEST['com_itemid']) ? (int) $_REQUEST['com_itemid'] : 0;
if ($com_itemid > 0) {
	// Get wiwi title
	$sql = 'SELECT title FROM ' . $xoopsDB->prefix('wiki_pages') . ' WHERE id=' . $com_itemid . '';
	$result = $xoopsDB->query($sql);
	$row = $xoopsDB->fetchArray($result);
    $com_replytitle = $row['title'];
    include ICMS_ROOT_PATH . '/include/comment_new.php';
}
