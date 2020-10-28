<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$documentsIblockId = \CIBlock::GetList([
    'ID' => 'ASC',
    [
        'TYPE' => $moduleId,
        'CODE' => Edu::DOCUMENTS_INFOBLOCK_CODE,
    ]
])->Fetch()['ID'];

//$oUserTypeEntity = new CUserTypeEntity();
//echo \CAdminMessage::ShowNote("Удаление свойств");
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_BEGIN_TIME'
//])->Fetch()['ID']);
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_END_TIME'
//])->Fetch()['ID']);
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_SITE'
//])->Fetch()['ID']);
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_PHOTO'
//])->Fetch()['ID']);
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_DOCUMENT'
//])->Fetch()['ID']);
//$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
//    'ID' => 'ASC'
//], [
//    'ENTITY_ID' => 'USER',
//    'FIELD_NAME' => 'UF_TIME_ADDITION'
//])->Fetch()['ID']);
//echo \CAdminMessage::ShowNote("Свойства пользователя удалены");
//
//echo \CAdminMessage::ShowNote("Удаление групп пользователей");
//
//$by = 'id';
//$order = 'asc';
//$filter = [
//    'STRING_ID' => 'FOUNDERS'
//];
//if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//
//$filter = [
//    'STRING_ID' => 'BRANCHES'
//];
//if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//
//$filter = [
//    'STRING_ID' => 'MAIN'
//];
//if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//
//$filter = [
//    'STRING_ID' => 'DEPARTMENT'
//];
//if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//
//echo \CAdminMessage::ShowNote("Группы пользователя удалены");
//
//echo \CAdminMessage::ShowNote("Удаление свойств инфоблоков");
//if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
//    'ID' => 'ASC'
//], [
//    'CODE' => EDU::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
//    'IBLOCK_ID' => $documentsIblockId
//])->Fetch()['ID'])) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//echo \CAdminMessage::ShowNote("Свойства инфоблоков удалены");
//
//echo \CAdminMessage::ShowNote("Удаление инфоблоков");
//if (!\CIBlock::Delete($documentsIblockId)) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//echo \CAdminMessage::ShowNote("Инфоблоки удалены");
//
//
//echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
//if (!\CIBlockType::Delete($moduleId)) {
//    $DB->Rollback();
//    throw new \Bitrix\Main\DB\Exception('Delete error!');
//}
//echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
