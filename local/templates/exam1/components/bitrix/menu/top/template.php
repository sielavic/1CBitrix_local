<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;

?>



<ul>
    <li class="main-page"><a href="/"><?=GetMessage('MAIN_PAGE')?></a> </li>
		<?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):
		    if($arResult["ALL_ITEMS"][$itemID]['PERMISSION']=='D') continue;
		     $menu_top_class = trim($APPLICATION->GetDirProperty('menu_top_class', $arResult["ALL_ITEMS"][$itemID]['LINK']));
		?>     <!-- first level-->
			<li>
				<a	href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>"<?=($menu_top_class ? 'class="'.$menu_top_class.'" ' : '')?>>
				
					<?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
				</a>
			<?if (is_array($arColumns) && count($arColumns) > 0):?>
					<?foreach($arColumns as $key=>$arRow):?>
						<ul>
						    <?
						    $menu_top_text = trim($APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemID]['LINK']));
						    if($menu_top_text) echo '<div class="menu-text">'.$menu_top_text.'</div>';
						    
						    ?>
						    
						<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):
						if($arResult["ALL_ITEMS"][$itemIdLevel_2]['PERMISSION']=='D') continue;
						?>  <!-- second level-->
							<li>
								<a	href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>">
									<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?>
								</a>
							<?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
								<ul>
						    <?
						    $menu_top_text = trim($APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemIdLevel_2]['LINK']));
						    if($menu_top_text) echo '<div class="menu-text">'.$menu_top_text.'</div>';
						    
						    ?>
								<?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
									<li>
										<a	href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>"	>
										<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?>
										</a>
									</li>
								<?endforeach;?>
								</ul>
							<?endif?>
							</li>
						<?endforeach;?>
						</ul>
					<?endforeach;?>
				
			<?endif?>
			</li>
		<?endforeach;?>
		</ul>


