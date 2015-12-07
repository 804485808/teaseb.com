// JavaScript Document
$(document).ready(function () {

    $("div.motors-top-nav-right ul li:even").css("padding", "0");

    $("#dropdown").click(function () {
        $("#last").toggle();
    });
    $("#dropdown").mouseleave(function () {
        $("#last").hide();
    });
    $("div.motors-hotSearch ul li:even").css("padding", "0");

    $(".motors-Classification").slide({
        type: "menu",
        titCell: ".motors-feilei",
        targetCell: ".motors-Twonav",
        delayTime: 0,
        triggerTime: 10,
        trigger: "click",
        defaultPlay: false,
        returnDefault: true
    });
    $("#motors-slideBox").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        effect: "leftLoop",
        interTime: 6000,
        delayTime: 500,
        autoPlay: true,
        autoPage: true
    });
    $("#motors-tab").slide({
        titCell: ".hd li",
        mainCell: ".bd",
        effect: "fold",
        easing: "swing",
        delayTime: 500
    });
    $(".motors-imgscroll").slide({
        mainCell: ".bd ul",
        vis: 7,
        autoPage: true,
        effect: "leftLoop",
        easing: "swing",
        scroll: 1,
        trigger: "click",
        interTime: 2500
    });
    $(".motorsBd").hover(
        function () {
            $(this).find(".motors-prev,.motors-next").stop(true, true).fadeTo("show", 0.9);
        },
        function () {
            $(this).find(".motors-prev,.motors-next").fadeOut();
        }
    );
    $("#MProductsbox .motors-box").slide({ mainCell: "ul", vis: 3, scroll: 1, prevCell: ".motors-prev", nextCell: ".motors-next", effect: "leftLoop"});
    $("#MProductsbox").slide({
        titCell: ".motorsHd li",
        mainCell: ".motorsBd",
        easing: "swing",
        effect:"fold",
        delayTime: 500
    });
    $(".proBd").hover(
        function () {
            $(this).find(".proprev,.pronext").stop(true, true).fadeTo("show", 0.9);
        },
        function () {
            $(this).find(".proprev,.pronext").fadeOut();
        }
    );
    $(".motorsProductsBox .productBox").slide({ mainCell: "ul", vis: 4, scroll: 1, prevCell: ".proprev", nextCell: ".pronext", effect: "leftLoop"});
    $(".motorsProductsBox").slide({
        titCell: ".proHd li",
        mainCell: ".proBd",
        easing: "swing",
        effect: "fold",
        delayTime: 500
    });
    $("#tecbox").slide({
        titCell: ".hd li",
        mainCell: ".bd",
        effect:"fold",
        easing: "swing",
        delayTime: 500
    });
    $(".motors-tabexhibition").hover(
        function () {
            $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.9);
        },
        function () {
            $(this).find(".prev,.next").fadeOut();
        }
    );
    $(".motors-tabexhibition").slide({
        mainCell: ".bd ul",
        effect: "leftLoop",
        interTime: 6000,
        delayTime: 500,
        trigger: "click",
        autoPage: true,
        autoPlay: true
    });
    $("#MBbox").slide({
        titCell: ".hd li",
        mainCell: ".bd",
        effect: "fold",
        easing: "swing",
        delayTime: 500
    });
    $("#othermotorsBox").slide({
        titCell: ".hd li",
        mainCell: ".bd .motor-secondary-productlast",
        easing: "swing",
        delayTime: 800
    });
    $("#PartsBox").slide({
        titCell: ".hd li",
        mainCell: ".bd .motor-secondary-productlast",
        easing: "swing",
        delayTime: 800
    });
    $("#ProductsBox").slide({
        titCell: ".hd li",
        mainCell: ".bd .motor-secondary-productlast",
        easing: "swing",
        delayTime: 800
    });
    $(".motors-tabnews").hover(
        function () {
            $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.9);
        },
        function () {
            $(this).find(".prev,.next").fadeOut();
        }
    );
    $(".motors-tabnews").slide({
        mainCell: ".bd ul",
        effect: "leftLoop",
        interTime: 6000,
        delayTime: 500,
        trigger: "click",
        autoPage: true,
        autoPlay: true
    });
    $("div.motors-footer-nav ul li:even").css("padding", "0");
});
$(document).ready(function () {
    $("#show").click(function () {
        $("#classbox").show();
    });
    $("#hide").click(function () {
        $("#classbox").hide();
    });
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
        var docWidth=$(window).width();
        var conWidth=1100;
        var sjWidth=(docWidth-conWidth)/2;
        $('.Back-top').fadeIn().css("display","inline-block").css("right",sjWidth-32);
    } else {
        $('.Back-top').fadeOut();
    }
});
$('.Back-top').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, 300);
    return false;
});
$(document).ready(function(){
    $(window).resize(function() {
        var docWidth=$(window).width();
        var conWidth=1100;
        var sjWidth=(docWidth-conWidth)/2;
        if(docWidth<conWidth+80){
            $('.Back-top').css("right","0");
        }else{
            $('.Back-top').css("right",sjWidth-32);
        }
    });
});
/*Information start*/
$("#Figurebox").slide({
    titCell: ".hd li",
    mainCell: ".bd",
    effect: "left",
    easing: "swing",
    delayTime: 500
});
$(".info-textLast").slide({
    mainCell: ".bd ul",
    //effect: "leftLoop",
    interTime: 3500,
    delayTime: 800,
    autoPlay: false,
    nextCell: ".btn-next",
    autoPage: true,
    trigger: "click",
    easing: "swing"
});

