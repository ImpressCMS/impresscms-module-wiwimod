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


define('_AM_WIWI_ADMIN_TXT','Administration du module');
define('_AM_WIWI_PAGESFILTER_TXT','Afficher les pages o� ');
define('_AM_WIWI_LIKE_TXT','contient');
define('_AM_WIWI_PROFILEIS_TXT','est');
define('_AM_WIWI_ORDERBY_TXT',', class� par');
define('_AM_WIWI_LISTPAGES_RESULTS_TXT','pages trouv�es');

define('_AM_WIWI_SELECTACL_BOX','');
define('_AM_WIWI_SELECTACL_TXT','Modifiez un profil :');
define('_AM_WIWI_CREATEACL_TXT','ou cr�ez-en un nouveau :');
define('_AM_WIWI_EDITACL_TXT','Informations sur le profil');
define('_AM_WIWI_ACLHELP_TXT','
	<p>Le syst�me de contr�le d\'acc�s s\'appuie sur des "profils" nomm�s, qui �num�rent les groupes Xoops ayant le droit de lire/�diter/administrer les pages correspondantes.</p>
	<ul>
		<li>Les&nbsp�diteurs&nbsp;peuvent modifier la page affich�e, et cr�er de nouvelles pages avec le m�me profil.</li>
		<li>Les administrateurs peuvent changer le profil de la page affich�e, et lui affecter un autre profil pour lequel ils disposent �galement de droits d\'administration.</li></ul>
	<p>Le profil par d�faut des nouvelles pages est celui de la page � partir de laquelle elles ont �t� cr��es.</p>
	<p>Les profils d�terminent �galement l\'acc�s aux commentaires. Cela est utile notamment pour permettre des commentaires priv�s sur des pages publiques.</p>
	<p>Note : Les webmasters Xoops ont un acc�s complet � toutes les pages.</p>
	');
define('_AM_WIWI_DELCONFIRMTITLE_TXT','CONFIRMATION DE SUPPRESSION');
define('_AM_WIWI_DELCONFIRM_TXT','Vous allez supprimer un profil. Veuillez confirmer ce choix en cochant la case ci-contre.');
define('_AM_WIWI_DELREDIR_TXT','Choisissez un nouveau profil pour les pages actuellement li�es � celui-ci.');

define('_AM_WIWI_LISTPAGES_BTN','<< Retour � la liste de pages');
define('_AM_WIWI_CREATEACL_BTN','Nouveau');
define('_AM_WIWI_EDITACL_SAVE_BTN','Enregistrer');
define('_AM_WIWI_EDITACL_DELETE_BTN','Supprimer');
define('_AM_WIWI_EDITACL_CANCEL_BTN','Annuler');
define('_AM_WIWI_CLEANUPDB_BTN','Purger la base documentaire');


define('_AM_WIWI_ACLNAME_FLD','Nom du profil');
define('_AM_WIWI_ACLDESC_FLD','Description');
define('_AM_WIWI_READERS_FLD','Groupes "simples lecteurs"');
define('_AM_WIWI_WRITERS_FLD','Groupes "�diteurs"');
define('_AM_WIWI_ADMINISTRATORS_FLD','Groupes "administrateurs"');
define('_AM_WIWI_COMMENTS_FLD','Qui peut lire/poster des commentaires :');
define('_AM_WIWI_HISTORY_FLD','Qui peut voir l\'historique des pages :');
define('_AM_WIWI_DELREDIR_FLD','Profil de remplacement :');

define('_AM_WIWI_SELECTACL_OPT','(choisissez)');
define('_AM_WIWI_READERS_OPT','Lecteurs');
define('_AM_WIWI_WRITERS_OPT','Editeurs');
define('_AM_WIWI_ADMINISTRATORS_OPT','Administrateurs');
define('_AM_WIWI_COMMENTS_NONE_OPT','(pas de commentaires)');
define('_AM_WIWI_HISTORY_NONE_OPT','(pas d\'historique)');
define('_AM_WIWI_DELCONFIRM_OPT','OUI, je veux effacer ce profil.');

define('_AM_WIWI_LISTPAGES_ALLPAGES_OPT','toutes les pages');
define('_AM_WIWI_LISTPAGES_KEYWORD_OPT','nom');
define('_AM_WIWI_LISTPAGES_TITLE_OPT','titre');
define('_AM_WIWI_LISTPAGES_BODY_OPT','contenu');
define('_AM_WIWI_LISTPAGES_UID_OPT','dernier auteur');
define('_AM_WIWI_LISTPAGES_PARENT_OPT','parent');
define('_AM_WIWI_LISTPAGES_PRID_OPT','profil');
define('_AM_WIWI_LISTPAGES_LASTMODIFIED_OPT','modifi�e');
define('_AM_WIWI_LISTPAGES_ORDERDESC_OPT','d�croissant');
define('_AM_WIWI_LISTPAGES_ORDERASC_OPT','croissant');

define('_AM_WIWI_LISTPAGE_NAV','pages');
define('_AM_WIWI_HISTORY_NAV','historique');
define('_AM_WIWI_ACLADMIN_NAV','privil�ges (ACL)');
define("_AM_WIWI_BLOCKSNGROUPS_NAV", "blocs et groupes");

define('_AM_WIWI_NOPAGESPECIFIED_MSG','Veuillez choisir une page');
define('_AM_WIWI_CONFIRMDEL_MSG','Souhaitez-vous vraiment supprimer cette page ?');
define('_AM_WIWI_CONFIRMFIX_MSG','Souhaitez-vous vraiment effacer les r�visions ant�rieures � celle-ci ?');
define('_AM_WIWI_CONFIRMCLEAN_MSG','Souhaite-vous vraiment purger la base documentaire des anciennes r�visions ?');
define('_AM_WIWI_PRFSAVESUCCESS_MSG','Profil enregistr� avec succ�s');
define('_AM_WIWI_PRFSAVEFAILED_MSG','Echec lors de l\'enregistrement du profil');
define('_AM_WIWI_ERRDELETE_MSG','Erreur : impossible de supprimer le profil');
define('_AM_WIWI_PRFDELSUCCESS_MSG','Profile effac� de la base de donn�es.');
define('_AM_WIWI_PRFDELFAILED_MSG','Erreur lors de l\'effacement du profil.');

?>
