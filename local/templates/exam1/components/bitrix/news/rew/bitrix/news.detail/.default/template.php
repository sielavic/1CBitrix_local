<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$month = array(
    1=>'январь',
    2=>'февраль',
    3=>'март',
    4=>'апрель',
    5=>'май',
    6=>'июнь',
    7=>'июль',
    8=>'август',
    9=>'сентябрь',
    10=>'октябрь',
    11=>'ноябрь',
    12=>'декабрь',
    );




//echo '<pre>'.htmlspecialchars(print_r($arResult, true)).'</pre>';


$arDate = getdate(strtotime($arResult['ACTIVE_FROM']));
$str = $arResult['NAME'].', '.$arDate['mday'].' '.$month[(int)$arDate['mon']].' '.$arDate['year'].'г.';
if($arResult['PROPERTIES']['POSITION']['VALUE'])$str .= ', '.$arResult['PROPERTIES']['POSITION']['VALUE'];
if($arResult['PROPERTIES']['COMPANY']['VALUE'])$str .= ', '.$arResult['PROPERTIES']['COMPANY']['VALUE'];


if(isset($arResult['DETAIL_PICTURE']['SRC'])){
    $src= $arResult['DETAIL_PICTURE']['SRC'];
}else{
    $src= SITE_TEMPLATE_PATH.'/img/no_photo.jpg';
}


?>

<div class="review-block">
							<div class="review-text">
								<div class="review-text-cont">
								    <?=$arResult['~DETAIL_TEXT'] ?>
								</div>
								<div class="review-autor">
									<?=$str ?>.
								</div>
							</div>
							<div style="clear: both;" class="review-img-wrap"><img src="<?=$src ?>" alt="img"></div>
						</div>
						
						
						
						<?if(is_array($arResult['PROPERTIES']['DOCUMENTS']['VALUE'])):
						?>
						
						
						<div class="exam-review-doc">
						<p><?=GetMessage('DOC')?>:</p>
						
						<? foreach ($arResult['PROPERTIES']['DOCUMENTS']['VALUE'] as $fid):
						$rsFile = CFile::GetByID($fid);
                        $arFile = $rsFile->Fetch();
                        
						?>
						<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png"><a href="/upload/<?=$arFile['SUBDIR'].'/'.$arFile['FILE_NAME']?>"download><?=$arFile['ORIGINAL_NAME']?></a></div>
						<? endforeach; ?>
						</div>
						
						<?endif;?>
						
						
						
						
						<hr>
						<a href="<?=$arResult['LIST_PAGE_URL']?>" class="review-block_back_link"> &larr; К списку отзывов</a>