$(document).ready(function () {
    $(".product_AllBrand").find("li").click(function(){
        if($(this).find(".fa-close").length==0){
            $(this).addClass("on");
            $(this).find("i").addClass("fa-close");
            $(this).find("i").show();
        }else{
            $(this).removeClass("on");
            $(this).find("i").removeClass("fa-close");
            $(this).find("i").hide();
        }
    });

    $(".down_icon").click(function () {
        var AttributesHeight = $(this).prev().height();
        if ($(this).find(".fa-angle-double-up").length == 0) {
            $(this).parent().animate({height: AttributesHeight}, "swing");
            $(this).find("i").removeClass("fa-angle-double-down");
            $(this).find("i").addClass("fa-angle-double-up");
        }
        else {
            $(this).parent().animate({height: 38}, "swing");
            $(this).find("i").removeClass("fa-angle-double-up");
            $(this).find("i").addClass("fa-angle-double-down");
        }
    });

    $("#btndown").click(function () {
        var Attgaodu = $("#Att_gaodu").val();
        var AttHeight = $("#Att-Height").val();
        if ($(this).find(".fa-angle-double-up").length == 0) {

            $(".product_BrandCountry").animate({height: AttHeight}, "swing");
            $("div.product_Attributes_Fold").removeClass("btn_down");
            $("div.product_Attributes_Fold").addClass("btn_up");
            $("div.product_Attributes_Foldicon").removeClass("product_Attributes_Folddown");
            $("div.product_Attributes_Foldicon").addClass("product_Attributes_Foldup");
            $("div.product_Attributes_Foldicon span").text("Less Options");
            $(this).find("i").removeClass("fa-angle-double-down");
            $(this).find("i").addClass("fa-angle-double-up");
            $(".btn_up").css("border-top","1px solid #fff");
        }
        else {
            $(".product_BrandCountry").animate({height: Attgaodu}, "swing");
            $("div.product_Attributes_Fold").removeClass("btn_up");
            $("div.product_Attributes_Fold").addClass("btn_down");
            $("div.product_Attributes_Foldicon").removeClass("product_Attributes_Foldup");
            $("div.product_Attributes_Foldicon").addClass("product_Attributes_Folddown");
            $("div.product_Attributes_Foldicon span").text("More Options");
            $(this).find("i").removeClass("fa-angle-double-up");
            $(this).find("i").addClass("fa-angle-double-down");
            $(".btn_down").css("border-top","1px solid #ddd");
        }
    });
    $(".pro_more_icon").each(function (index, element) {
        $(this).click(function () {
            var proSheight = $("#ulLast").val();
            var protopHeight = $("#proTopHeight").val();
            if ($(this).find(".fa-caret-up").length == 0) {
                $(this).find("i").removeClass("fa-caret-down");
                $(this).find("span").text("Less");
                $(this).find("i").addClass("fa-caret-up");
                $("#proheight").animate({height:proSheight}, "swing");
            }
            else {
                $(this).find("i").removeClass("fa-caret-up");
                $(this).find("span").text("More");
                $(this).find("i").addClass("fa-caret-down");
                $("#proheight").animate({height: protopHeight}, "swing");
            }
        });
    });
});
$(".MProducts_box").hover(
    function () {
        $(this).find(".Products_prev,.Products_next").stop(true, true).fadeTo("show", 0.9);
    },
    function () {
        $(this).find(".Products_prev,.Products_next").fadeOut();
    }
);
$(".Hot_newProducts .MProducts_box").slide({ mainCell: "ul", vis: 5, scroll: 1, switchLoad: "_src", prevCell: ".Products_prev", nextCell: ".Products_next", effect: "leftLoop"});
$(".Hot_newProducts").slide({
    titCell: ".ProductsHd li",
    mainCell: ".ProductsBd",
    targetCell: ".more a",
    effect: "fold",
    easing: "swing",
    delayTime: 800
});
$("#RecommendedBox").slide({
    titCell: ".hd li",
    mainCell: ".bd",
    effect: "fold",
    easing: "swing",
    delayTime: 500
});
$(".product_FeaturedBox").hover(
    function () {
        $(this).find(".Feature_prev,.Feature_next").stop(true, true).fadeTo("show", 0.9);
    },
    function () {
        $(this).find(".Feature_prev,.Feature_next").fadeOut();
    }
);
$(".product_FeaturedBox").slide({ mainCell: "ul", vis: 4, scroll: 1, switchLoad: "_src", prevCell: ".Feature_prev", nextCell: ".Feature_next", effect: "leftLoop"});
$(document).ready(function () {
    $(".Mobile_CommodityAttributes").click(function () {
        if ($(this).find(".fa-caret-up").length == 0) {
            $(".Mobile_productBrandCountry").slideDown("slow");
            $(this).find("i").removeClass("fa-caret-down");
            $(this).find("i").addClass("fa-caret-up");
        }
        else {
            $(".Mobile_productBrandCountry").slideUp("slow");
            $(this).find("i").removeClass("fa-caret-up");
            $(this).find("i").addClass("fa-caret-down");
        }
    });
});
/*Information end*/
/*productdetails*/
$("div.product-motors-top-nav-right ul li:even").css("padding", "0");
$(".product-btn-color").click(function () {
    var meunnav=$(".product-motors-last").css("height","auto").height();
    $(this).next().height(0).stop().animate({height:meunnav},500);
    $(this).next().addClass("on");
});
$("#Pdropdown").find("ul li").click(function () {
    var text=$(this).text();
    $("#text-meun").text(text);
});
$("#Pdropdown").mouseleave(function () {
    $(this).find(".product-motors-last").stop().animate({height:0},500,function(){
        $(this).removeClass("on");
    });
});
$("div.product-motors-hotSearch ul li:even").css("padding", "0");
$("#PreviewBox").slide({
    mainCell: ".bd ul",
    effect: "leftLoop",
    easing: "swing",
    delayTime: 500
});
$(".product_Complex").click(function () {
    $(".product_Complex").each(function () {
        $(this).removeClass("product_Complex_color");
    });
    var lengths = $(this).attr("class");
    var classs = lengths.split(" ").length;
    if (classs == 2) {
        $(this).removeClass("product_Complex_color");
    }
    else {
        $(this).addClass("product_Complex_color");
    }
});
$(".product_AgentsRangeLast .product_AgentsRange").each(function (index, element) {
    $(this).mouseenter(function () {
        $(this).next().show();
    });
    $(".product_AgentsRangeLast").mouseleave(function () {
        $(this).find(".Rangelast").hide();
    });
});
$(".product_Suppliersbox").slide({
    titCell: ".pr_lab",
    targetCell: ".pr_box",
    defaultIndex: 0,
    effect: "slideDown",
    easing: "swing",
    delayTime: 300,
    returnDefault: false
});

