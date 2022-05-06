'use strict'

var translate = function() {
	
	var isTrue = confirm('Вы хотите переместить оснастку?');

	if (isTrue === true) {
	var newLocation = prompt('Куда Вы перемещаете оснастку?','');
	var inputTranslate = document.getElementsByTagName('input');
	for (let i = 0; i < inputTranslate.length; i++) {
		if (inputTranslate[i].name == 'position') {
			inputTranslate[i].value = newLocation;
		};
	};
	let formUpdate = document.getElementById('formUpdate');
	formUpdate.submit();
	};
};