{**
 * plugins/generic/cookiesNotification/alert.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * A template to be included to the public footer
 *}

 {literal}
 <style>
  #cookiesNotification {
    position: fixed;
    bottom: 0px;
    width: 100%;
    height: 40px;
    padding: 10px;
    background-color: #ccc;
  }
  #cookiesNotificationLink {
    background-color: #333;
    display: inline-block;
    padding: 4px 12px 4px 12px;
    float: right;
    margin-right: 25px;

  }
  #cookiesNotificationLink a {
    text-decoration: none;
    text-transform: uppercase;
    color: #fff;
  }
 </style>
 {/literal}

<div id="cookiesNotification">{translate key="plugins.generic.cookiesNotification.alert"} <span id="cookiesNotificationLink"><a href="{$currentUrl|escape}?acceptCookies=1">OK</a></span></div>
