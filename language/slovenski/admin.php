<?php
/*
 * Module and admin language definition
 * 
 *	_BTN	: text within buttons or action links
 *  _COL	: column headers
 *  _TXT	: "verbose" text (probably within content)
 *  _FLD	: title of form elements
 *  _DESC	: description under the title for form elements
 *  _MSG	: messages, alerts ...
 *
 */


define('_AM_WIWI_ADMIN_TXT','Skrbni�tvo Modula');
define('_AM_WIWI_PAGESFILTER_TXT','Poka�i strani katerih');
define('_AM_WIWI_LIKE_TXT','vsebina');
define('_AM_WIWI_PROFILEIS_TXT','je');
define('_AM_WIWI_ORDERBY_TXT',', razvr��eno po');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','rezultati');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','spremeni profil :');
define('_AM_WIWI_CREATEACL_TXT','Ali ustvari novega:');
define('_AM_WIWI_EDITACL_TXT',' Info Profila');
define('_AM_WIWI_ACLHELP_TXT','
	<p>Wiwi privilegiji so nastavitve privilegijev, ki dolo�ajo katere xoops skupine imajo bralni/pisalni/skrbni�k dostop do dolo�enih strani.</p>
	<ul>
		<li>Pisatelji&nbsp;lahko spremenijo trenutno stran in naredijo nove strani znotraj istega profilu.</li>
		<li>Skrbniki&nbsp;lahko spremenijo profil do katerega imajo skrbni�ki dostop.</li></ul>
	<p>Nove privzete strani do njenih nadrejenih profilov.</p>
	<p>Profil tudi dolo�a kdo lahko bere/objavlja komentarje. To je uporabno za ker lahko dovolite privatne komentarje na javnih straneh ...</p>
	<p>Opomba : Xoops skrbnik ima vedno polne privilegije do Wiwi strani.</p>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','IZBRI�ITE POTRDITEV PROFILA');
define('_AM_WIWI_DELCONFIRM_TXT','Ste tik pred tem, da izbri�ete profil. Potrdite z ozna�itvijo potrditvenega okenca.');
define('_AM_WIWI_DELREDIR_TXT','Izberite nov profil za strani, ki ste jih pripeli na to.');

define('_AM_WIWI_LISTPAGES_BTN','<< Nazaj na seznam strani');
define('_AM_WIWI_CREATEACL_BTN','Nova');
define('_AM_WIWI_EDITACL_SAVE_BTN','Shrani');
define('_AM_WIWI_EDITACL_DELETE_BTN','Izbri�i');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Prekli�i');
define('_AM_WIWI_CLEANUPDB_BTN','Po�isti podatkovno bazo');


define('_AM_WIWI_ACLNAME_FLD','Ime Profila');
define('_AM_WIWI_ACLDESC_FLD','Opis Profila');
define('_AM_WIWI_READERS_FLD','Skupine z dovoljenjem branja');
define('_AM_WIWI_WRITERS_FLD','Skupine z dovoljenjem pisanja');
define('_AM_WIWI_ADMINISTRATORS_FLD','Skupine z skrbni�kim statusom');
define('_AM_WIWI_COMMENTS_FLD','Kdo lahko bere/objavlja komentarje :');
define('_AM_WIWI_HISTORY_FLD','Kdo lahko dostopa do zgodovine strani :');
define('_AM_WIWI_DELREDIR_FLD','Nadomestni Profil :');

define('_AM_WIWI_SELECTACL_OPT','(izberite)');
define('_AM_WIWI_READERS_OPT','Bralci');
define('_AM_WIWI_WRITERS_OPT','Pisalci');
define('_AM_WIWI_ADMINISTRATORS_OPT','Skrbniki');
define('_AM_WIWI_COMMENTS_NONE_OPT','(brez komentarjev)');
define('_AM_WIWI_HISTORY_NONE_OPT','(ni zgodovine)');
define('_AM_WIWI_DELCONFIRM_OPT','Ja, �elim izbrisati ta profil.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','vse strani');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','ime');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','naslov');
define('_AM_WIWI_LISTPAGES_BODY_OPT','vsebina');
define('_AM_WIWI_LISTPAGES_UID_OPT','zadnji autor');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','nadrejen-a');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profil');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','zadnje spremenjen-a');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','padajo�e');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','nara��ajo�e');

define('_AM_WIWI_LISTPAGE_NAV','brskaj po straneh');
define('_AM_WIWI_HISTORY_NAV','zgodovina');
define('_AM_WIWI_ACLADMIN_NAV','privilegiji (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "bloki in skupine");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Prosim izberite stran');
define('_AM_WIWI_CONFIRMDEL_MSG','Ste prepri�ani v izbris te strani');
define('_AM_WIWI_CONFIRMFIX_MSG','Ste prepri�ani, da �elite popraviti to stran');
define('_AM_WIWI_CONFIRMCLEAN_MSG','Ali ste prepri�ani v o�i��enje podatkovne baze');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Profil uspe�no shranjen v podatkovno bazo');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Med shranjevanjem profila je pri�lo do napake. Podatkovna baza NI POSODOBLJENA');
define('_AM_WIWI_ERRDELETE_MSG','Napaka : ne morem izbrisati profila');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Profil izbrisan iz podatkovne baze.');
define('_AM_WIWI_PRFDELFAILED_MSG','Pri brisanju profila je pri�lo do napake. Podatkovna baza NI POSODOBLJENA');




?>
