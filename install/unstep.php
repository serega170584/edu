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
    'ID' => 'ASC'
], [
    'TYPE' => $moduleId,
    'CODE' => Edu::DOCUMENTS_INFOBLOCK_CODE,
])->Fetch()['ID'];

$professionsIblockId = \CIBlock::GetList([
    'ID' => 'ASC'
], [
    'TYPE' => $moduleId,
    'CODE' => Edu::PROFESSIONS_INFOBLOCK_CODE,
])->Fetch()['ID'];

$facultiesIblockId = \CIBlock::GetList([
    'ID' => 'ASC'
], [
    'TYPE' => $moduleId,
    'CODE' => Edu::FACULTIES_INFOBLOCK_CODE,
])->Fetch()['ID'];

$subjectsInfoblockId = \CIBlock::GetList([
    'ID' => 'ASC'
], [
    'TYPE' => $moduleId,
    'CODE' => Edu::SUBJECTS_INFOBLOCK_CODE,
])->Fetch()['ID'];

echo \CAdminMessage::ShowNote("Удаление значений свойств инфоблоков");
$db = CIBlockPropertyEnum::GetList([
    'ID' => 'ASC',
], [
    'IBLOCK_ID' => $professionsIblockId
]);
while ($row = $db->Fetch()) {
    CIBlockPropertyEnum::Delete($row['ID']);
}
echo \CAdminMessage::ShowNote("Значения свойств инфоблока удалены");

$oUserTypeEntity = new CUserTypeEntity();
echo \CAdminMessage::ShowNote("Удаление свойств");
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_BEGIN_TIME'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_END_TIME'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_SITE'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_DOCUMENT'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_TIME_ADDITION'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_GENERAL_EXPERIENCE'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_PROFESSION_EXPERIENCE'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_POSITION'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_SUBJECT'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_DEGREE'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_RANK'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_ASSESSMENT'
])->Fetch()['ID']);
$oUserTypeEntity->Delete(CUserTypeEntity::GetList([
    'ID' => 'ASC'
], [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_PROFESSION'
])->Fetch()['ID']);

echo \CAdminMessage::ShowNote("Свойства пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление групп пользователей");

$by = 'id';
$order = 'asc';
$filter = [
    'STRING_ID' => 'FOUNDERS'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

$filter = [
    'STRING_ID' => 'BRANCHES'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

$filter = [
    'STRING_ID' => 'MAIN'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

$filter = [
    'STRING_ID' => 'DEPARTMENT'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

$filter = [
    'STRING_ID' => 'ACADEMIC_COUNCIL'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

echo \CAdminMessage::ShowNote("Группы пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление свойств инфоблоков");
if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    'IBLOCK_ID' => $documentsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_FACULTY_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    'IBLOCK_ID' => $professionsIblockId
])->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

echo \CAdminMessage::ShowNote("Свойства инфоблоков удалены");

echo \CAdminMessage::ShowNote("Удаление инфоблоков");
if (!\CIBlock::Delete($documentsIblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($professionsIblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($facultiesIblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($subjectsInfoblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Инфоблоки удалены");

echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
