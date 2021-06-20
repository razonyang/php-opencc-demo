$(document).ready(function () {
    const configEle = $('#config');
    const inputEle = $('#input');
    const outputEle = $('#output');

    convert();

    function convert() {
        outputEle.val('Converting');
        $.post('/convert', {
            config: configEle.val(),
            input: inputEle.val(),
            _csrf: $('meta[name="csrf"]').attr('content'),
        }, function (resp) {
            outputEle.val(resp.output);
        }, 'json');
    }
});