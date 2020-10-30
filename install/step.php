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
$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_BEGIN_TIME',
    'USER_TYPE_ID' => 'datetime',
    'XML_ID' => 'BEGIN_TIME',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Время начала',
        'en' => 'Begin time'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Время начала',
        'en' => 'Begin time',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Время начала',
        'en' => 'Begin time',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_END_TIME',
    'USER_TYPE_ID' => 'datetime',
    'XML_ID' => 'BEGIN_TIME',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Время окончания',
        'en' => 'End time'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Время окончания',
        'en' => 'End time',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Время окончания',
        'en' => 'End time',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_SITE',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'SITE',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Сайт',
        'en' => 'Site'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Сайт',
        'en' => 'Site',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Сайт',
        'en' => 'Site',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_DOCUMENT',
    'USER_TYPE_ID' => 'file',
    'XML_ID' => 'DOCUMENT',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Документ',
        'en' => 'Document'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Документ',
        'en' => 'Document',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Документ',
        'en' => 'Document',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_TIME_ADDITION',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'TIME_ADDITION',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Уточнение времени работы',
        'en' => 'Time addition'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Уточнение времени работы',
        'en' => 'Time addition',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Уточнение времени работы',
        'en' => 'Time addition',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_GENERAL_EXPERIENCE',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'GENERAL_EXPERIENCE',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Общий стаж работы',
        'en' => 'General experience'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Общий стаж работы',
        'en' => 'General experience',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Общий стаж работы',
        'en' => 'General experience',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_PROFESSION_EXPERIENCE',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'PROFESSION_EXPERIENCE',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Cтаж работы по специальности',
        'en' => 'Profession experience'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Cтаж работы по специальности',
        'en' => 'Profession experience',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Cтаж работы по специальности',
        'en' => 'Profession experience',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_POSITION',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'POSITION',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Должность',
        'en' => 'Position'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Должность',
        'en' => 'Position',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Должность',
        'en' => 'Position',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_SUBJECT',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'SUBJECT',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Преподаваемые дисциплины',
        'en' => 'Subject'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Преподаваемые дисциплины',
        'en' => 'Subject',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Преподаваемые дисциплины',
        'en' => 'Subject',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_DEGREE',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'DEGREEE',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Ученая степень',
        'en' => 'Degree'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Ученая степень',
        'en' => 'Degree',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Ученая степень',
        'en' => 'Degree',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_RANK',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'RANK',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Ученое звание',
        'en' => 'Rank'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Ученое звание',
        'en' => 'Rank',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Ученое звание',
        'en' => 'Rank',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_ASSESSMENT',
    'USER_TYPE_ID' => 'string',
    'XML_ID' => 'ASSESSMENT',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Данные о повышении квалификации и (или) профессиональной переподготовке',
        'en' => 'Assessment'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Данные о повышении квалификации и (или) профессиональной переподготовке',
        'en' => 'Assessment',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Данные о повышении квалификации и (или) профессиональной переподготовке',
        'en' => 'Assessment',
    ],
    'ERROR_MESSAGE' => [
        'ru' => 'Ошибка при заполнении',
        'en' => 'An error in completing',
    ],
    'HELP_MESSAGE' => [
        'ru' => '',
        'en' => '',
    ]
];
$res = $oUserTypeEntity->Add($aUserFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
}

echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$arFields = [
    "ACTIVE" => "Y",
    "C_SORT" => 100,
    "NAME" => "Учредители",
    "DESCRIPTION" => "Учредители",
    "USER_ID" => [],
    "STRING_ID" => "FOUNDERS"
];
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR) > 0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}

$arFields = [
    "ACTIVE" => "Y",
    "C_SORT" => 100,
    "NAME" => "Филиалы",
    "DESCRIPTION" => "Филиалы",
    "USER_ID" => [],
    "STRING_ID" => "BRANCHES"
];
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR) > 0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}

$arFields = [
    "ACTIVE" => "Y",
    "C_SORT" => 100,
    "NAME" => "Главный корпус",
    "DESCRIPTION" => "Главный корпус",
    "USER_ID" => [],
    "STRING_ID" => "MAIN"
];
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR) > 0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}

$arFields = [
    "ACTIVE" => "Y",
    "C_SORT" => 100,
    "NAME" => "Отдел",
    "DESCRIPTION" => "Отдел",
    "USER_ID" => [],
    "STRING_ID" => "DEPARTMENT"
];
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR) > 0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}


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
        'IBLOCK_ID' => Edu::PROFESSIONS_INFOBLOCK_CODE
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