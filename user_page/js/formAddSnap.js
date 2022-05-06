
'use strict'

let addPtSnap = function() {
let addSnap = document.createElement('div');
addSnap.className = 'add-snap';
addSnap.innerHTML = '<h5>Ввод в эксплуатацию новой оснастки <span onclick="addSnapClose()">отмена</span></h5><form action="pt_snap/add_pt_snap.php" method="post"><label for="inventory">Инвентарный №</label> <input required type="text" name="inventory" id="inventory"><br><label for="drawing">№ чертежа</label> <input required type="text" name="drawing" id="drawing"><br><label for="type">тип оснастки</label> <select id="type" name="type"><option value="дорн">Дорн</option><option value="кристаллизатор">Кристаллизатор</option><option value="шлаковая надставка">Шлаковая надставка</option></select><br><label for="size">типоразмер</label> <input required type="text" name="size" id="size"><br><label for="diameter">Диаметр</label> <input required type="text" name="diameter" id="diameter"><br><label for="position">Расположение</label> <input required type="text" name="position" id="position"><br><input type="hidden" name="user" value="<?php echo $user_name;?>"><br><input type="submit" name="" value="Ввести в эксплуатацию"></form>';
let insertAddSnapElem = document.getElementsByClassName('pt-snap');
for (let i = 0; i < insertAddSnapElem.length; i++) {
	insertAddSnapElem[i].appendChild(addSnap);
};
let closeWorkSnapElem = document.getElementsByClassName('snap-btn');
for (let j = 0; j < closeWorkSnapElem.length; j++) {
	closeWorkSnapElem[j].style.display = 'none';
};
};

let addSnapClose = function() {
let showWorkSnapElem = document.getElementsByClassName('snap-btn');
for (let q = 0; q < showWorkSnapElem.length; q++) {
	showWorkSnapElem[q].style.display = 'inline-block';
};
let removeAddSnapElem = document.getElementsByClassName('pt-snap');
let addSnap = document.getElementsByClassName('add-snap');
for (let w = 0; w < removeAddSnapElem.length; w++) {
	removeAddSnapElem[w].removeChild(addSnap[w]);
};
};