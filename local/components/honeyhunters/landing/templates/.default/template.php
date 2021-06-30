<div class="wrapper">
	<div class="header">
		<div class="container">
			<div class="logo-wrapper">
				<div class="logo">
					<img src="<?=$this->GetFolder().'/assets/img/logo.png'?>" alt="">
				</div>
			</div>
			<div class="contact-icon-wrapper">
				<div class="contact-icon">
					<img src="<?=$this->GetFolder().'/assets/img/contact.png'?>" alt="">
				</div>
			</div>
			<div class="contact-form">
				<div>
					<div class="d-flex flex-column justify-content-between h-100">
						<div class="form-group">
							<input type="text" class="form-control" name="name" id="name" required>
							<label for="name">Имя</label>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="email" id="email" required>
							<label for="email">E-Mail</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<textarea name="comment" id="comment" class="form-control" required></textarea>
					<label for="comment">Комментарий</label>
				</div>
			</div>

			<div class="contact-button">
				<button class="btn btn-write">Записать</button>
			</div>
		</div>
	</div>

	<div class="comments">
		<div class="container">
			<div class="title">
				<span>Выводим комментарии</span>
			</div>
			<div class="comment-cards">
				<?=$this->getComponent()->getCommentsHtml()?>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<div class="logo-wrapper">
					<div class="logo">
						<img src="<?=$this->GetFolder().'/assets/img/logo.png'?>" alt="">
					</div>
				</div>
				<div class="social">
					<img src="<?=$this->GetFolder().'/assets/img/vk.png'?>" alt="">
					<img src="<?=$this->GetFolder().'/assets/img/facebook.png'?>" alt="">
				</div>
			</div>
		</div>
	</div>
</div>