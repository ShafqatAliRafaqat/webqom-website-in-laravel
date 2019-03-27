$(function () {

    var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')

    /***********************************/
    /********* TAB SHOPPING ************/

    //BEGIN JQUERY FLOT CHART
    var d1 = [
        ["Jan", 200],
        ["Feb", 120],
        ["Mar", 199],
        ["Apr", 157],
        ["May", 163],
        ["Jun", 192],
        ["Jul", 130],
        ["Aug", 126],
        ["Sep", 206],
		["Oct", 506],
		["Nov", 606],
		["Dec", 706]
    ];
    $.plot("#sp-chart-orders", [
        {
            data: d1,
            color: "#5cb85c"
        }
    ], {
        series: {
            lines: {
                show: !0,
                fill: true,
                fillColor: {
                    colors: [
                        {
                            opacity: 0.0
                        },
                        {
                            opacity: 0.6
                        }
                    ]
                }
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
    //END JQUERY FLOT CHART

    //BEGIN JQUERY KNOB
    $(".dial").knob({
        'draw': function () {
            $(this.i).val(this.cv + '%')
        },
        'fgColor': '#B8BEC8'
    });
    $({value: 0}).animate({value: $('.ls-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.ls-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    })
    $({value: 0}).animate({value: $('.ao-chart input').attr("rel")}, {
        duration: 5000,
        easing: 'swing',
        step: function () {
            $('.ao-chart input').val(Math.ceil(this.value)).trigger('change');
        }
    })
    //END JQUERY KNOB

    //BEGIN JQUERY ANIMATE NUMBER
    $('#revenue-number').animateNumber({
        number: 3579.95,
        numberStep: comma_separator_number_step
    }, 5000);
    $('#tax-number').animateNumber({
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

    /********* TAB SHOPPING ***********/
    /*********************************/
	
	
	
	
	//BEGIN AREA CHART SPLINE
    var d6_1 = [
        ["01/02", 367],
        ["01/03", 791],
        ["01/04", 436],
        ["01/05", 550],
        ["01/06", 328],
        ["01/07", 523],
        ["01/08", 449]
    ];
    var d6_2 = [
        ["01/02", 159],
        ["01/03", 449],
        ["01/04", 345],
        ["01/05", 194],
        ["01/06", 556],
        ["01/07", 222],
        ["01/08", 321]
    ];
    $.plot("#area-chart-spline", [
        {
            data: d6_1,
            label: "This Week",
            color: "#df4782"
        },
        {
            data: d6_2,
            label: "Last Week",
            color: "#3DB9D3"
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
    //END AREA CHART SPLINE
	
	//BEGIN AREA CHART
    var d5_1 = [
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
    var d5_2 = [
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
            data: d5_1,
            label: "This Year",
            color: "#ffce54"
        },
        {
            data: d5_2,
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

});

