<?php if (!check_bitrix_sessid()) return;
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

echo \CAdminMessage::ShowNote("Добавление типа инфоблока образовательной организации");
$arFields = [
    'ID' => $moduleId,
    'SECTIONS' => 'Y',
    'IN_RSS' => 'N',
    'SORT' => 100,
    'LANG' => [
        'en' => [
            'NAME' => 'Educational organization',
            'SECTION_NAME' => 'Sections',
            'ELEMENT_NAME' => 'Elements'
        ],
        'ru' => [
            'NAME' => 'Образовательная организация',
            'SECTION_NAME' => 'Разделы',
            'ELEMENT_NAME' => 'Элементы'
        ]
    ]
];
$obBlocktype = new \CIBlockType;
$res = $obBlocktype->Add($arFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception($obBlocktype->LAST_ERROR);
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации добавлен");

echo \CAdminMessage::ShowNote("Добавление свойств");
$oUserTypeEntity = new CUserTypeEntity();
Edu::addUserField($oUserTypeEntity,
    'UF_BEGIN_TIME',
    'datetime',
    'BEGIN_TIME',
    'Время начала',
    'Begin time');
Edu::addUserField($oUserTypeEntity,
    'UF_END_TIME',
    'datetime',
    'END_TIME',
    'Время окончания',
    'End time');
Edu::addUserField($oUserTypeEntity,
    'UF_SITE',
    'string',
    'SITE',
    'Сайт',
    'Site');
Edu::addUserField($oUserTypeEntity,
    'UF_DOCUMENT',
    'file',
    'DOCUMENT',
    'Документ',
    'Document');
Edu::addUserField($oUserTypeEntity,
    'UF_TIME_ADDITION',
    'string',
    'TIME_ADDITION',
    'Уточнение времени работы',
    'Time addition');
Edu::addUserField($oUserTypeEntity,
    'UF_GENERAL_EXPERIENCE',
    'string',
    'GENERAL_EXPERIENCE',
    'Общий стаж работы',
    'General experience');
Edu::addUserField($oUserTypeEntity,
    'UF_PROFESSION_EXPERIENCE',
    'string',
    'PROFESSION_EXPERIENCE',
    'Cтаж работы по специальности',
    'Profession experience');
Edu::addUserField($oUserTypeEntity,
    'UF_POSITION',
    'string',
    'POSITION',
    'Должность',
    'Position');
Edu::addUserField($oUserTypeEntity,
    'UF_SUBJECT',
    'string',
    'SUBJECT',
    'Преподаваемые дисциплины',
    'Subject');
Edu::addUserField($oUserTypeEntity,
    'UF_DEGREE',
    'string',
    'DEGREEE',
    'Ученая степень',
    'Degree');
Edu::addUserField($oUserTypeEntity,
    'UF_RANK',
    'string',
    'RANK',
    'Ученое звание',
    'Rank');
Edu::addUserField($oUserTypeEntity,
    'UF_ASSESSMENT',
    'string',
    'ASSESSMENT',
    'Данные о повышении квалификации и (или) профессиональной переподготовке',
    'Assessment');
echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$id = Edu::addUserGroup($group, 'Учредители',  'FOUNDERS');
$id = Edu::addUserGroup($group, 'Филиалы',  'BRANCHES');
$id = Edu::addUserGroup($group, 'Главный корпус',  'MAIN');
$id = Edu::addUserGroup($group, 'Отдел',  'DEPARTMENT');
$id = Edu::addUserGroup($group, 'Ученый совет',  'ACADEMIC_COUNCIL');
$id = Edu::addUserGroup($group, 'Руководство',  'LEADERSHIP');
$id = Edu::addUserGroup($group, 'Сотрудник',  'STAFF');
echo \CAdminMessage::ShowNote("Группы пользователей добавлены");

echo \CAdminMessage::ShowNote("Добавление инфомационных блоков");

$ib = new \CIBlock;
$arFields = [
    "NAME" => 'Документы',
    "CODE" => Edu::DOCUMENTS_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$documentsIblockId = $ib->Add($arFields);
if (!($documentsIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Специальности',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$professionsIblockId = $ib->Add($arFields);
if (!($professionsIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Факультеты',
    "CODE" => Edu::FACULTIES_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$facultiesIblockId = $ib->Add($arFields);
if (!($facultiesIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Предметы',
    "CODE" => Edu::SUBJECTS_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$subjectsIblockId = $ib->Add($arFields);
if (!($subjectsIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Кафедры',
    "CODE" => Edu::DEPARTMENTS_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$departmentIblockId = $ib->Add($arFields);
if (!($departmentIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Библиотека',
    "CODE" => Edu::LIBRARY_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$libraryIblockId = $ib->Add($arFields);
if (!($libraryIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Новости',
    "CODE" => Edu::NEWS_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$newsIblockId = $ib->Add($arFields);
if (!($newsIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

$arFields = [
    "NAME" => 'Объявления',
    "CODE" => Edu::ADVERTISEMENT_INFOBLOCK_CODE,
    "LIST_PAGE_URL" => '',
    "DETAIL_PAGE_URL" => '',
    "IBLOCK_TYPE_ID" => $moduleId,
    "SITE_ID" => [Edu::SITE_ID],
    'LID' => Edu::SITE_ID,
    "GROUP_ID" => [Edu::ALL_USERS_GROUP_ID => Edu::READ_PERMISSION]
];
$advertisementIblockId = $ib->Add($arFields);
if (!($advertisementIblockId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
}

echo \CAdminMessage::ShowNote("Информационные блоки добавлены");

echo \CAdminMessage::ShowNote("Добавление пользовательских свойств-привязок к элементам инфомационных блоков");

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_PROFESSION',
    'USER_TYPE_ID' => 'iblock_element',
    'XML_ID' => 'PROFESSION',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Наименование направления подготовки и (или) специальности',
        'en' => 'Profession'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Наименование направления подготовки и (или) специальности',
        'en' => 'Profession',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Наименование направления подготовки и (или) специальности',
        'en' => 'Profession',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ],
    'SETTINGS' => [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $professionsIblockId
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_DEPARTMENT',
    'USER_TYPE_ID' => 'iblock_element',
    'XML_ID' => 'DEPARTMENT',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Кафедра',
        'en' => 'Department'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Кафедра',
        'en' => 'Department',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Кафедра',
        'en' => 'Department',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ],
    'SETTINGS' => [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $departmentIblockId
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

echo \CAdminMessage::ShowNote("Пользовательские свойства-привязки к элементам информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление свойств инфомационных блоков");
$property = new \CIBlockProperty();
$arFields = [
    "NAME" => 'Файл',
    "CODE" => Edu::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $documentsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Форма обучения',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$formOfEducationid = $property->Add($arFields);
if (!($formOfEducationid > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Сроки обучения',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Срок гос. аккредитации',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    'USER_TYPE' => Edu::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Уровень образования',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$levelId = $property->Add($arFields);
if (!($levelId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Код специальности, направления подготовки',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Описание образовательной программы',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Учебный план',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Аннотации к рабочим программам дисциплин',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Календарный учебный график',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Методические и иные документы',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
    'MULTIPLE' => 'Y'
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Практики',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Численность лиц, обучающихся за счет бюджета',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Численность лиц, находящихся на платном обучении',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Стоимость платных мест',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Профили подготовки',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Ключевые дисциплины',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Языки, на которых происходит обучение',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
    'MULTIPLE' => 'Y'
];
$languagesId = $property->Add($arFields);
if (!($languagesId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Научно-исследовательская работа',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Сведения о результатах приема',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Результаты перевода и отчисления',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}
$arFields = [
    "NAME" => 'Факультет',
    "CODE" => Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
    "LINK_IBLOCK_ID" => $facultiesIblockId
];
$facultyId = $property->Add($arFields);
if (!($facultyId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}
$arFields = [
    "NAME" => 'Вступительные испытания',
    "CODE" => Edu::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $professionsIblockId,
    'MULTIPLE' => 'Y',
    "LINK_IBLOCK_ID" => $subjectsIblockId
];
$preliminaryTestId = $property->Add($arFields);
if (!($preliminaryTestId > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

$arFields = [
    "NAME" => 'Факультет',
    "CODE" => Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    "PROPERTY_TYPE" => Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    "IBLOCK_ID" => $departmentIblockId,
    "LINK_IBLOCK_ID" => $facultiesIblockId
];
$id = $property->Add($arFields);
if (!($id > 0)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
}

echo \CAdminMessage::ShowNote("Свойства информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление значений свойств инфомационных блоков");
$iBPEnum = new CIBlockPropertyEnum;
if (!($iBPEnum->Add(array('PROPERTY_ID' => $formOfEducationid, 'VALUE' => 'заочная')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $formOfEducationid, 'VALUE' => 'очная')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $levelId, 'VALUE' => 'Бакалавриат')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $levelId, 'VALUE' => 'Магистратура')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $levelId, 'VALUE' => 'Специалист')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $levelId, 'VALUE' => 'Аспирантура')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $languagesId, 'VALUE' => 'Русский')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $languagesId, 'VALUE' => 'Итальянский')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
if (!($iBPEnum->Add(array('PROPERTY_ID' => $languagesId, 'VALUE' => 'Английский')))) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
}
echo \CAdminMessage::ShowNote("Значения свойств информационных блоков добавлены");
$DB->Commit();
?>