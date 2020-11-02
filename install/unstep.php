<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$documentsIblockId = Edu::getIblockId($moduleId, Edu::DOCUMENTS_INFOBLOCK_CODE);
$professionsIblockId = Edu::getIblockId($moduleId, Edu::PROFESSIONS_INFOBLOCK_CODE);
$facultiesIblockId = Edu::getIblockId($moduleId, Edu::FACULTIES_INFOBLOCK_CODE);
$subjectsInfoblockId = Edu::getIblockId($moduleId, Edu::SUBJECTS_INFOBLOCK_CODE);
$departmentsInfoblockId = Edu::getIblockId($moduleId, Edu::DEPARTMENTS_INFOBLOCK_CODE);
$libraryInfoblockId = Edu::getIblockId($moduleId, Edu::LIBRARY_INFOBLOCK_CODE);
$newsInfoblockId = Edu::getIblockId($moduleId, Edu::NEWS_INFOBLOCK_CODE);
$advertisementInfoblockId = Edu::getIblockId($moduleId, Edu::ADVERTISEMENT_INFOBLOCK_CODE);

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
Edu::deleteUserField($oUserTypeEntity, 'UF_BEGIN_TIME');
Edu::deleteUserField($oUserTypeEntity, 'UF_END_TIME');
Edu::deleteUserField($oUserTypeEntity, 'UF_SITE');
Edu::deleteUserField($oUserTypeEntity, 'UF_DOCUMENT');
Edu::deleteUserField($oUserTypeEntity, 'UF_TIME_ADDITION');
Edu::deleteUserField($oUserTypeEntity, 'UF_GENERAL_EXPERIENCE');
Edu::deleteUserField($oUserTypeEntity, 'UF_PROFESSION_EXPERIENCE');
Edu::deleteUserField($oUserTypeEntity, 'UF_POSITION');
Edu::deleteUserField($oUserTypeEntity, 'UF_SUBJECT');
Edu::deleteUserField($oUserTypeEntity, 'UF_DEGREE');
Edu::deleteUserField($oUserTypeEntity, 'UF_RANK');
Edu::deleteUserField($oUserTypeEntity, 'UF_RANK');
Edu::deleteUserField($oUserTypeEntity, 'UF_ASSESSMENT');
Edu::deleteUserField($oUserTypeEntity, 'UF_PROFESSION');
Edu::deleteUserField($oUserTypeEntity, 'UF_DEPARTMENT');
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

$filter = [
    'STRING_ID' => 'LEADERSHIP'
];
if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}

$filter = [
    'STRING_ID' => 'STAFF'
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
    'CODE' => EDU::INFOBLOCK_FACULTY_PROPERTY_CODE,
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

if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
    'ID' => 'ASC'
], [
    'CODE' => EDU::INFOBLOCK_FACULTY_PROPERTY_CODE,
    'IBLOCK_ID' => $departmentsInfoblockId
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
if (!\CIBlock::Delete($departmentsInfoblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($libraryInfoblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($newsInfoblockId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
if (!\CIBlock::Delete($advertisementInfoblockId)) {
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
