<?php
/**
 * @defgroup plugins_generic_cookiesNotification cookiesNotification Plugin
 */
 
/**
 * @file plugins/generic/cookiesNotification/index.php
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_generic_cookiesNotification
 * @brief Wrapper for cookiesNotification plugin.
 *
 */

require_once('CookiesNotificationPlugin.inc.php');
return new CookiesNotificationPlugin();

?>
