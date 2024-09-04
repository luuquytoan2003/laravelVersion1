"use strict";
let LQ = {}

LQ.switchery = () => {
    let elements = document.getElementsByClassName('js-switch');
    [...elements].forEach(function (item) {
        let switchery = new Switchery(item, { color: '#1AB394' })
    })
}

LQ.select2 = () => {
    $('.setupSelect2').select2()
}

LQ.switchery()
LQ.select2()