/*productdetails end*/
/*supplierslast start*/
$(".Suooliers_more").each(function (index, element) {
    $(this).click(function () {
        if ($(this).find(".fa-caret-up").length == 0) {
            $(this).prev().animate({height: $(this).parent().find(".Suooliers_boby").height() * 3}, "swing");
            $(this).find("i").removeClass("fa-caret-down");
            $(this).find("i").addClass("fa-caret-up");
            $(this).find("span").html("Less");
        } else {
            $(this).prev().animate({height: $(this).parent().find(".Suooliers_boby").height() / 3}, "swing");
            $(this).find("i").removeClass("fa-caret-up");
            $(this).find("i").addClass("fa-caret-down");
            $(this).find("span").html("More");
        }
    });
});
$(".suppliers_Hotproductbox").slide({
    mainCell: ".bd ul",
    effect: "leftLoop",
    interTime: 3500,
    delayTime: 800,
    autoPlay: false,
    prevCell: ".suppro_prev",
    nextCell: ".suppro_next",
    autoPage: true,
    trigger: "click",
    easing: "swing"
});
$(".info_Hotproductbox").slide({
    mainCell: ".bd ul",
    effect: "leftLoop",
    interTime: 3500,
    delayTime: 800,
    autoPlay: false,
    prevCell: ".info_prev",
    nextCell: ".info_next",
    autoPage: true,
    trigger: "click",
    easing: "swing"
});

