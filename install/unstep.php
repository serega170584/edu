<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$adminMessage = new \CAdminMessage('');
$documentsIblockId = Edu::getIblockId($moduleId, Edu::DOCUMENTS_INFOBLOCK_CODE);
$professionsIblockId = Edu::getIblockId($moduleId, Edu::PROFESSIONS_INFOBLOCK_CODE);
$facultiesIblockId = Edu::getIblockId($moduleId, Edu::FACULTIES_INFOBLOCK_CODE);
$subjectsInfoblockId = Edu::getIblockId($moduleId, Edu::SUBJECTS_INFOBLOCK_CODE);
$departmentsInfoblockId = Edu::getIblockId($moduleId, Edu::DEPARTMENTS_INFOBLOCK_CODE);
$libraryInfoblockId = Edu::getIblockId($moduleId, Edu::LIBRARY_INFOBLOCK_CODE);
$newsInfoblockId = Edu::getIblockId($moduleId, Edu::NEWS_INFOBLOCK_CODE);
$advertisementInfoblockId = Edu::getIblockId($moduleId, Edu::ADVERTISEMENT_INFOBLOCK_CODE);
$dormInfoblockId = Edu::getIblockId($moduleId, Edu::DORM_INFOBLOCK_CODE);
$creativeInfoblockId = Edu::getIblockId($moduleId, Edu::CREATIVE_INFOBLOCK_CODE);
$conferenceInfoblockId = Edu::getIblockId($moduleId, Edu::CONFERENCE_INFOBLOCK_CODE);
$trainingMaterialInfoblockId = Edu::getIblockId($moduleId, Edu::TRAINING_MATERIALS_INFOBLOCK_CODE);
$reviewsInfoblockId = Edu::getIblockId($moduleId, Edu::REVIEWS_INFOBLOCK_CODE);
$trainingInfoblockId = Edu::getIblockId($moduleId, Edu::TRAININGS_INFOBLOCK_CODE);
$sliderInfoblockId = Edu::getIblockId($moduleId, Edu::SLIDER_INFOBLOCK_CODE);
$adminMessage->ShowNote(GetMessage('module_delete_infoblock_property_values_title'));
Edu::deleteInfoblockPropertyEnumValues($professionsIblockId);
Edu::deleteInfoblockPropertyEnumValues($newsInfoblockId);
$adminMessage->ShowNote(GetMessage('module_deleted_infoblock_property_values_title'));

$adminMessage->ShowNote(GetMessage('module_delete_user_field_title'));
Edu::deleteUserF_BEGIN_TIME();
Edu::deleteUserF_END_TIME();
Edu::deleteUserF_SITE();
Edu::deleteUserF_DOCUMENT();
Edu::deleteUserF_TIME_ADDITION();
Edu::deleteUserF_GENERAL_EXPERIENCE();
Edu::deleteUserF_PROFESSION_EXPERIENCE();
Edu::deleteUserF_POSITION();
Edu::deleteUserF_SUBJECT();
Edu::deleteUserF_DEGREE();
Edu::deleteUserF_RANK();
Edu::deleteUserF_ASSESSMENT();
Edu::deleteUserF_PROFESSION();
Edu::deleteUserF_DEPARTMENT();
$adminMessage->ShowNote(GetMessage('module_deleted_user_field_title'));

$adminMessage->ShowNote(GetMessage('module_delete_group_title'));
Edu::deleteUG_FOUNDERS();
Edu::deleteUG_BRANCHES();
Edu::deleteUG_MAIN();
Edu::deleteUG_DEPARTMENT();
Edu::deleteUG_ACADEMIC_COUNCIL();
Edu::deleteUG_LEADERSHIP();
Edu::deleteUG_STAFF();
Edu::deleteUG_GRADUATE();
$adminMessage->ShowNote(GetMessage('module_deleted_group_title'));

