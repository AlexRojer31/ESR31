	
'use strict'

var repairs = function() {
	var isTrue = confirm('Вы действительно отремонтировали оснастку?');

	if (isTrue === true) {
	var inputRepairs = document.getElementsByTagName('input');
	for (let i = 0; i < inputRepairs.length; i++) {
		if (inputRepairs[i].name == 'damage') {
			inputRepairs[i].value = 'нет';
		};
	};
	let formUpdate = document.getElementById('formUpdate');
	formUpdate.submit();
	};
};