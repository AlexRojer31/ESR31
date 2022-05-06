	
'use strict'

var damage = function() {
	var factDamage = prompt('Введите описание повреждения','');

	if (factDamage != null && factDamage != '') {

	var asqStr = 'Вы ввели описание повреждения: ' + factDamage;
	var isTrue = confirm(asqStr);

	if (isTrue === true) {
	var inputDamage = document.getElementsByTagName('input');
	for (let i = 0; i < inputDamage.length; i++) {
		if (inputDamage[i].name == 'damage') {
			inputDamage[i].value = factDamage;
			let formUpdate = document.getElementById('formUpdate');
			formUpdate.submit();
		};
	};
	};
	};
};