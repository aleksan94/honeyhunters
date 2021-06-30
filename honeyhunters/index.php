<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\UI\Extension;

Extension::load('ui.bootstrap4');

$APPLICATION->ShowHead();

$APPLICATION->IncludeComponent('honeyhunters:landing', '')
?>
