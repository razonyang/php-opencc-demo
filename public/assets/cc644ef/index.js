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
        outputEle.val('Converting');
        $.post('/convert', {
            config: configEle.val(),
            input: inputEle.val(),
            _csrf: $('meta[name="csrf"]').attr('content'),
        }, function (resp) {
            console.log(resp);
            outputEle.val(resp.output);
        }, 'json');
    }
});