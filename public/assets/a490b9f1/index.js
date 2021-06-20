$(document).ready(function () {
    const configEle = $('#config');
    const inputEle = $('#input');
    const outputEle = $('#output');
    configEle.on('change', function () {
        console.log($(this).val());
    })
});