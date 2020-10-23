<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;
$oUserTypeEntity = new CUserTypeEntity();
echo \CAdminMessage::ShowNote("Удаление свойств: время начала работы, время окончания работы, сайт пользователя");
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_BEGIN_TIME'
])->Fetch()['ID']);
echo \CAdminMessage::ShowNote("Свойства пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
