<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

class ExampleModelExample extends JModelItem
{
    protected $message;

    public function getMsg()
    {
        if (!isset($this->message))
        {
            $this->message = 'Hello World!';
        }

        return $this->message;
    }
}
