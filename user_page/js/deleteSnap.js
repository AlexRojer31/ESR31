'use strict'

var deleteSnap = function() {
	var isTrue = confirm('Вы действитель списываете оснастку?');

	if (isTrue === true) {
	let formUpdate = document.getElementById('formUpdate');
	formUpdate.target = 'blank';
	formUpdate.action = 'pt_snap/remove_snap.php';
	formUpdate.submit();
	};
};	
