// Скрипт по добавлению пользователя

	$( document ).ready(function() {
		$("#btn").click(
			function(){
				sendAjaxForm('result_form', 'ajax_form', 'ete.php');
				return false; 
			}
		);
	});
	 
	function sendAjaxForm(result_form, ajax_form, url) {
		$.ajax({
			url:     '/ete.php', //url страницы (action_ajax_form.php)
			type:     "POST", //метод отправки
			dataType: "html", //формат данных
			data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
			success: function(response) { //Данные отправлены успешно
				location. reload();
				//result = $.parseJSON(response);
				//$('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
			},
			error: function(response) { // Данные не отправлены
				$('#result_form').html('Ошибка. Данные не отправлены.');
			}
		 });
	}

//скрипт по удалению пользователя

$("document").ready(function(){//говорит о том что скрипт этой функции будет выполняться только при полной загрузке документа
	
		$('.btn-buy').click(function () {//клип на кнопку
			let id = $(this).attr('id'); //получаем id этой кнопки
			
					$.ajax({//передаем ajax-запросом данные
							url: '/delete.php',//php-файл для обработки данных
							method: 'post',             /* Метод запроса (post или get) */
							dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
							data: {id_tov: id},//передаем наши данные
						success: function(data) {//
							location. reload();  
							}
						});
			});

})

//скрипт по обновлению пользователя

$("document").ready(function(){//говорит о том что скрипт этой функции будет выполняться только при полной загрузке документа
	
	$("#submit_form").on("submit", function(){//на форму вешаем событие отправки submit
		let id = $(this).attr('id'); //получаем id этой кнопки
		
				$.ajax({//передаем ajax-запросом данные
						url: '/edit_users.php',//php-файл для обработки данных
						method: 'post',             /* Метод запроса (post или get) */
						dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
						data: {id_tov: id},//передаем наши данные
					success: function(data) {//
						console.log(data); /* В переменной data содержится ответ от index.php. */
						}
					});
		});

})


//мгновенная проверка полей		
$(document).ready(function(){
      $('form[id="ajax_form"]').validate({
			rules: {
					name: {required: true,
							minlength: 3,
							maxlength: 30
							},
					description: {required: true,
							minlength: 3,
							maxlength: 6000
							}
				
					
					
			  },
					messages: {
								name: {
									minlength: 'Название не может быть меньше 3 символов',
									maxlength: 'Название не может быть больше 30 символов',									
									},
								description: {
									minlength: 'Пост не может быть меньше 3 символов',
									maxlength: 'Пост не может быть больше 6000 символов',									
									},
							
							
							
					},
					
				submitHandler: function(form) {
								form.submit();
								}
			});
		});

		





