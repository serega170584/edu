<?php if (!check_bitrix_sessid()) return;
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$adminMessage = new \CAdminMessage('');
$adminMessage->ShowNote(GetMessage('module_add_edu_infoblock_type_title'));
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
$adminMessage->ShowNote(GetMessage('module_added_edu_infoblock_type_title'));

$adminMessage->ShowNote(GetMessage('module_add_user_field_title'));
Edu::UF_BEGIN_TIME_type_datetime();
Edu::UF_END_TIME_type_datetime();
Edu::UF_SITE_type_string();
Edu::UF_DOCUMENT_type_file();
Edu::UF_TIME_ADDITION_type_string();
Edu::UF_GENERAL_EXPERIENCE_type_string();
Edu::UF_PROFESSION_EXPERIENCE_type_string();
Edu::UF_POSITION_type_string();
Edu::UF_SUBJECT_type_string();
Edu::UF_DEGREE_type_string();
Edu::UF_RANK_type_string();
Edu::UF_ASSESSMENT_type_string();
$adminMessage->ShowNote(GetMessage('module_added_user_field_title'));

$adminMessage->ShowNote(GetMessage("module_add_group_title"));
Edu::addUG_FOUNDERS();
Edu::addUG_BRANCHES();
Edu::addUG_MAIN();
Edu::addUG_DEPARTMENT();
Edu::addUG_ACADEMIC_COUNCIL();
Edu::addUG_LEADERSHIP();
Edu::addUG_STAFF();
Edu::addUG_GRADUATE();
$adminMessage->ShowNote(GetMessage("module_added_group_title"));

$adminMessage->ShowNote(GetMessage('module_add_infoblock_title'));
$documentsIblockId = Edu::addIB_DOCUMENTS();
$professionsIblockId = Edu::addIB_PROFESSIONS();
$facultiesIblockId = Edu::addIB_FACULTIES();
$subjectsIblockId = Edu::addIB_SUBJECTS();
$departmentIblockId = Edu::addIB_DEPARTMENTS();
$libraryIblockId = Edu::addIB_LIBRARY();
$newsIblockId = Edu::addIB_NEWS();
$advertisementIblockId = Edu::addIB_ADVERTISE();
$dormInfoblockId = Edu::addIB_DORMS();
$creativeInfoblockId = Edu::addIB_CREATIVES();
$conferenceInfoblockId = Edu::addIB_CONFERENCES();
$trainingMaterialsId = Edu::addIB_TRAINING_MATERIALS();
$reviewsInfoblockId = Edu::addIB_REVIEWS();
$trainingInfoblockId = Edu::addIB_TRAININGS();
$adminMessage->ShowNote(GetMessage('module_added_infoblock_title'));

$adminMessage->ShowNote(GetMessage('module_add_infoblock_attached_property_title'));
Edu::UF_PROFESSION_type_iblock_element([
    'IBLOCK_TYPE_ID' => $moduleId,
    'IBLOCK_ID' => $professionsIblockId
]);
Edu::UF_DEPARTMENT_type_iblock_element([
    'IBLOCK_TYPE_ID' => $moduleId,
    'IBLOCK_ID' => $departmentIblockId
]);
$adminMessage->ShowNote(GetMessage('module_added_infoblock_attached_property_title'));

$adminMessage->ShowNote(GetMessage('module_add_infoblock_property_title'));
$property = new \CIBlockProperty();
$id = Edu::addPropertyIB_FILE_type_F($documentsIblockId);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('FILE_TITLE'),
//    Edu::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $documentsIblockId
//);
//$formOfEducationid = Edu::addInfoblockProperty($property,
//    GetMessage('FORM_OF_EDUCATION_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
//    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PERIOD_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('ACCREDITATION_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId,
//    Edu::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE
//);
//$levelId = Edu::addInfoblockProperty($property,
//    GetMessage('LEVEL_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
//    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('CODE_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('DESCRIPTION_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PLAN_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('ANNOTATIONS_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('SCHEDULE_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('METHODOLOGICAL_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId,
//    null,
//    true
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PRACTICES_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('BUDGET_COUNT_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PAYED_COUNT_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PRICE_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PREPARATORY_PROFILE_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PRINCIPAL_SUBJECTS_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$languagesId = Edu::addInfoblockProperty($property,
//    GetMessage('LANGUAGES_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
//    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId,
//    null,
//    true
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('RESEARCHES_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('RESULTS_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('REPLACED_RESULTS_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId
//);
//$facultyId = Edu::addInfoblockProperty($property,
//    GetMessage('FACULTY_TITLE'),
//    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
//    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId,
//    null,
//    false,
//    $facultiesIblockId
//);
//$preliminaryTestId = Edu::addInfoblockProperty($property,
//    GetMessage('PRELIMINARY_TESTS_TITLE'),
//    Edu::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
//    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
//    $professionsIblockId,
//    null,
//    true,
//    $subjectsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('FACULTY_TITLE'),
//    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
//    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
//    $departmentIblockId,
//    null,
//    false,
//    $facultiesIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('ADDRESS_TITLE'),
//    Edu::INFOBLOCK_ADDRESS_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $dormInfoblockId
//);
//$entityId = Edu::addInfoblockProperty($property,
//    GetMessage('ENTITY_TITLE'),
//    Edu::INFOBLOCK_ENTITY_PROPERTY_CODE,
//    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
//    $newsIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('CREATIVE_LEADERSHIP_TITLE'),
//    Edu::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $creativeInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('TIMETABLE_TITLE'),
//    Edu::INFOBLOCK_SCHEDULE_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $creativeInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('TIME_TITLE'),
//    Edu::INFOBLOCK_TIME_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $creativeInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PLACE_TITLE'),
//    Edu::INFOBLOCK_PLACE_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $creativeInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('PASS_PERIOD_TITLE'),
//    Edu::INFOBLOCK_PERIOD_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $conferenceInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('ORGANIZATOR_PERIOD_TITLE'),
//    Edu::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $conferenceInfoblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('FACULTY_TITLE'),
//    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
//    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
//    $trainingMaterialsId,
//    null,
//    false,
//    $facultiesIblockId
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('FILE_TITLE'),
//    Edu::INFOBLOCK_FILE_PROPERTY_CODE,
//    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
//    $trainingMaterialsId,
//);
//$id = Edu::addInfoblockProperty($property,
//    GetMessage('USER_TITLE'),
//    Edu::INFOBLOCK_USER_PROPERTY_CODE,
//    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
//    $reviewsInfoblockId,
//    Edu::USER_INFOBLOCK_PROPERTY_USER_TYPE
//);
$adminMessage->ShowNote(GetMessage('module_added_infoblock_property_title'));

$adminMessage->ShowNote(GetMessage('module_add_infoblock_property_values_title'));
//$iBPEnum = new CIBlockPropertyEnum;
//Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, GetMessage('EXTRAMURAL_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, GetMessage('INTERNAL_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $levelId, GetMessage('BACHELOR_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $levelId, GetMessage('MAGISTRACY_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $levelId, GetMessage('SPECIALIST_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $levelId, GetMessage('GRADUATE_SCHOOL_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $languagesId, GetMessage('RUSSIAN_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $languagesId, GetMessage('ITALIAN_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $languagesId, GetMessage('ENGLISH_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $entityId, GetMessage('STUDENT_TITLE'));
//Edu::addEnumPropertyValue($iBPEnum, $entityId, GetMessage('UNIVERSITY_TITLE'));
$adminMessage->ShowNote(GetMessage('module_added_infoblock_property_values_title'));
$DB->Commit();
?>