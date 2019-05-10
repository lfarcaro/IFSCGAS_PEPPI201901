(($) => {
    $(document).ready(() => {
        const content = $('#detail-modal .modal-body');

        $(".load-project").on('click', function () {
            content.load('projetos_detalhes.html?id='+ $(this).attr('href').replace('#',''));
        });
    })
})(jQuery)