$(".sup_Hotsearch_more").each(function (index, element) {
    $(this).click(function () {
        if ($(this).find(".fa-caret-up").length == 0) {
            $(this).prev().animate({height: $(".sup_Hotsearch_content").height() * 2}, "swing");
            $(this).find("i").removeClass("fa-caret-down");
            $(this).find("i").addClass("fa-caret-up");
            $(this).find("span").html("Less");
        } else {
            $(this).prev().animate({height: $(".sup_Hotsearch_content").height() * 0.5}, "swing");
            $(this).find("i").removeClass("fa-caret-up");
            $(this).find("i").addClass("fa-caret-down");
            $(this).find("span").html("More");
        }
    });
});

/*supplierslast end*/
$(".suppliers_nav").slide({
    type: "menu",
    titCell: ".sli",
    targetCell: ".sub",
    effect: "slideDown",
    delayTime: 300,
    triggerTime: 0,
    defaultPlay: true,
    easing: "swing",
    returnDefault: true
});

$(".Supplier_introduction_img").slide({
    mainCell: ".bd ul",
    easing: "swing",
    effect: "leftLoop"
});
$(".product_Hierarchy").find("#M_menu").mouseenter(function () {
    $(".Level_menu").slideDown();
});
$(".product_Hierarchy").mouseleave(function () {
    $(".Level_menu").slideUp();

});
$(".pronav").find(".proli").hover(
    function(){
        $(this).find("#pro-icon").show();
    },
    function(){
        $(this).find("#pro-icon").hide();
    }
);
$(".pro-directory").slide({
    type: "menu",
    titCell: ".proli",
    targetCell: ".prosub",
    effect: "slideDown",
    delayTime: 300,
    triggerTime: 0,
    defaultPlay: false,
    easing: "swing",
    returnDefault: false
});
$(".pro-directory").find(".proli").mouseenter(function(){
    $(this).find("span").css("background-color","#fff")
});
$(".pro-directory").find(".proli").mouseleave(function(){
    $(this).find("span").css("background-color","#f5f5f5")
});
$(".commodityBox").slide({
    mainCell: ".bd ul",
    easing: "swing",
    effect: "leftLoop"
});
$(".product_border").slide({
    type: "menu",
    titCell: ".bb",
    effect: "slideDown",
    delayTime: 100,
    triggerTime: 0,
    defaultPlay: true,
    easing: "swing",
    returnDefault: false
});

$(".tcdPageCode").createPage({
    pageCount: 10,
    current: 1,
    backFn: function (p) {
        console.log(p);
    }
});
$(".product_presentation").find("div").removeAttr("style");
$(".product_presentation").find("table").removeAttr("style");
$(".product_presentation").find("p").removeAttr("style");
$(".product_presentation").find("span").removeAttr("style");
$(".com_last ul li").click(function(){
    var fenlei=$(this).text();
    $("#com-feilei").find("span").html(fenlei);
});
$(".product-allCategories").hover(
    function(){
        $(".product-allCategories ul").slideDown(1);
        $(this).find("i").removeClass("fa-angle-down");
        $(this).find("i").addClass("fa-angle-up");
        $(".product-allCategories span").css("border-bottom", " 1px solid #fff");
    },function(){
        $(".product-allCategories ul").slideUp(1,function(){
            $(".product-allCategories span").css("border-bottom", " 1px solid #ddd");
        });
        $(this).find("i").removeClass("fa-angle-up");
        $(this).find("i").addClass("fa-angle-down");

    }
);
$(".motor-details-right").find("p").removeAttr("style");
$(".motor-details-right").find("p span").removeAttr("style");