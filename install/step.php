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
$id = Edu::addPropertyIB_FILE_type_F($documentsIblockId);
$formOfEducationid = Edu::addPropertyIB_FORM_OF_EDUCATION_type_L($documentsIblockId);
$id = Edu::addPropertyIB_PERIOD_type_S($professionsIblockId);
$id = Edu::addPropertyIB_ACCREDITATION_PERIOD_type_S($professionsIblockId);
$levelId = Edu::addPropertyIB_LEVEL_type_L($professionsIblockId);
$id = Edu::addPropertyIB_CODE_type_S($professionsIblockId);
$id = Edu::addPropertyIB_DESCRIPTION_type_S($professionsIblockId);
$id = Edu::addPropertyIB_PLAN_type_F($professionsIblockId);
$id = Edu::addPropertyIB_ANNOTATIONS_type_F($professionsIblockId);
$id = Edu::addPropertyIB_SCHEDULE_type_F($professionsIblockId);
$id = Edu::addPropertyIB_METHODOLOGICAL_DOCUMENTS_type_F($professionsIblockId, null, true);
$id = Edu::addPropertyIB_PRACTICES_type_F($professionsIblockId);
$id = Edu::addPropertyIB_BUDGET_COUNT_type_S($professionsIblockId);
$id = Edu::addPropertyIB_PAYED_COUNT_type_S($professionsIblockId);
$id = Edu::addPropertyIB_PRICE_type_S($professionsIblockId);
$id = Edu::addPropertyIB_PREPARATORY_PROFILE_type_S($professionsIblockId);
$id = Edu::addPropertyIB_PRINCIPAL_SUBJECTS_type_S($professionsIblockId);
$languagesId = Edu::addPropertyIB_LANGUAGES_type_L($professionsIblockId, null, true);
$id = Edu::addPropertyIB_RESEARCHES_type_F($professionsIblockId);
$id = Edu::addPropertyIB_RESULTS_type_F($professionsIblockId);
$id = Edu::addPropertyIB_REPLACED_RESULTS_type_F($professionsIblockId);
$facultyId = Edu::addPropertyIB_FACULTY_type_E($professionsIblockId, null, false, $facultiesIblockId);
$preliminaryTestId = Edu::addPropertyIB_PRELIMINARY_TESTS_type_E($professionsIblockId, null, true, $subjectsIblockId);
$id = Edu::addPropertyIB_FACULTY_type_E($departmentIblockId, null, false, $facultiesIblockId);
$id = Edu::addPropertyIB_ADDRESS_type_S($dormInfoblockId);
$entityId = Edu::addPropertyIB_ENTITY_type_L($newsIblockId);
$id = Edu::addPropertyIB_CREATIVE_LEADERSHIP_type_S($creativeInfoblockId);
$id = Edu::addPropertyIB_TIMETABLE_type_S($creativeInfoblockId);
$id = Edu::addPropertyIB_TIME_type_S($creativeInfoblockId);
$id = Edu::addPropertyIB_PLACE_type_S($creativeInfoblockId);
$id = Edu::addPropertyIB_PASS_PERIOD_type_S($creativeInfoblockId);
$id = Edu::addPropertyIB_ORGANIZATOR_PERIOD_type_S($conferenceInfoblockId);
$id = Edu::addPropertyIB_FACULTY_type_E($trainingMaterialsId, null, false, $facultiesIblockId);
$id = Edu::addPropertyIB_FILE_type_F($trainingMaterialsId);
$id = Edu::addPropertyIB_USER_type_S($reviewsInfoblockId);
$adminMessage->ShowNote(GetMessage('module_added_infoblock_property_title'));

$adminMessage->ShowNote(GetMessage('module_add_infoblock_property_values_title'));
$iBPEnum = new CIBlockPropertyEnum;
Edu::addEnumPV_EXTRAMURAL($formOfEducationid);
Edu::addEnumPV_INTERNAL($formOfEducationid);
Edu::addEnumPV_BACHELOR($levelId);
Edu::addEnumPV_MAGISTRACY($levelId);
Edu::addEnumPV_SPECIALIST($levelId);
Edu::addEnumPV_GRADUATE_SCHOOL($levelId);
Edu::addEnumPV_RUSSIAN($languagesId);
Edu::addEnumPV_ITALIAN($languagesId);
Edu::addEnumPV_ENGLISH($languagesId);
Edu::addEnumPV_STUDENT($entityId);
Edu::addEnumPV_UNIVERSITY($entityId);
$adminMessage->ShowNote(GetMessage('module_added_infoblock_property_values_title'));
$DB->Commit();
?>