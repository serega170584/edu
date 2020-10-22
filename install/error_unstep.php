<?php
/**
 * @var \Exception $e
 */
if (!check_bitrix_sessid()) return;
echo \CAdminMessage::ShowMessage($e->getMessage());
