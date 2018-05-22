<?php
/**
 * @file plugins/generic/cookiesNotification/CookiesNotificationPlugin.inc.php
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class cookiesNotification
 * @ingroup plugins_generic_cookiesNotification
 *
 * @brief cookiesNotification plugin class
 */
import('lib.pkp.classes.plugins.GenericPlugin');


class CookiesNotificationPlugin extends GenericPlugin {
	/**
	 * Called as a plugin is registered to the registry
	 * @param $category String Name of category plugin was registered to
	 * @return boolean True iff plugin initialized successfully; if false,
	 * 	the plugin will not be registered.
	 */
	function register($category, $path) {
		$success = parent::register($category, $path);
		if (!Config::getVar('general', 'installed') || defined('RUNNING_UPGRADE')) return true;
		if ($success && $this->getEnabled()) {

			HookRegistry::register('Templates::Common::Footer::PageFooter', array($this, 'addCookiesNotification'));			
		}
		return $success;
	}
	/**
	 * Get the plugin display name.
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.generic.cookiesNotification.displayName');
	}
	/**
	 * Get the plugin description.
	 * @return string
	 */
	function getDescription() {
		return __('plugins.generic.cookiesNotification.description');
	}

	/**
	 * Hook callback function to insert notification footer
	 */
	function addCookiesNotification($hookName, $params) {
		$sessionManager = SessionManager::getManager();
		$session = $sessionManager->getUserSession();
		$templateMgr =& $params[1];
		$output =& $params[2];

		if (isset($_GET['acceptCookies'])) {
			$session->setSessionVar('cookiesAccepted', (int) $_GET['acceptCookies']);
		}

		if ($session->getSessionVar('cookiesAccepted') != 1 ) {
			$output .= $templateMgr->fetch($this->getTemplatePath() . 'notification.tpl');
		}

		return false;
	}
}
?>
