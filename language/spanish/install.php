<?php
/**
 * Language definitions used during installation of Wiwimod
 * 
 * @package Wiwimod
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */
 /** include the modinfo constants, so we don't have to define them again (specifically, _MI_WIWIMOD_WIWIHOME) */
 include_once 'modinfo.php';

 define('_MI_WIWIMOD_PROFILE1','Contenido p�blico');
 define('_MI_WIWIMOD_PROFILE2','Contenido p�blico');
 define('_MI_WIWIMOD_PROFILE3','Contenido privado'); 
 define('_MI_WIWIMOD_WIWIHOME_TITLE','P�?ina de inicio');

 define('_MI_WIWIMOD_WIWIHOME_TEXT',
     "<p><table border=\'0\'>
     <tbody><tr><td>
     <p>Bienvenido;<br />Esta es la p�gina predeterminada de inicio de Wiwimod. Puede modificarla como desee. Para crear nuevas p�ginas, seleccione un nombre y col�quelo dentro de par�ntesis de esta forma: ( [[ ). cuando guarda la p�gina, los par�ntesis ser�n cambiados por un enlace a su nueva p�gina.</p>
     <p>Compruebe <a href=\'manual.html\' target=_blank>el manual</a> para obtener m�s informaci�n sobre las caracer�sticas de edici�n, creaci�n o modificaci�n de p�ginas.</p></td>
     <td><img src=\'images/wiwilogo.gif\' /></td></tr></tbody></table></p>
     <p><table cellspacing=\'5\' cellpadding=\'5\' width=\'100%\' border=\'0\'>
          <tbody><tr><td bgcolor=\'#e4e4e4\'>Pages index</td>
          <td bgcolor=\'#e4e4e4\'>Recently modified pages</td></tr>
          <tr><td bgcolor=\'#f6f6f6\'>&lt;[PageIndex]&gt;</td>
          <td bgcolor=\'#f6f6f6\'>&lt;[RecentChanges]&gt;</td></tr></tbody></table>
     </p>");
?>