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
    'FIELD_NAME' => 'UF_PHOTO',
    'USER_TYPE_ID' => 'file',
    'XML_ID' => 'PHOTO',
    'SORT' => 500,
    'MULTIPLE' => 'N',
    'MANDATORY' => 'N',
    'SHOW_FILTER' => 'N',
    'SHOW_IN_LIST' => '',
    'EDIT_IN_LIST' => '',
    'IS_SEARCHABLE' => 'N',
    'EDIT_FORM_LABEL' => [
        'ru' => 'Фотография',
        'en' => 'Photography'
    ],
    'LIST_COLUMN_LABEL' => [
        'ru' => 'Фотография',
        'en' => 'Photography',
    ],
    'LIST_FILTER_LABEL' => [
        'ru' => 'Фотография',
        'en' => 'Photography',
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

echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$arFields = Array(
    "ACTIVE"       => "Y",
    "C_SORT"       => 100,
    "NAME"         => "Учредители",
    "DESCRIPTION"  => "Учредители",
    "USER_ID"      => [],
    "STRING_ID"      => "FOUNDERS"
);
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR)>0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}

$group = new \CGroup;
$arFields = Array(
    "ACTIVE"       => "Y",
    "C_SORT"       => 100,
    "NAME"         => "Филиалы",
    "DESCRIPTION"  => "Филиалы",
    "USER_ID"      => [],
    "STRING_ID"      => "BRANCHES"
);
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR)>0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}

$group = new \CGroup;
$arFields = Array(
    "ACTIVE"       => "Y",
    "C_SORT"       => 100,
    "NAME"         => "Отдел",
    "DESCRIPTION"  => "Отдел",
    "USER_ID"      => [],
    "STRING_ID"      => "DEPARTMENT"
);
$id = $group->Add($arFields);
if (strlen($group->LAST_ERROR)>0) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
}


echo \CAdminMessage::ShowNote("Группы пользователей добавлены");

$DB->Commit();
?>