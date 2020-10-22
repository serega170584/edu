<?php if(!check_bitrix_sessid()) return;?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 */
$APPLICATION->IncludeAdminFile("Удаление типа инфоблока образовательной организации", $DOCUMENT_ROOT . "/local/modules/educational_organization/install/add_infoblock_type_unstep.php");
?>
