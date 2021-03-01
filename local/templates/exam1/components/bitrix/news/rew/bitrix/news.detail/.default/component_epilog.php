<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetTitle(GetMessage('REW'). ' - '.$arResult['NAME']);
$APPLICATION->SetPageProperty('h1', GetMessage('REW'). ' - '.$arResult['NAME'].' - '.$arResult['COMPANY']);
$APPLICATION->SetPageProperty('keywords', GetMessage('KEYWORDS').$arResult['COMPANY']);
$APPLICATION->SetPageProperty('description', $arResult['PREVIEW_TEXT']);
