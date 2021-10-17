const orderBlock = $('div[data-order-body]');
const checkRegionBlock = $('div[data-order-check-body]');
const checkButton = $('button[data-check-region-button]');
const formField = $('input[data-field-form-region]');
const textField = $('span[data-ckecked-region-text]');

$(document).ready(function () {
    orderBlock.css('display', 'none');

    checkButton.on('click', function(e){
        e.preventDefault();

        let checkedRegion = $(this).val();
        formField.val(checkedRegion);
        textField.css('padding-left', '6px').text(checkedRegion);

        checkRegionBlock.hide(500);
        orderBlock.show(500);
    });

});//end of file;