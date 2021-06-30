(function() {
	$(document).ready(() => {
		$('.btn-write').on('click', (e) => {
			let target = $(e.target);
	
			let data = {};
			data.name = $('[name="name"]').val();
			data.email = $('[name="email"]').val();
			data.comment = $('[name="comment"]').val();

			if(!checkRequired(data)) {
				alert('Необходимо заполнить все обязательные поля');
				return false;
			}

			target.prop('disabled', true);

			writeData(data, function(res) {
				let isOk = res.status && res.status === 'ok';
				let message = res.message ? res.message : '';

				if(isOk) {
					$('.contact-form input, .contact-form textarea').val('');
					target.prop('disabled', false);
				}
				alert(message);

			});
		});
	});

	function checkRequired(data) {
		return Object.values(data).length === Object.values(data).filter(e => e.length > 0).length;
	}

	function writeData(data, callback) {
		$.post('', data, callback);
	}
})();

