window.app_url = $('meta[name="url"]').attr('content'),
    $_token = '';
console.log(app_url);

function ajax($url) {
    $.ajax({
        type: "post",
        url: $url,
        data: {_token: $_token},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function ($response) {
            notify($response.status, $response.msg)
            if ($response.redirect_url) {
                setTimeout(function () {
                    window.location.href = $response.redirect_url;
                }, 1000);
            }
        },
        dataType: 'JSON'
    });
}


$.fn.enterAsTab = function (options) {
    var settings = $.extend({
        'allowSubmit': false
    }, options);
    this.find('input, select').live("keypress", {localSettings: settings}, function (event) {
        if (settings.allowSubmit) {
            var type = $(this).attr("type");
            if (type == "submit") {
                return true;
            }
        }
        if (event.keyCode == 13) {
            var inputs = $(this).parents("form").eq(0).find(":input:visible:not(disabled):not([readonly])");
            var idx = inputs.index(this);
            if (idx == inputs.length - 1) {
                idx = -1;
            } else {
                inputs[idx + 1].focus(); // handles submit buttons
            }
            try {
                inputs[idx + 1].select();
            }
            catch (err) {
                // handle objects not offering select
            }
            return false;
        }
    });
    return this;
};

function __api($form, $ajax_data) {
    var $api_object = $('input,select,textarea', $form).serializeObject();
    if ((typeof $ajax_data == "object") && ($ajax_data !== null)) {
        $api_object = $.extend($ajax_data, $api_object);
    }
    return $api_object;
}
var params = function () {
    var url = decodeURIComponent(window.location.href);
    var result = {};
    url = url.split('?');
    if (url.length > 1) {
        url = url[1].split('&');
        for (var i = 0; i < url.length; i++) {
            var param = url[i];
            param = param.split('=');
            if (param.length > 1) {
                var attr = param[0];
                var value = param[1];
                result[attr] = value;
            }
        }
    }
    return result;
};

var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
        ,
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table style="direction: rtl">{table}</table></body></html>'
        , base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }
        , format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            })
        };

    return function (table, name) {
        if (!table.nodeType) table = document.getElementById(table);
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML};
        window.location.href = uri + base64(format(template, ctx));
    }
})();


$.ajaxSetup({
    type: 'post',
    dataType: 'json',
    async: true,
    cache: false
});


function notify($status, $msg) {
    toastr[$status]($msg);
}

$(document).ready(function () {

    /*Ajax Model Start*/
    // $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner" style="width: 200px; margin-left: -100px;"><div class="progress progress-striped active"><div class="progress-bar" style="width: 100%;"></div></div></div>', $.fn.modalmanager.defaults.resize = !0, $(".dynamic .demo").click(function () {
    //     $(a).modal()
    // });

    $('.modal-click').on('click', function (e) {
        var name = e.target.id;
        var $modal = $('#' + name + '-modal');

        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');
        var el = $(this);
        setTimeout(function () {
            $modal.load(el.attr('data-url'), '', function () {
                $modal.modal();
                var button = $modal.find('button.deliver');
                if (button)
                    button.on('click', function () {
                        e.preventDefault();
                        var url = $(this).data('url');
                        $.ajax({
                            'method': 'post',
                            'url': url,
                            data: {_token: $_token},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (resp) {
                                if (resp.status) {
                                    notify(resp.status, resp.msg);
                                    if (resp.status == 'success') {
                                        var newText = resp.delivered == 1 ? 'نعم' : 'لا';
                                        $('.delivered').text(newText);
                                        newText = resp.delivered == 1 ? 'استلام' : 'عدم استلام';
                                        $('.delivered-text').text(newText);
                                    }
                                }
                            }
                        });
                    });
            });
        }, 1000);
    });
    /*Ajax Model Finish*/

    /*Table Controls Start*/
    $('.view_list .item .show_controls').on('click', function () {
        var $this = $(this),
            $parents = $this.parents('.item');
        $this.toggleClass('active');
        $parents.find('.footer').slideToggle();
    });
    /*Table Controls Finish*/


    $("input[data-inputmask]").inputmask();
    window.$_token = $('meta[name="_token"]').val();


    $('input.search_input').each(function () {
        var $this = $(this)
        var bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace($this.attr('data-by')),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '',
            remote: {
                url: '/' + $this.attr('data-controller') + '/search?' + $this.attr('data-by') + '=QUERY',
                wildcard: 'QUERY'
            }
        });
        $('.search_input').typeahead(null, {
            name: 'best-pictures',
            display: $this.attr('data-by'),
            source: bestPictures,
        });
    });

    $('.status').bootstrapSwitch({
        onSwitchChange: function ($e, $status) {
            var $url = $e.delegateTarget.dataset.url,
                $item = $e.currentTarget.closest('.item');
            $.ajax({
                type: "PATCH",
                url: $url,
                data: {_token: $_token},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "Access-Control-Allow-Methods": "PATCH"
                },
                sucess: function () {
                    $item.addClass('disabled')
                },
                dataType: 'JSON'
            });
        }
    });

    $('.form-validate').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'm--font-bold m--font-danger', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        invalidHandler: function (event, validator) { //display error alert on form submit
            // bootstrap_alert('danger', 'هناك بعض الأخطاء باللون الاحمر، يرجى مراجعتها.')
        },
        errorPlacement: function (error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        highlight: function (element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        }
    });


    /* Show search for if search */
    var url = decodeURIComponent(window.location.href);
    url = url.split('?');
    if (url.length > 1) {
        url = url[1].split('&');
        for (var i = 0; i < url.length; i++) {
            var param = url[i];
            param = param.split('=');
            if (param.length > 1) {
                var attr = param[0];
                var value = param[1];
                var selector = $('[name="' + attr + '"]');
                selector.val(value);
                if (selector.is('select')) {
                    selector.trigger('change.select2');
                } else if (selector.is(':checkbox')) {
                    selector.prop('checked', true);
                }
            }
        }
        $('.advanced-search').slideDown(1000);
    }
    /* Show search for if search */
});


$('#select_all').on('click', function () {
    var checked = ($(this).prop('checked'));
    var checkboxes = $('.export-check:checkbox');
    $.each(checkboxes, function () {
        $(this).prop('checked', checked);
    });

    var count = $('.export-check:checkbox:checked').length;
    if (count > 0) {
        $('.number').show();
        $('.count-number').text(count);
    } else {
        $('.number').hide();
    }
});
$('.advanced-search-btn').on('click', function (e) {
    e.preventDefault();
    $('.advanced-search').slideDown(1000);
});
$('.hide-search').on('click', function (e) {
    e.preventDefault();
    $('.advanced-search').slideUp(1000);
});
$('.search-btn').on('click', function (e) {
    e.preventDefault();
    var data = $('.search-form').serialize();
    $('.search-form').submit();
});