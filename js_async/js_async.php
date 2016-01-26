<?php

defined('_JEXEC') or die;

class plgSystemJs_async extends JPlugin
{
    public function onBeforeCompileHead() {
        $app = JFactory::getApplication();
        /* does not run on administrator panel to prevent users from locking themselves out */
        if(!$app->isAdmin()) {
            $files = explode(',', $this->params->get('file_names'));
            $document = JFactory::getDocument();
            if ($this->params->get('file_names')) {
                foreach ($document->_scripts as $url => $values) {
                    foreach ($files as $keyword) {
                        if (strpos($url, $keyword) !== false) {
                            $document->_scripts[$url]['async'] = 'async';
                        }
                    }
                }
            }
        }
    }
}
