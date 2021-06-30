<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

\Bitrix\Main\Loader::includeModule('iblock');

class HoneyHuntersLanding extends CBitrixComponent
{
		const IBLOCK_CODE = 'comments';

    public function onPrepareComponentParams($arParams)
    {
        
    }

		public function executeComponent() {
			if($_SERVER['REQUEST_METHOD'] === 'POST') {
				global $APPLICATION;

				$name = $_REQUEST['name'];
				$email = $_REQUEST['email'];
				$comment = $_REQUEST['comment'];

				$IBLOCK_ID = \CIBlock::GetList([], ['CODE' => self::IBLOCK_CODE])->Fetch()['ID'];
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
					$response = ['status' => 'ok', 'message' => 'Успешно добавлено', 'html' => $this->getCommentsHtml()];
				}

				$APPLICATION->RestartBuffer();
				header('Content-Type: application/json');
				echo json_encode($response);
				die();
			}

			$this->includeComponentTemplate();
		}

		public function getComments() {
			$arData = [];

			$res = \CIBlockElement::GetList([], ['IBLOCK_CODE' => self::IBLOCK_CODE, 'ACTIVE' => 'Y'], false, false, ['ID', 'PROPERTY_NAME', 'PROPERTY_EMAIL', 'PROPERTY_COMMENT']);
			while($row = $res->Fetch()) {
				$arData[] = [
					'NAME' => $row['PROPERTY_NAME_VALUE'],
					'EMAIL' => $row['PROPERTY_EMAIL_VALUE'],
					'COMMENT' => $row['PROPERTY_COMMENT_VALUE']
				];
			}

			return $arData;
		}

		public function getCommentsHtml() {
			$arComments = $this->getComments();

			ob_start();
			?>
			<? foreach($arComments as $data): ?>
			<div class="comment-card">
					<div class="comment-card-title">
							<?=$data['NAME']?>
					</div>
					<div class="comment-card-body">
						<div class="comment-card-email"><?=$data['EMAIL']?></div>
						<div class="comment-card-text"><?=$data['COMMENT']?></div>
					</div>
				</div>
			<? endforeach; ?>
			<?
			return ob_get_clean();
		}
}?>