<?php
if (!\CIBlockType::Delete('educational_organization')) {
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}