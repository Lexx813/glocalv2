
//this is  to switch languages
var spanish = document.getElementById('sp_click'),
english = document.getElementById('en_click'),
spanish_txt = document.querySelectorAll('.sp'),
english_txt = document.querySelectorAll('.en'),
nb_sp = spanish_txt.length,
nb_en = english_txt.length;

spanish.addEventListener('click', function() {
language(spanish, english);
}, false);

english.addEventListener('click', function() {
language(english, spanish);
}, false);

function language(languageOn, languageOff) {
if (!languageOn.classList.contains('current_lang')) {
    languageOn.classList.toggle('current_lang');
    languageOff.classList.toggle('current_lang');
}
if (languageOn.innerHTML == 'Spanish') {
    display(spanish_txt, nb_sp);
    hide(english_txt, nb_en);
} else if (languageOn.innerHTML == 'English') {
    display(english_txt, nb_en);
    hide(spanish_txt, nb_sp);
}
}



function display(txt, nb) {
for (var i = 0; i < nb; i++) {
    txt[i].style.display = 'block';
}
}

function hide(txt, nb) {
for (var i = 0; i < nb; i++) {
    txt[i].style.display = 'none';
}
}

function init() {
language(spanish, english);
}
init();
