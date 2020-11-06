<?php if (!check_bitrix_sessid()) return;
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

echo \CAdminMessage::ShowNote(GetMessage('module_add_edu_infoblock_type_title'));
$arFields = [
    'ID' => $moduleId,
    'SECTIONS' => 'Y',
    'IN_RSS' => 'N',
    'SORT' => 100,
    'LANG' => [
        'en' => [
            'NAME' => GetMessage('en_edu_infoblock_type_name'),
            'SECTION_NAME' => GetMessage('en_edu_infoblock_type_sections'),
            'ELEMENT_NAME' => GetMessage('en_edu_infoblock_type_elements')
        ],
        'ru' => [
            'NAME' => GetMessage('ru_edu_infoblock_type_name'),
            'SECTION_NAME' => GetMessage('ru_edu_infoblock_type_sections'),
            'ELEMENT_NAME' => GetMessage('ru_edu_infoblock_type_elements')
        ]
    ]
];
$obBlocktype = new \CIBlockType;
$res = $obBlocktype->Add($arFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception($obBlocktype->LAST_ERROR);
}
echo \CAdminMessage::ShowNote(GetMessage('module_added_edu_infoblock_type_title'));

echo \CAdminMessage::ShowNote(GetMessage('module_add_user_field_title'));
$oUserTypeEntity = new CUserTypeEntity();
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_BEGIN_TIME'),
    GetMessage('datetime'),
    GetMessage('BEGIN_TIME'),
    GetMessage('BEGIN_TIME_RU_TITLE'),
    GetMessage('BEGIN_TIME_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_END_TIME'),
    GetMessage('datetime'),
    GetMessage('END_TIME'),
    GetMessage('END_TIME_RU_TITLE'),
    GetMessage('END_TIME_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_SITE'),
    GetMessage('string'),
    GetMessage('SITE'),
    GetMessage('SITE_RU_TITLE'),
    GetMessage('SITE_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_DOCUMENT'),
    GetMessage('file'),
    GetMessage('DOCUMENT'),
    GetMessage('DOCUMENT_RU_TITLE'),
    GetMessage('DOCUMENT_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_TIME_ADDITION'),
    GetMessage('string'),
    GetMessage('TIME_ADDITION'),
    GetMessage('TIME_ADDITION_RU_TITLE'),
    GetMessage('TIME_ADDITION_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_GENERAL_EXPERIENCE'),
    GetMessage('string'),
    GetMessage('GENERAL_EXPERIENCE'),
    GetMessage('GENERAL_EXPERIENCE_RU_TITLE'),
    GetMessage('GENERAL_EXPERIENCE_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_PROFESSION_EXPERIENCE'),
    GetMessage('string'),
    GetMessage('PROFESSION_EXPERIENCE'),
    GetMessage('PROFESSION_EXPERIENCE_RU_TITLE'),
    GetMessage('PROFESSION_EXPERIENCE_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_POSITION'),
    GetMessage('string'),
    GetMessage('POSITION'),
    GetMessage('POSITION_RU_TITLE'),
    GetMessage('POSITION_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_SUBJECT'),
    GetMessage('string'),
    GetMessage('SUBJECT'),
    GetMessage('SUBJECT_RU_TITLE'),
    GetMessage('SUBJECT_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_DEGREE'),
    GetMessage('string'),
    GetMessage('DEGREEE'),
    GetMessage('DEGREEE_RU_TITLE'),
    GetMessage('DEGREEE_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_RANK'),
    GetMessage('string'),
    GetMessage('RANK'),
    GetMessage('RANK_RU_TITLE'),
    GetMessage('RANK_EN_TITLE'));
Edu::addUserField($oUserTypeEntity,
    GetMessage('UF_ASSESSMENT'),
    GetMessage('string'),
    GetMessage('ASSESSMENT'),
    GetMessage('ASSESSMENT_RU_TITLE'),
    GetMessage('ASSESSMENT_EN_TITLE'));
echo \CAdminMessage::ShowNote(GetMessage('module_added_user_field_title'));

echo \CAdminMessage::ShowNote(GetMessage("module_add_group_title"));

