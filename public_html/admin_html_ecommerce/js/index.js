$(function () {

    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')

    //BEGIN JQUERY NEWS TICKER
    $('#sample').ticker({
        controls: false,
        titleText: ''
    });
    //END JQUERY NEWS TICKERS

    //BEGIN TODOS LIST
    $("#todos-list-sort").sortable();
    $("#todos-list-sort").disableSelection();


    $('#todos-list-add').click(function () {
        var index = $('#todos-list-sort > li').length;
        $('ul#todos-list-sort').append('<li><input type="checkbox" id="task-item-' + index + '" /><label for="task-item-' + index + '" >' + $("#todos-list-input").val() + '</label><a class="delete" href="javascript:;" data-hover="tooltip" data-original-title="remove"><span class="fa fa-trash-o"></span></a></li>');
        $("[data-hover='tooltip']").tooltip();
    });
    $('#todos-list-sort li a.delete').live('click', function () {
        $(this).parent().remove();
    });
    //END TODOS LIST

    //BEGIN JQUERY JVECTORMAP
    $('.widget-weather').css('height', '322px');
    $('#world-map').css('width', $('.col-lg-6').width());
    $('#world-map').css('height', '342px');
    $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        series: {
            regions: [
                {
                    values: gdpData,
                    scale: ['#B8312F', '#fc6e51'],
                    normalizeFunction: 'polynomial'
                }
            ]
        },
        hoverOpacity: 0.7,
        hoverColor: false
    });
    $(window).resize(function () {
        $('#world-map').css('width', $('.col-lg-6').width());
        $('#world-map').css('height', '342px');
    });
    //END JQUERY JVECTORMAP

    //BEGIN JQUERY ANIMATE NUMBER
    $({value: 0}).animate({value: $('.tp-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.tp-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    });
    $({value: 0}).animate({value: $('.is-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.is-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    });
    $('#tp-number').animateNumber({
        number: 55,
        numberStep: comma_separator_number_step
    }, 5000);
    $({value: 0}).animate({value: $('.tp-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.tp-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    })

    $(".dial").knob({
        'draw': function () {
            $(this.i).val(this.cv + '%')
        },
        'fgColor': '#B8BEC8'
    });
    $({value: 0}).animate({value: $('.stats-chart.visits-stats input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.stats-chart.visits-stats input').val(Math.ceil(this.value)).trigger('change');
        }
    })
    $({value: 0}).animate({value: $('.stats-chart.pageviews-stats input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.stats-chart.pageviews-stats input').val(Math.ceil(this.value)).trigger('change');
        }
    })
    $('#bg-number').animateNumber({
        number: 13287,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#at-number').animateNumber({
        number: 8636,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#tm-number').animateNumber({
        number: 853,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#gr-number').animateNumber({
        number: 15,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#is-number').animateNumber({
        number: 1305,
        numberStep: comma_separator_number_step
    }, 5000);
    $({value: 0}).animate({value: $('.is-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.is-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    })
    $('#visits-number').animateNumber({
        number: 16107,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#pageviews-number').animateNumber({
        number: 62142,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#earning-number').animateNumber({
        number: 50645,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#ock-group-number').animateNumber({
        number: 3420,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#foh-san-number').animateNumber({
        number: 4420,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#tbm-number').animateNumber({
        number: 10220,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#grand-teak-number').animateNumber({
        number: 6710,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#yee-lee-number').animateNumber({
        number: 5190,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#earning-number-vps').animateNumber({
        number: 5020,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#earning-number-web-design').animateNumber({
        number: 1890,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#earning-number-shared').animateNumber({
        number: 6970,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#earning-number-dedicated').animateNumber({
        number: 2600,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#earning-number-email88').animateNumber({
        number: 4580,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#users-number').animateNumber({
        number: 15,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#app-number').animateNumber({
        number: 32890,
        numberStep: comma_separator_number_step
    }, 5000);
	$('#revenue-number').animateNumber({
        number: 3579.95,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#new-sales-number').animateNumber({
        number: 295.35,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#shipping-number').animateNumber({
        number: 30.00,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#quantity-number').animateNumber({
        number: 14,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#ls-number').animateNumber({
        number: 252983,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#ao-number').animateNumber({
        number: 6320,
        numberStep: comma_separator_number_step
    }, 5000);
    //END JQUERY ANIMATE NUMBER

    //BEGIN CHART COUNTER
    var d5_1 = [
        ["01/02", 367],
        ["01/03", 791],
        ["01/04", 436],
        ["01/05", 550],
        ["01/06", 328],
        ["01/07", 523],
        ["01/08", 449]
    ];
    var d5_2 = [
        ["01/02", 159],
        ["01/03", 449],
        ["01/04", 345],
        ["01/05", 194],
        ["01/06", 556],
        ["01/07", 222],
        ["01/08", 321]
    ];
    $.plot("#counter-chart", [
        {
            data: d5_1,
            label: "This Week",
            color: "#df4782"
        },
        {
            data: d5_2,
            label: "Last Week",
            color: "#3DB9D3"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .8
            },
            points: {
                show: !0,
                radius: 4
            }

        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART COUNTER
	
	//BEGIN AREA CHART
    var d9_1 = [
        ["Jan", 1135],
        ["Feb", 2260],
        ["Mar", 4685],
        ["Apr", 6646],
        ["May", 899],
        ["Jun", 282],
        ["Jul", 2496],
		["Aug", 5799],
        ["Sep", 1082],
        ["Oct", 596],
		["Nov", 8299],
        ["Dec", 2782]

    ];
    var d9_2 = [
        ["Jan", 1647],
        ["Feb", 1274],
        ["Mar", 2636],
        ["Apr", 4983],
        ["May", 379],
        ["Jun", 610],
        ["Jul", 4551],
		["Aug", 3399],
        ["Sep", 5582],
        ["Oct", 1296],
		["Nov", 499],
        ["Dec", 1482]
    ];
    $.plot("#area-chart", [
        {
            data: d9_1,
            label: "This Year",
            color: "#ffce54"
        },
        {
            data: d9_2,
            label: "Last Year",
            color: "#87318c"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .8
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END AREA CHART

    //BEGIN CHART EARNING vps
    var d2 = [
        ["Jan", 200],
        ["Feb", 80],
        ["Mar", 199],
        ["Apr", 147],
        ["May", 293],
        ["Jun", 192]
    ];
    $.plot("#earning-chart", [
        {
            data: d2,
            color: "#ffce54"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .1
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART EARNING vps 
	
	//BEGIN CHART EARNING web design
    var d3 = [
        ["Jan", 200],
        ["Feb", 80],
        ["Mar", 199],
        ["Apr", 147],
        ["May", 293],
        ["Jun", 192]
    ];
    $.plot("#earning-chart-web-design", [
        {
            data: d3,
            color: "#3DB9D3"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .1
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART EARNING web design
	
	//BEGIN CHART EARNING shared hosting
    var d4 = [
        ["Jan", 200],
        ["Feb", 80],
        ["Mar", 199],
        ["Apr", 147],
        ["May", 293],
        ["Jun", 192]
    ];
    $.plot("#earning-chart-shared", [
        {
            data: d4,
            color: "#df4782"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .1
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART EARNING shared hosting
	
	//BEGIN CHART EARNING dedicated server
    var d10 = [
        ["Jan", 200],
        ["Feb", 80],
        ["Mar", 199],
        ["Apr", 147],
        ["May", 293],
        ["Jun", 192]
    ];
    $.plot("#earning-chart-dedicated", [
        {
            data: d10,
            color: "#87318c"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .1
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART EARNING dedicated server
	
	//BEGIN CHART EARNING email88
    var d11 = [
        ["Jan", 200],
        ["Feb", 80],
        ["Mar", 199],
        ["Apr", 147],
        ["May", 293],
        ["Jun", 192]
    ];
    $.plot("#earning-chart-email88", [
        {
            data: d11,
            color: "#339933"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: .1
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART EARNING email88

    //BEGIN CHART TRAFFIC SOURCES
    /*var d6_1 = [47];
    var d6_2 = [33];
    var d6_3 = [20];
    $.plot('#traffice-sources-chart', [
        {
            data: d6_1,
            label: "Search Engines",
            color: "#3DB9D3"
        },
        {
            data: d6_2,
            label: "Referrals",
            color: "#ffce54"
        },
        {
            data: d6_3,
            label: "Direct",
            color: "#fc6e51"
        }
    ], {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true,
            clickable: true
        }
    });*/
    //END CHART TRAFFIC SOURCES

    //BEGIN CHART ock group
    var d7 = [
        ["Jan", 93],
        ["Feb", 78],
        ["Mar", 47],
        ["Apr", 35],
        ["May", 48],
        ["Jun", 26]
    ];
    $.plot("#ock-group-chart", [
        {
            data: d7,
            color: "#b0b800"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART ock group
	
	//BEGIN CHART foh san
    var d12 = [
        ["Jan", 93],
        ["Feb", 78],
        ["Mar", 47],
        ["Apr", 35],
        ["May", 48],
        ["Jun", 26]
    ];
    $.plot("#foh-san-chart", [
        {
            data: d12,
            color: "#b8312f"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART foh san
	
	//BEGIN CHART grand teak
    var d13 = [
        ["Jan", 93],
        ["Feb", 78],
        ["Mar", 47],
        ["Apr", 35],
        ["May", 48],
        ["Jun", 26]
    ];
    $.plot("#grand-teak-chart", [
        {
            data: d13,
            color: "#947dcb"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART grand teak
	
	//BEGIN CHART yee lee
    var d14 = [
        ["Jan", 93],
        ["Feb", 78],
        ["Mar", 47],
        ["Apr", 35],
        ["May", 48],
        ["Jun", 26]
    ];
    $.plot("#yee-lee-chart", [
        {
            data: d14,
            color: "#df4782"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART yee lee
	
	//BEGIN CHART tbm
    var d13 = [
        ["Jan", 93],
        ["Feb", 78],
        ["Mar", 47],
        ["Apr", 35],
        ["May", 48],
        ["Jun", 26]
    ];
    $.plot("#tbm-chart", [
        {
            data: d13,
            color: "#ffce54"
        }
    ], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART foh san

    //BEGIN CHART DOWNLOAD UPLOAD
    var d8_1 = [
        ["Jan", 67],
        ["Feb", 91],
        ["Mar", 36],
        ["Apr", 150],
        ["May", 28],
        ["Jun", 123],
        ["Jul", 38]
    ];
    var d8_2 = [
        ["Jan", 59],
        ["Feb", 49],
        ["Mar", 45],
        ["Apr", 94],
        ["May", 76],
        ["Jun", 22],
        ["Jul", 31]
    ];
    $.plot("#internet-speed-chart", [
        {
            data: d8_1,
            label: "Download",
            color: "#a01518"
        },
        {
            data: d8_2,
            label: "Upload",
            color: "#c1ca01"
        }
    ], {
        series: {
            lines: {
                show: !1
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 2,
                fill: .8
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });
    //END CHART DOWNLOAD UPLOAD
	
	
	


});

