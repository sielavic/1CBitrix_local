<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->getComponent()->setResultCacheKeys(array('NAME', 'PREVIEW_TEXT', 'COMPANY'));
$arResult['COMPANY'] = $arResult['PROPERTIES']['COMPANY']['VALUE'];
