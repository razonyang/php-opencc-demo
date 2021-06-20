$(document).ready(function () {
    const configEle = $('#config');
    configEle.on('change', function () {
        console.log($(this).val());
    })
});