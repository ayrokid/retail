/*---LEFT BAR ACCORDION----*/
$(function() {
    $('#nav-accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
//        cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
    });
});

var Script = function () {

//    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function () {
        var o = ($(this).offset());
        diff = 250 - o.top;
        if(diff>0)
            $("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            $("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

//    sidebar toggle

    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.fa-bars').click(function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-210px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '210px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

// custom scrollbar
    $("#sidebar").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});

    $("html").niceScroll({styler:"fb",cursorcolor:"#e8403f", cursorwidth: '6', cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: '1000'});

// widget tools

    jQuery('.panel .tools .fa-chevron-down').click(function () {
        var el = jQuery(this).parents(".panel").children(".panel-body");
        if (jQuery(this).hasClass("fa-chevron-down")) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.panel .tools .fa-times').click(function () {
        jQuery(this).parents(".panel").parent().remove();
    });


//    tool tips

    $('.tooltips').tooltip();

//    popovers

    $('.popovers').popover();



// custom bar chart

    if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }


}();

function hapus(url, base) {
    bootbox.confirm("Apakah data akan dihapus?", function(result) {
        if (result){
            $.ajax({
                url: url,
                dataType: "JSON",
                timeout: 10000,
                success: function(data) {                    
                    if (data.back === 'true') {
                        bootbox.alert(data.msg, function(){
                            window.location = base;
                        });                    
                    }else{
                        bootbox.alert(data.msg);
                    }
                }, error: function(x, t, m) {
                    if (t === "timeout") {
                        bootbox.alert(m);
                    } else {
                        bootbox.alert(m);
                    }
                }
            });
        }
    }); 
}

function cetak(url, width) {
    var params = 'width=' + width;
    params += ', height=' + screen.height;
    params += ', fullscreen=yes,scrollbars=yes';
    window.open(url, '_blank', params);
}

$(document).ready(function(){
    //reload modal on hide
    $('#myModal').on('hidden.bs.modal', function () {
      window.location.reload();
    });
});

$(document).ready(function() {
    $('.currency').focusout(function(event) {
        var input = $(this);
        var val   = input.val();
        if(val == val.match(/^[a-z-A-Z]+$/) & val.length > 0){
            val = 0;
        }
        $('input[name='+input.attr('name')+']').val(formatDefault(val)).css('text-align','right');
    });

    $('.numeric').keyup(function(event) {
        var input = $(this);
        var val   = input.val();
        if(val == val.match(/^[a-z-A-Z]+$/) & val.length > 0){
            val = 0;
        }
        $('input[name='+input.attr('name')+']').val(val).css('text-align','right');
    });
});

function konversi(angka){ 
    return number_format(angka,2,'.',',');
}

function formatDefault(num) {
    num = num+"";
    num = num.toString().replace( /,/g, "" );    
    return number_format(num,2,'.',',');
}

function format_idr(val){
    return number_format(val,2,'.',',');
}

function number_format(num,dig,dec,sep) {
    x=new Array();
    s=(num<0?"-":"");
    num=Math.abs(num).toFixed(dig).split(".");
    r=num[0].split("").reverse();
    for(var i=1;i<=r.length;i++){x.unshift(r[i-1]);if(i%3==0&&i!=r.length)x.unshift(sep);}
    return s+x.join("")+(num[1]?dec+num[1]:"");
}

$(":input").attr('autocomplete', 'off');

if (top.location != location) {
    top.location.href = document.location.href ;
}

$(function(){
    window.prettyPrint && prettyPrint();
    $('.default-date-picker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.dpYears').datepicker();
    $('.dpMonths').datepicker();
});