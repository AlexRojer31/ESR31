'use strict'

let searchPtSnap = function() {
let showSearch = document.getElementsByClassName('search-snap');
for (let i = 0; i < showSearch.length; i++) {
showSearch[i].style.display = 'block';
};
let hideWorkSnapBtn = document.getElementsByClassName('snap-btn');
for (let i = 0; i < hideWorkSnapBtn.length; i++) {
hideWorkSnapBtn[i].style.display = 'none';
};
};

let closeSearch = function() {
let showSearch = document.getElementsByClassName('search-snap');
for (let i = 0; i < showSearch.length; i++) {
showSearch[i].style.display = 'none';
};
let hideWorkSnapBtn = document.getElementsByClassName('snap-btn');
for (let i = 0; i < hideWorkSnapBtn.length; i++) {
hideWorkSnapBtn[i].style.display = 'inline-block';
};
};
