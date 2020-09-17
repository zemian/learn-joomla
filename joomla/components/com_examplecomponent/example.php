<?php
defined('_JEXEC') or die('Restricted Access');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Ola
$controller = JControllerLegacy::getInstance('Example');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
