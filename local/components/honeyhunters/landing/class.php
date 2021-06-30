<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class HoneyHuntersLanding extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        
    }

		public function executeComponent() {
			$this->includeComponentTemplate();
		}

}?>