$group = new \CGroup;
$id = Edu::addUserGroup($group, GetMessage('RU_FOUNDERS'), GetMessage('FOUNDERS'));
$id = Edu::addUserGroup($group, GetMessage('RU_BRANCHES'), GetMessage('BRANCHES'));
$id = Edu::addUserGroup($group, GetMessage('RU_MAIN'), GetMessage('MAIN'));
$id = Edu::addUserGroup($group, GetMessage('RU_DEPARTMENT'), GetMessage('DEPARTMENT'));
$id = Edu::addUserGroup($group, GetMessage('RU_ACADEMIC_COUNCIL'), GetMessage('ACADEMIC_COUNCIL'));
$id = Edu::addUserGroup($group, GetMessage('RU_LEADERSHIP'), GetMessage('LEADERSHIP'));
$id = Edu::addUserGroup($group, GetMessage('RU_STAFF'), GetMessage('STAFF'));
$id = Edu::addUserGroup($group, GetMessage('RU_GRADUATE'), GetMessage('GRADUATE'));
echo \CAdminMessage::ShowNote(GetMessage("module_added_group_title"));

echo \CAdminMessage::ShowNote(GetMessage('module_add_infoblock_title'));

$ib = new \CIBlock;
$documentsIblockId = Edu::addInfoblock($ib, GetMessage('DOCUMENTS_TITLE'), Edu::DOCUMENTS_INFOBLOCK_CODE, $moduleId);
$professionsIblockId = Edu::addInfoblock($ib, GetMessage('PROFESSIONS_TITLE'), Edu::PROFESSIONS_INFOBLOCK_CODE, $moduleId);
$facultiesIblockId = Edu::addInfoblock($ib, GetMessage('FACULTIES_TITLE'), Edu::FACULTIES_INFOBLOCK_CODE, $moduleId);
$subjectsIblockId = Edu::addInfoblock($ib, GetMessage('SUBJECTS_TITLE'), Edu::SUBJECTS_INFOBLOCK_CODE, $moduleId);
$departmentIblockId = Edu::addInfoblock($ib, GetMessage('DEPARTMENTS_TITLE'), Edu::DEPARTMENTS_INFOBLOCK_CODE, $moduleId);
$libraryIblockId = Edu::addInfoblock($ib, GetMessage('LIBRARY_TITLE'), Edu::LIBRARY_INFOBLOCK_CODE, $moduleId);
$newsIblockId = Edu::addInfoblock($ib, GetMessage('NEWS_TITLE'), Edu::NEWS_INFOBLOCK_CODE, $moduleId);
$advertisementIblockId = Edu::addInfoblock($ib, GetMessage('ADVERTISE_TITLE'), Edu::ADVERTISEMENT_INFOBLOCK_CODE, $moduleId);
$dormInfoblockId = Edu::addInfoblock($ib, GetMessage('DORMS_TITLE'), Edu::DORM_INFOBLOCK_CODE, $moduleId);
$creativeInfoblockId = Edu::addInfoblock($ib, GetMessage('CREATIVES_TITLE'), Edu::CREATIVE_INFOBLOCK_CODE, $moduleId);
$conferenceInfoblockId = Edu::addInfoblock($ib, GetMessage('CONFERENCES_TITLE'), Edu::CONFERENCE_INFOBLOCK_CODE, $moduleId);
$trainingMaterialsId = Edu::addInfoblock($ib, GetMessage('TRAINING_MATERIALS_TITLE'), Edu::TRAINING_MATERIALS_INFOBLOCK_CODE, $moduleId);
$reviewsInfoblockId = Edu::addInfoblock($ib, GetMessage('REVIEWS_TITLE'), Edu::REVIEWS_INFOBLOCK_CODE, $moduleId);
$trainingInfoblockId = Edu::addInfoblock($ib, GetMessage('TRAININGS_TITLE'), Edu::TRAININGS_INFOBLOCK_CODE, $moduleId);
echo \CAdminMessage::ShowNote(GetMessage('module_added_infoblock_title'));

echo \CAdminMessage::ShowNote(GetMessage('module_add_infoblock_attached_property_title'));