$adminMessage->ShowNote(GetMessage('module_delete_infoblock_property_title'));
Edu::deletePropertyIB_FILE($documentsIblockId);
Edu::deletePropertyIB_FORM_OF_EDUCATION($documentsIblockId);
Edu::deletePropertyIB_PERIOD($professionsIblockId);
Edu::deletePropertyIB_ACCREDITATION_PERIOD($professionsIblockId);
Edu::deletePropertyIB_LEVEL($professionsIblockId);
Edu::deletePropertyIB_CODE($professionsIblockId);
Edu::deletePropertyIB_DESCRIPTION($professionsIblockId);
Edu::deletePropertyIB_PLAN($professionsIblockId);
Edu::deletePropertyIB_ANNOTATIONS($professionsIblockId);
Edu::deletePropertyIB_SCHEDULE($professionsIblockId);
Edu::deletePropertyIB_METHODOLOGICAL_DOCUMENTS($professionsIblockId);
Edu::deletePropertyIB_PRACTICES($professionsIblockId);
Edu::deletePropertyIB_BUDGET_COUNT($professionsIblockId);
Edu::deletePropertyIB_PAYED_COUNT($professionsIblockId);
Edu::deletePropertyIB_PRICE($professionsIblockId);
Edu::deletePropertyIB_PREPARATORY_PROFILE($professionsIblockId);
Edu::deletePropertyIB_PRINCIPAL_SUBJECTS($professionsIblockId);
Edu::deletePropertyIB_LANGUAGES($professionsIblockId);
Edu::deletePropertyIB_RESEARCHES($professionsIblockId);
Edu::deletePropertyIB_RESULTS($professionsIblockId);
Edu::deletePropertyIB_REPLACED_RESULTS($professionsIblockId);
Edu::deletePropertyIB_FACULTY($professionsIblockId);
Edu::deletePropertyIB_PRELIMINARY_TESTS($professionsIblockId);
Edu::deletePropertyIB_FACULTY($departmentsInfoblockId);
Edu::deletePropertyIB_ADDRESS($dormInfoblockId);
Edu::deletePropertyIB_ENTITY($newsInfoblockId);
Edu::deletePropertyIB_CREATIVE_LEADERSHIP($creativeInfoblockId);
Edu::deletePropertyIB_TIMETABLE($creativeInfoblockId);
Edu::deletePropertyIB_TIME($creativeInfoblockId);
Edu::deletePropertyIB_PLACE($creativeInfoblockId);
Edu::deletePropertyIB_PASS_PERIOD($creativeInfoblockId);
Edu::deletePropertyIB_ORGANIZATOR_PERIOD($conferenceInfoblockId);
Edu::deletePropertyIB_FACULTY($trainingMaterialInfoblockId);
Edu::deletePropertyIB_FILE($trainingMaterialInfoblockId);
Edu::deletePropertyIB_USER($reviewsInfoblockId);
$adminMessage->ShowNote(GetMessage('module_deleted_infoblock_property_title'));

$adminMessage->ShowNote(GetMessage('module_delete_infoblock_title'));
Edu::deleteInfoblock($documentsIblockId);
Edu::deleteInfoblock($professionsIblockId);
Edu::deleteInfoblock($facultiesIblockId);
Edu::deleteInfoblock($subjectsInfoblockId);
Edu::deleteInfoblock($departmentsInfoblockId);
Edu::deleteInfoblock($libraryInfoblockId);
Edu::deleteInfoblock($newsInfoblockId);
Edu::deleteInfoblock($advertisementInfoblockId);
Edu::deleteInfoblock($dormInfoblockId);
Edu::deleteInfoblock($creativeInfoblockId);
Edu::deleteInfoblock($conferenceInfoblockId);
Edu::deleteInfoblock($trainingMaterialInfoblockId);
Edu::deleteInfoblock($reviewsInfoblockId);
Edu::deleteInfoblock($trainingInfoblockId);
Edu::deleteInfoblock($sliderInfoblockId);
$adminMessage->ShowNote(GetMessage('module_deleted_infoblock_title'));

$adminMessage->ShowNote(GetMessage('module_delete_edu_infoblock_type_title'));
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
$adminMessage->ShowNote(GetMessage('module_delete_edu_infoblock_type_title'));
$DB->Commit();
?>
