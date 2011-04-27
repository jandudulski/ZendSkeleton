<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected $_view;

    /**
     * Getter for Zend_View
     *
     * @return Zend_View
     */
    public function getView()
    {
        if (null === $this->_view) {
            $this->bootstrap('view');
            $this->_view = $this->getResource('view');
        }

        return $this->_view;
    }

    /**
     * Initialize meta tags
     */
    protected function _initHeadMeta()
    {
        $this->getView()->headMeta()
            ->setCharset('utf-8');
    }

    /**
     * Initialize link tags
     */
    protected function _initHeadLink()
    {
        $this->getView()->headLink()
            ->appendStylesheet('/stylesheets/application.css')
            ->headLink(array('rel' => 'author', 'href' => '/humans.txt', 'type' => 'text/plain'));
    }

    /**
     * Initialize script tags
     */
    protected function _initHeadScript()
    {
        $this->getView()->headScript()
            ->appendFile('/javascripts/jquery.js')
            ->appendFile('/javascripts/application.js');
    }

    /**
     * Initialize title tag
     */
    protected function _initHeadTitle()
    {
        $config = $this->getOption('resources');
        $title = isset($config['view']['title']) ? $config['view']['title'] : '';
        $separator = isset($config['view']['titleSeparator']) ? $config['view']['titleSeparator'] : ' ';
        $order = isset($config['view']['titleOrder']) ? $config['view']['titleOrder'] : 'APPEND';

        $this->getView()->headTitle($title)
            ->setSeparator($separator)
            ->setDefaultAttachOrder($order);
    }

    /**
     * Add logger to registry
     */
    protected function _initLogger()
    {
        $this->bootstrap('Log');
        Zend_Registry::set('Zend_Log', $this->getResource('Log'));
    }

    /**
     * Initialize navigation
     */
    protected function _initNavigation()
    {
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'navigation');
        Zend_Registry::set('Zend_Navigation', new Zend_Navigation($config));
    }
}

