<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 */
if (!\CIBlockType::Delete('educational_organization')) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
$DB->Commit();
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации успешно удален из системы");
?>
