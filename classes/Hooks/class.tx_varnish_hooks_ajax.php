<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012  Andri Steiner  <support@snowflake.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * This class contains required hooks which are called by TYPO3
 *
 * @author	Andri Steiner  <support@snowflake.ch>
 * @package	TYPO3
 * @subpackage	tx_varnish
 */

class tx_varnish_hooks_ajax {


	/**
	 * Ban all pages from varnish cache.
	 */
	public function banAll() {
		# log command
		if (is_object($GLOBALS['BE_USER'])) {
			$GLOBALS['BE_USER']->writelog(3, 1, 0, 0, 'User %s has cleared the Varnish cache', array($GLOBALS['BE_USER']->user['username']));
		}

		# issue command
		$varnishController = t3lib_div::makeInstance('tx_varnish_controller');
		$varnishController->clearCache('all');
	}

}

global $TYPO3_CONF_VARS;
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/varnish/classes/Hooks/class.tx_varnish_hooks_ajax.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/varnish/classes/Hooks/class.tx_varnish_hooks_ajax.php']);
}
?>
