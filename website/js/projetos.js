(($) => {
    $(document).ready(() => {
        const modal = $('#detail-modal');

        $(".some-action-class").on('click', function () {
            $('#detail-modal').removeData('bs.modal');
            $('#detail-modal').modal({remote: 'some/new/context?p=' + $(this).attr('buttonAttr') });
            $('#myModal').modal('show');
        });
    })
})(jQuery)