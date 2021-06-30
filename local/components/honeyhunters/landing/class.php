<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class HoneyHuntersLanding extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        
    }

		public function executeComponent() {
			if($_SERVER['REQUEST_METHOD'] === 'POST') {
				global $APPLICATION;

				\Bitrix\Main\Loader::includeModule('iblock');

				$name = $_REQUEST['name'];
				$email = $_REQUEST['email'];
				$comment = $_REQUEST['comment'];

				$IBLOCK_ID = \CIBlock::GetList([], ['CODE' => 'comments'])->Fetch()['ID'];
				$blEl = new \CIBlockElement();
				$ID = $blEl->Add([
					'IBLOCK_ID' => $IBLOCK_ID,
					'ACTIVE' => 'Y',
					'NAME' => $name,
					'PROPERTY_VALUES' => [
						'NAME' => $name,
						'EMAIL' => $email,
						'COMMENT' => $comment
					]
				]);

				$response = ['status' => 'error', 'message' => 'Ошибка добавления'];
				if($ID) {
					$response = ['status' => 'ok', 'message' => 'Успешно добавлено'];
				}

				$APPLICATION->RestartBuffer();
				header('Content-Type: application/json');
				echo json_encode($response);
				die();
			}

			$this->includeComponentTemplate();
		}

}?>