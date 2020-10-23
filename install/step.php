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

echo \CAdminMessage::ShowNote("Добавление свойств: время начала работы, время окончания работы, сайт пользователя");
$oUserTypeEntity = new CUserTypeEntity();
$aUserFields = [
    'ENTITY_ID' => 'USER',
    'FIELD_NAME' => 'UF_BEGIN_TIME',
    'USER_TYPE_ID' => 'datetime',
    'XML_ID' => 'BEGIN_DATE',
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
echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

$DB->Commit();
?>