'use strict'

var pierce = function() {
	var factDiameter = prompt('Введите проточенный диаметр','');
	var asqStr = 'Вы вводите значение диаметра - ' + factDiameter;
	var isTrue = confirm(asqStr);
	
	if (isTrue === true || isTrue === null || isTrue === '') {
	var inputDiameter = document.getElementsByTagName('input');
	for (let i = 0; i < inputDiameter.length; i++) {
		if (inputDiameter[i].name == 'diameter_fact') {
			var diameter = inputDiameter[i].value;
		};
		if (inputDiameter[i].name == 'type') {
			var type = inputDiameter[i].value;
		};
	};
	if (type == 'дорн') {
		if (factDiameter > diameter) {
			alert('введено неверное значение проточки');
		} else {
			for (let i = 0; i < inputDiameter.length; i++) {
				if (inputDiameter[i].name == 'diameter_fact') {
					inputDiameter[i].value = factDiameter;
				};
				let formUpdate = document.getElementById('formUpdate');
				formUpdate.submit();
			};
		};	
	} else {
		if (factDiameter < diameter) {
			alert('введено неверное значение проточки');
		} else {
			for (let i = 0; i < inputDiameter.length; i++) {
				if (inputDiameter[i].name == 'diameter_fact') {
					inputDiameter[i].value = factDiameter;
				};
				let formUpdate = document.getElementById('formUpdate');
				formUpdate.submit();
			};
		};		
	};
	};
	
};
