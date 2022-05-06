'use strict'

var rinse = function() {
	var isTrue = confirm('Вы действительно промыли оснастку?');

	if (isTrue === true) {
	var inputRinse = document.getElementsByTagName('input');
	for (let i = 0; i < inputRinse.length; i++) {
		if (inputRinse[i].name == 'flushing_count') {
			inputRinse[i].value = 0;
		};
	};
	let formUpdate = document.getElementById('formUpdate');
	formUpdate.submit();
	};
};
