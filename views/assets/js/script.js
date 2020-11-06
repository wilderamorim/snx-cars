// masks
$('.mask-money').mask('000.000.000.000.000,00', {reverse: true, placeholder: '0,00'});

// ajax filter
const ajaxFilter = function () {

    const smartFilter = function () {
        const form = $('#smartFilter');

        form.find('select').change(function () {
            const serialize = form.serialize() + '&select=' + $(this).attr('name');
            const option = `<option value="all">Todos</option>`;
            const disabledButton = `<button type="button" class="btn btn-primary btn-block" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>`;
            const activatedButton = `<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Buscar</button>`;

            if (form.find('select[name=brand]').val() === 'all') {
                form.find('select[name=model]').html(option);
                form.find('select[name=year]').html(option);
                form.find('select[name=price]').html(option);
                form.find('select[name=city]').html(option);
                return false;
            }

            if ($(this).attr('name') !== 'city') {
                $.ajax({
                    url: form.data('action'),
                    type: 'POST',
                    data: serialize,
                    dataType: 'json',
                    beforeSend: function () {
                        form.find('.align-items-end').html(disabledButton);
                    },
                    success: function (response) {
                        if (response.models) {
                            form.find('select[name=model]').html(option + response.models);
                        }

                        if (response.years) {
                            form.find('select[name=year]').html(option + response.years);
                        }

                        if (response.prices) {
                            form.find('select[name=price]').html(option + response.prices);
                        }

                        if (response.cities) {
                            form.find('select[name=city]').html(option + response.cities);
                        }

                        form.find('.align-items-end').html(activatedButton);
                    }
                });
            } else {
                form.submit();
            }
        });
    };

    return {
        init: function () {
            smartFilter();
        }
    }

}();

// init plugins
jQuery(document).ready(function () {
    ajaxFilter.init();
});
