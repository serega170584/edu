<?php
/**
 * @var \CDatabase $DB
 */
$arFields = [
    'ID' => 'educational_organization',
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
    throw new \Bitrix\Main\DB\Exception($obBlocktype->LAST_ERROR);
}
echo \CAdminMessage::ShowNote("Модуль educational_organization установлен");