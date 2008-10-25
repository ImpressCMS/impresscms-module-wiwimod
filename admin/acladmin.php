<?php
/**
 * Permissions manager for Wiwimod
 * 
 * @package Wiwimod
 * @author Xavier JIMENEZ
*
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
/** Include the administration header */   
include 'admin_header.php';
/** Include the profile class */
include '../class/wiwiProfile.class.php';
/** Include the core form class */
include_once XOOPS_ROOT_PATH.'/class/xoopsformloader.php';
$op = $prid = $newprf = $profile = null;

$allowed_get = array(
  'profile' => 'int',
  'newprf' => 'int');
$clean_GET = wiwi_cleanVars ($_GET,$allowed_get);
extract($clean_GET);

$allowed_postvars = array(
  'prid' => 'int');
if (!empty($_POST)) {
     $clean_POST = wiwi_cleanVars($_POST, $allowed_postvars);
     extract($_POST);
}

$valid_ops = array('edit', 'save', 'confirmdelete', 'delete', NULL);
if (in_array($op, $valid_ops, true)) {
switch ($op) {

case 'edit':
default:
    xoops_cp_header();
	w_adminMenu (1, _AM_WIWI_ACLADMIN_NAV);

	//--- list profiles ---
	$prf = new WiwiProfile();
	$prflst = $prf->getAllProfiles();
	$prf->load($prid);

	echo '<script>function loadPrf(ele) { ';
	echo '		var prf= ele.value;  ';
	echo '		if (prf != 0) location.href="acladmin.php?op=edit&profile="+prf;';
	echo '}</script>';
	echo '<table><tr><td>';
	echo "<table cellpadding='4' cellspacing='1'><tr><th colspan='2'>"._AM_WIWI_SELECTACL_BOX."</th></tr>";
	echo '<tr><td >'._AM_WIWI_SELECTACL_TXT.'</td>';
	echo '<td ><select name=profile onchange="loadPrf(this);">';
	echo '<option value="0">'._AM_WIWI_SELECTACL_OPT.'</option>';
	foreach ($prflst as $key=>$value) {
		echo '<option value="'.$key.($prid != $key ? '">' : '" selected>').$value.'</option>';
	}
	echo '</select></td></tr>';
	echo '<tr><td >'._AM_WIWI_CREATEACL_TXT.'</td>';
	echo '<td ><input type=button value="'._AM_WIWI_CREATEACL_BTN.'" onclick="location.href=\'acladmin.php\'"/>';
	echo '</td></tr></table><br>';

	//--- profile form ---
	$aclName = new XoopsFormText(_AM_WIWI_ACLNAME_FLD, 'prf_name', 20, 20, $prf->name);
	$aclReaders = new XoopsFormSelectGroup(_AM_WIWI_READERS_FLD, 'prf_readers', true, null, 5, true);
	$aclReaders->setValue(array_keys($prf->readers));
	$aclWriters = new XoopsFormSelectGroup(_AM_WIWI_WRITERS_FLD, 'prf_writers', true, null, 5, true);
	$aclWriters->setValue(array_keys($prf->writers));
	$aclAdministrators = new XoopsFormSelectGroup(_AM_WIWI_ADMINISTRATORS_FLD, 'prf_administrators', true, null, 5, true);
	$aclAdministrators->setValue(array_keys($prf->administrators));
	$aclComments = new XoopsFormSelect (_AM_WIWI_COMMENTS_FLD, 'prf_commentslevel', $prf->commentslevel);
	$aclComments->addOptionArray(array(0 => _AM_WIWI_COMMENTS_NONE_OPT , _WI_READ => _AM_WIWI_READERS_OPT , _WI_WRITE => _AM_WIWI_WRITERS_OPT, _WI_ADMIN => _AM_WIWI_ADMINISTRATORS_OPT));
	$aclHistory = new XoopsFormSelect (_AM_WIWI_HISTORY_FLD, 'prf_historylevel', $prf->historylevel);
	$aclHistory->addOptionArray(array(0 => _AM_WIWI_HISTORY_NONE_OPT , _WI_READ => _AM_WIWI_READERS_OPT , _WI_WRITE => _AM_WIWI_WRITERS_OPT, _WI_ADMIN => _AM_WIWI_ADMINISTRATORS_OPT));

	$aclSubmit = new XoopsFormButton('', 'savebtn', _AM_WIWI_EDITACL_SAVE_BTN, 'submit');
	if ($prid !== null) {
		$aclDelete = new XoopsFormButton('', 'delbtn', _AM_WIWI_EDITACL_DELETE_BTN, 'submit');
		$aclDelete->setExtra('onclick="document.forms.aclform.op.value=\'confirmdelete\'"');

	}
	$form = new XoopsThemeForm(_AM_WIWI_EDITACL_TXT, 'aclform', 'acladmin.php');
	$form->addElement($aclName);
	$form->addElement($aclReaders);
	$form->addElement($aclWriters);
	$form->addElement($aclAdministrators);
	$form->addElement($aclComments);
	$form->addElement($aclHistory);

	$btnTray = new XoopsFormElementTray('');
	$btnTray->addElement($aclSubmit);
	if ($prid !== null) $btnTray->addElement($aclDelete);
	$form->addElement($btnTray);
	
	$form->addElement(new XoopsFormHidden('op','save'));
	$form->addElement(new XoopsFormHidden('prid',$prid));

	$form->display();

	echo '</td><td valign="top" width="40%">'._AM_WIWI_ACLHELP_TXT.'</td></tr></table>';

	xoops_cp_footer();
	break;

case 'save' :
if ( isset($_POST) ) {
	$prf = new WiwiProfile();
	$prf->name = $prf_name;
	$prf->prid = (int) $prid;
	if (isset($prf_readers)) $prf->readers = $prf_readers; else $prf->readers = array();
	if (isset($prf_writers)) $prf->writers = $prf_writers; else $prf->writers = array();
	if (isset($prf_administrators)) $prf->administrators = $prf_administrators; else $prf->administrators = array();
	$prf->commentslevel = $prf_commentslevel;
	$prf->historylevel = $prf_historylevel;

	$success = $prf->store();
	redirect_header ('acladmin.php?op=edit&amp;profile='.$prid, 2, ($success ? _AM_WIWI_PRFSAVESUCCESS_MSG : _AM_WIWI_PRFSAVEFAILED_MSG));
	break;
	}

case 'confirmdelete' :
	if (isset($profile)) {
		$prid = (int) $profile;
	} elseif (isset($prid)) {
		$prid = (int) $prid;
	} else redirect_header ('acladmin.php', 2, _AM_WIWI_ERRDELETE_MSG);

	$prf = new WiwiProfile();
	$prf->load($prid);
	$tmplst = $prf->getAllProfiles();
	$prflst = array();
	foreach ($tmplst as $k=>$v) if ($k != $prid) $prflst[$k] = $v;

	xoops_cp_header();
	w_adminMenu (1, '_AM_WIWI_ACLADMIN_TXT');

	$aclConfirmDelete = new XoopsFormCheckBox(_AM_WIWI_ACLNAME_FLD.': '.$prf->name, 'confirmchk');
	$aclConfirmDelete->addOption(1,_AM_WIWI_DELCONFIRM_OPT);
	$aclConfirmDelete->setDescription(_AM_WIWI_DELCONFIRM_TXT);
	$aclConfirmDelete->setExtra('onclick="document.forms.aclform.delbtn.style.display=(this.checked ? \'inline\' : \'none\')"');

	$aclRedir = new XoopsFormSelect(_AM_WIWI_DELREDIR_FLD, 'newprf');
	$aclRedir->addOptionArray($prflst);
	$aclRedir->setDescription(_AM_WIWI_DELREDIR_TXT);

	$aclDelete = new XoopsFormButton('', 'delbtn', _AM_WIWI_EDITACL_DELETE_BTN, 'submit');
	$aclDelete->setExtra ('style="display:none" onclick="document.forms.aclform.op.value=\'delete\'"');
	$aclCancel = new XoopsFormButton('', 'cancelbtn', _AM_WIWI_EDITACL_CANCEL_BTN, 'submit');
	$btnTray = new XoopsFormElementTray('');
	$btnTray->addElement($aclDelete);
	$btnTray->addElement($aclCancel);

	$form = new XoopsThemeForm(_AM_WIWI_DELCONFIRM_TXT, 'aclform', 'acladmin.php');
	$form->addElement($aclConfirmDelete);
	$form->addElement($aclRedir);
	$form->addElement($btnTray);
	$form->addElement(new XoopsFormHidden('op','edit'));
	$form->addElement(new XoopsFormHidden('prid',$prid));
	$form->display();

	xoops_cp_footer();
	break;

case 'delete' :
	if (isset($profile)) {
		$prid = (int) $profile;
	} elseif (isset($prid)) {
		$prid = (int) $prid;
	} else redirect_header ('acladmin.php', 2, _AM_WIWI_ERRDELETE_MSG);

	$prf = new WiwiProfile();
	$prf->load($prid);
	$success = $prf->delete($newprf);

	redirect_header ('acladmin.php', 2, ($success ? _AM_WIWI_PRFDELSUCCESS_MSG : _AM_WIWI_PRFDELFAILED_MSG));
	break;

}
}

?>