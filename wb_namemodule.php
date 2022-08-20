<?php
/**
* Prestashop module created by WBShop.pl
*
* @author    WBShop.pl <bok@wbshop.pl>
* @copyright 2022 WBShop.pl
* @license   This module is not free software and you can't resell and redistribute it!
* @link      https://wbshop.pl
*
*
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Wb_Namemodule extends Module 
{

    public function __construct()
    {
        $this->name = 'wb_namemodule';
        $this->author = 'WBShop.pl';
        $this->version = '1.0.0';
        $this->tab = 'front_office_features';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Title of module (ex. Show category on homepage)');
        $this->description = $this->l('Description - briefly describe what the module is for (ex. Template with category banners on homepage only.');

        $this->ps_versions_compliancy = ['min' => '1.7.4.0', 'max' => _PS_VERSION_];

    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayHome');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHome() {
        return $this->display(__FILE__, 'displayHome.tpl');
    }


}
