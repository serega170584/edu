<?php

/**
 * Class Edu
 */
class Edu extends CModule
{
    const DIRECTORY = 'local/modules/edu/install';
    const ID = 'edu';
    const ALL_USERS_GROUP_ID = 2;
    const READ_PERMISSION = 'R';
    const DOCUMENTS_INFOBLOCK_CODE = 'DOCUMENTS';
    const PROFESSIONS_INFOBLOCK_CODE = 'PROFESSIONS';
    const SITE_ID = 's1';
    const DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE = 'FILE';
    const PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE = 'FORM_OF_EDUCATION';
    const PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE = 'PERIOD';
    const PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE = 'ACCREDITATION_PERIOD';
    const PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE = 'LEVEL';
    const PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE = 'CODE';
    const PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE = 'DESCRIPTION';
    const PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE = 'PLAN';
    const PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE = 'ANNOTATIONS';
    const PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE = 'SCHEDULE';
    const PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE = 'METHODOLOGICAL_DOCUMENTS';
    const PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE = 'PRACTICES';
    const PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE = 'BUDGET_COUNT';
    const PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE = 'PAYED_COUNT';
    const PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE = 'LANGUAGES';
    const PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE = 'RESEARCHES';
    const PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE = 'RESULTS';
    const PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE = 'REPLACED_RESULTS';
    const FILE_INFOBLOCK_PROPERTY_TYPE = 'F';
    const STRING_INFOBLOCK_PROPERTY_TYPE = 'S';
    const LIST_INFOBLOCK_PROPERTY_TYPE = 'L';
    const DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE = 'DateTime';

    var $MODULE_ID = "edu";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function __construct()
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
        $db = CIBlockPropertyEnum::GetList([
            'ID' => 'ASC',
        ], [
            'IBLOCK_ID' => \CIBlock::GetList([
                'ID' => 'ASC'
            ], [
                'TYPE' => $moduleId,
                'CODE' => Edu::PROFESSIONS_INFOBLOCK_CODE,
            ])->Fetch()['ID']
        ]);
        while ($row = $db->Fetch()) {
            var_dump($row);
        }
        die('asd');
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