(($) => {
    $(document).ready(() => {
        const content = $('#detail-modal .modal-body');

        $(".load-project").on('click', function () {
            content.load('detalhes.html?id='+ $(this).attr('href').replace('#',''));
        });
    })
})(jQuery)