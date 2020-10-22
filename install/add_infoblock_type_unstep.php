<?php
/**
 * @var \CDatabase $DB
 */
if (!\CIBlockType::Delete('educational_organization')) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
$DB->Commit();
echo \CAdminMessage::ShowNote("Модуль успешно удален из системы");