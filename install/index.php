<?php

class educational_organization extends CModule
{
    const DIRECTORY = 'local/modules/educational_organization/install';
    const ID = 'educational_organization';

    var $MODULE_ID = "educational_organization";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function educational_organization()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path . "/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = self::ID . " – модуль образовательной организации";
        $this->MODULE_DESCRIPTION = "После установки вы сможете пользоваться модулем образовательной организации";

        \CModule::IncludeModule('iblock');
    }

    function InstallFiles()
    {
        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }

    function DoInstall()
    {
        /**
         * \CDatabase $DB
         */
        global $DOCUMENT_ROOT, $APPLICATION, $DB, $moduleId;
        try {
            $DB->StartTransaction();
            RegisterModule(self::ID);
            $moduleId = self::ID;
            $APPLICATION->IncludeAdminFile("Установка модуля " . self::ID, $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/step.php");
        } catch (\Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/error_step.php");
        }
    }

    function DoUninstall()
    {
        /**
         * @var \CDatabase $DB
         */
        global $DOCUMENT_ROOT, $APPLICATION, $DB, $moduleId;
        try {
            $DB->StartTransaction();
            UnRegisterModule(self::ID);
            $moduleId = self::ID;
            $APPLICATION->IncludeAdminFile("Деинсталляция модуля " . self::ID, $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/unstep.php");
        } catch (Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/error_unstep.php");
        }
    }
}