Edu::addUserField($oUserTypeEntity,
    'UF_PROFESSION',
    'iblock_element',
    'PROFESSION',
    GetMessage('RU_UF_PROFESSION_TITLE'),
    GetMessage('EN_UF_PROFESSION_TITLE'),
    [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $professionsIblockId
    ]
);

Edu::addUserField($oUserTypeEntity,
    'UF_DEPARTMENT',
    'iblock_element',
    'DEPARTMENT',
    GetMessage('RU_UF_DEPARTMENT_TITLE'),
    GetMessage('EN_UF_DEPARTMENT_TITLE'),
    [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $departmentIblockId
    ]
);
echo \CAdminMessage::ShowNote(GetMessage('module_added_infoblock_attached_property_title'));

echo \CAdminMessage::ShowNote(GetMessage('module_add_infoblock_property_title'));
$property = new \CIBlockProperty();
$id = Edu::addInfoblockProperty($property,
    GetMessage('FILE_TITLE'),
    Edu::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $documentsIblockId
);
$formOfEducationid = Edu::addInfoblockProperty($property,
    GetMessage('FORM_OF_EDUCATION_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PERIOD_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('ACCREDITATION_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    Edu::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE
);
$levelId = Edu::addInfoblockProperty($property,
    GetMessage('LEVEL_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('CODE_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('DESCRIPTION_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PLAN_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('ANNOTATIONS_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('SCHEDULE_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('METHODOLOGICAL_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PRACTICES_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('BUDGET_COUNT_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PAYED_COUNT_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PRICE_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PREPARATORY_PROFILE_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PRINCIPAL_SUBJECTS_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$languagesId = Edu::addInfoblockProperty($property,
    GetMessage('LANGUAGES_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('RESEARCHES_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('RESULTS_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('REPLACED_RESULTS_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$facultyId = Edu::addInfoblockProperty($property,
    GetMessage('FACULTY_TITLE'),
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    false,
    $facultiesIblockId
);
$preliminaryTestId = Edu::addInfoblockProperty($property,
    GetMessage('PRELIMINARY_TESTS_TITLE'),
    Edu::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true,
    $subjectsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('FACULTY_TITLE'),
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $departmentIblockId,
    null,
    false,
    $facultiesIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('ADDRESS_TITLE'),
    Edu::INFOBLOCK_ADDRESS_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $dormInfoblockId
);
$entityId = Edu::addInfoblockProperty($property,
    GetMessage('ENTITY_TITLE'),
    Edu::INFOBLOCK_ENTITY_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $newsIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('CREATIVE_LEADERSHIP_TITLE'),
    Edu::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('TIMETABLE_TITLE'),
    Edu::INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('TIME_TITLE'),
    Edu::INFOBLOCK_TIME_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PLACE_TITLE'),
    Edu::INFOBLOCK_PLACE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('PASS_PERIOD_TITLE'),
    Edu::INFOBLOCK_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('ORGANIZATOR_PERIOD_TITLE'),
    Edu::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('FACULTY_TITLE'),
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
    null,
    false,
    $facultiesIblockId
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('FILE_TITLE'),
    Edu::INFOBLOCK_FILE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
);
$id = Edu::addInfoblockProperty($property,
    GetMessage('USER_TITLE'),
    Edu::INFOBLOCK_USER_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $reviewsInfoblockId,
    Edu::USER_INFOBLOCK_PROPERTY_USER_TYPE
);
echo \CAdminMessage::ShowNote(GetMessage('module_added_infoblock_property_title'));

echo \CAdminMessage::ShowNote(GetMessage('module_add_infoblock_property_values_title'));
$iBPEnum = new CIBlockPropertyEnum;
Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'заочная');
Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'очная');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Бакалавриат');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Магистратура');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Специалист');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Аспирантура');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Русский');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Итальянский');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Английский');
Edu::addEnumPropertyValue($iBPEnum, $entityId, 'Студент');
Edu::addEnumPropertyValue($iBPEnum, $entityId, 'ВУЗ');
echo \CAdminMessage::ShowNote(GetMessage('module_added_infoblock_property_values_title'));
$DB->Commit();
?>