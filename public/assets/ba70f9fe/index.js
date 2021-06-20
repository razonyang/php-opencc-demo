$(document).ready(function () {
    const configEle = $('#config');
    const inputEle = $('#input');
    const outputEle = $('#output');
    configEle.on('change', function () {
        console.log($(this).val());

        convert();
    });

    inputEle.on('change', function () {
        convert();
    });

    function convert() {
        $.post('/convert', {
            config: configEle.val(),
            input: inputEle.val(),
        }, function (resp) {
            console.log(resp);
        })
    }
});