<?php

class educational_organization extends CModule
{
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

        $this->MODULE_NAME = "educational_organization – модуль образовательной организации";
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
        global $DOCUMENT_ROOT, $APPLICATION, $DB;
        try {
            $DB->StartTransaction();
//            $this->InstallFiles();
            RegisterModule("educational_organization");
            $APPLICATION->IncludeAdminFile("Установка модуля educational_organization", $DOCUMENT_ROOT . "/local/modules/educational_organization/install/step.php");
        } catch (\Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/local/modules/educational_organization/install/error_step.php");
        }
    }

    function DoUninstall()
    {
        /**
         * @var \CDatabase $DB
         */
        global $DOCUMENT_ROOT, $APPLICATION, $DB;
        try {
            throw new \Exception('Ошибка');
            $DB->StartTransaction();
//            $this->UnInstallFiles();
            UnRegisterModule("educational_organization");
            $APPLICATION->IncludeAdminFile("Деинсталляция модуля educational_organization", $DOCUMENT_ROOT . "/local/modules/educational_organization/install/unstep.php");
        } catch (Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/local/modules/educational_organization/install/error_unstep.php");
        }
    }
}