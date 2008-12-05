<?php
// $Id$
// Module Info
//Traducci�n por debianus
// The name of this module
define('_MI_SWIKI_NAME','Wiwi');

// A brief description of this module
define('_MI_SWIKI_DESC','Un wiki <em>WYSIWYG.</em>');

// Admin menu
define('_MI_SWIKI_ADMENU1','P�ginas');
define('_MI_SWIKI_ADMENU2','Privilegios');
define('_MI_SWIKI_ADMENU3','Bloques y grupos');
define('_MI_SWIKI_ADMENU4','Acerca de...');
define('_MI_SWIKI_ADMENU5','Ayuda');

// Admin options
define('_MI_SWIKI_EDITOR','Editor de texto a usar');
define('_MI_SWIKI_EDITOR_DESC','');
define('_MI_SWIKI_DEFAULTPROFILE','Perfil inicial');
// Default profile description was added in re-release, see below
define('_MI_SWIKI_ALLOWPDF','Mostrar el icono de creaci�n de archivos PDF');
define('_MI_SWIKI_ALLOWPDF_DESC','La generaci�n de archivos PDF a partir de las p�ginas es aun experimental ...');

define('_MI_SWIKI_SHOWTITLES','Mostrar el t�tulo de las p�ginas en lugar de su nombre ?');
define('_MI_SWIKI_SHOWTITLES_DESC','(para los v�nculos autom�ticos creados con <em>CamelCase</em> en las p�ginas');

define('_MI_SWIKI_USECAMELCASE','Interpretar el <em>CamelCase</em>');
define('_MI_SWIKI_USECAMELCASE_DESC','Interpreta las palabras en <em>CamelCase</em> como v�nculos hacia otras p�ginas del wiki.<em>CamelCase</em> es la pr�ctica de escribir frases o palabras compuestas eliminando los espacios y poniendo en may�scula la primera letra de cada palabra. El nombre viene del parecido de estas may�sculas, entre las dem�s letras, con las jorobas de los camellos.');

define('_MI_SWIKI_XOOPSEDITOR','Elija un editor del paquete "XoopsEditor"');
define('_MI_SWIKI_XOOPSEDITOR_DESC','�sese cuando el editor elegido es XoopsEditor');

// Notification options
define('_MI_SWIKI_PAGENOTIFYCAT_TITLE','P�gina');
define('_MI_SWIKI_PAGENOTIFYCAT_DESC','Notificaciones que se aplican a la p�gina corriente');
define('_MI_SWIKI_PAGENOTIFY_TITLE','P�gina modificada');
define('_MI_SWIKI_PAGENOTIFY_CAPTION','Notif�queme cuando la p�gina sea modificada');
define('_MI_SWIKI_PAGENOTIFY_DESC','Recibir una notificaci�n cuando alg�n usuario modifique la p�gina actual.');
define('_MI_SWIKI_PAGENOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} - p�gina modificada (notificaci�n autom�tica)');
/* Added in version 0.83 Re-release */
define('_MI_SWIKI_GLOBALNOTIFYCAT_TITLE','Global');
define('_MI_SWIKI_GLOBALNOTIFYCAT_DESC','Notificaciones relativas a todas las p�ginas');
define('_MI_SWIKI_GLOBALNOTIFY_TITLE','P�gina actualizada');
define('_MI_SWIKI_GLOBALNOTIFY_CAPTION','Notificarme cuando cualquier p�gina es modificada');
define('_MI_SWIKI_GLOBALNOTIFY_DESC','Recibir una notificaci�n cuando cualquier usuario actualiza cualquier p�gina.');
define('_MI_SWIKI_GLOBALNOTIFY_SUBJECT','[{X_SITENAME}] {X_MODULE} notificaci�n autom�tica: p�gina actualizada');

define('_MI_SWIKI_TEMPLATE_VIEW_DESC','Ver p�gina');
define('_MI_SWIKI_TEMPLATE_EDIT_DESC','Modificar p�gina');
define('_MI_SWIKI_TEMPLATE_HISTORY_DESC','Ver historial de la p�gina');
define('_MI_SWIKI_TEMPLATE_PDF_DESC','SimplyWiki - pdf');
define('_MI_SWIKI_BLOCK_TOC_NAME','Tabla de contenido');//Wiwi TOC
define('_MI_SWIKI_BLOCK_TOC_DESC','P�ginas');//Wiwi selected entry pages
define('_MI_SWIKI_BLOCK_RECENT_NAME','P�ginas recientes');
define('_MI_SWIKI_BLOCK_RECENT_DESC','P�ginas recientemente modificadas o creadas');//wiwi recently modified
define('_MI_SWIKI_BLOCK_RELATED_NAME','Contenido extra');
define('_MI_SWIKI_BLOCK_RELATED_DESC','Bloque de contenido extra para las p�ginas');//Side block for extra content on Wiwi pages
define('_MI_SWIKI_BLOCK_SHOWPAGE_NAME','Mostrar p�gina');
define('_MI_SWIKI_BLOCK_SHOWPAGE_DESC','Mostrar una p�gina');
define('_MI_SWIKI_AUTHOR_WORD','<h4>Sobre Wiwi 0.8.3</h4><br />Wiwi es software bajo licencia GPL; visite la p�gina de Wiwi <a href="http://www.zonatim.com/modules/wiwimod?page=WiwimodHomePage" target="_blank">www.zonatim.com</a> to support or get help.<br /><br />If you\'ve just migrated from an older Wiwi version (0.7.1 or less), please click here : <input type="button" value="UPGRADE" onclick="document.location.href=\'../update.php\';"><br /><br /><a href=\'../manual.html\' target=\'_blank\'>Read the Manual</a> and <a href=\'../ReadMe.txt\' target=\'_blank\'>release notes</a> to get started.');
define('_MI_SWIKI_DEFAULTPROFILE_DESC','Default profile assigned to new pages');
if (!defined('_MI_SWIKI_HOME')){define('_MI_SWIKI_HOME','Inicio');}
?>