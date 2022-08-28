/* Article FructCode.com */
$( document ).ready(function() {
    $("#talkSend").click(
		function(){
			sendAjaxForm( // Dialog id; result text id; input form id; handler
			'requestTalkForm', 'send-mail-result', 'talk_ajax_form', 'http://teremok.club/js/send_mail.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(dialog_id, result_form, input_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+input_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
			$("#"+dialog_id).hide();
			$("#email-success").show();
        //	$('#'+result_form).html('Запит успішно відправлено. Ми скоро відповімо Вам.');
    	},
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Помилка відправки запиту. Зателефонуйте нам, будь ласка');
    	}
 	});
}