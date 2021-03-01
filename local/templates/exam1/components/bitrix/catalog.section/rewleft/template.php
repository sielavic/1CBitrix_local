<?

//echo '<pre>'.(print_r($arResult, true)).'</pre>';

 
 



foreach($arResult['ITEMS'] as $item):

if(isset($item['PREVIEW_PICTURE']['ID'])){
    $arFileTmp = CFile::ResizeImageGet(
            $item['PREVIEW_PICTURE']['ID'],
            array("width" => 39, "height" => 39),
            BX_RESIZE_IMAGE_PROPORTIONAL
            );
            $src = $arFileTmp ['src'];
        
}else{
    $src = SITE_TEMPLATE_PATH.'/img/no_photo_left_block.jpg';
}
?>
<div class="item">
									<div class="side-block side-opin">
										<div class="inner-block">
											<div class="title">
												<div class="photo-block">
													<img src="<?= $src ?>" alt="img">
												</div>
												<div class="name-block"><a href="<?= $item ['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a></div>
												
												<div class="pos-block"><?= $item['PROPERTIES']['POSITION']['VALUE'] ?>,"<?= $item['PROPERTIES']['COMPANY']['VALUE'] ?>"</div>
											</div>
											<div class="text-block"><?= substr($item['PREVIEW_TEXT'], 0, 150)?>...</div>
										</div>
									</div>
								</div>
								
<?
endforeach;
?>