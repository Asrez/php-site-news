
var my_sidebar = false;
function opennav()
{
    if(my_sidebar)
    {
        $('#sidemenu').addClass('d-none');
        my_sidebar = false;
    }
    else
    {
        $('#sidemenu').removeClass('d-none');
        my_sidebar = true;
    }
}
function closenav()
{
    $('#sidemenu').addClass('d-none');
    my_sidebar = false;
}

function o_submenu(e)
{
    var sub_menu = false;

    $(".s_menu1").find('.sub-menu').addClass('d-none');
    if(sub_menu)
    {
        $("#submenu_"+e).addClass('d-none');
        sub_menu = false;
    }
    else
    {
        $("#submenu_"+e).removeClass('d-none');
        sub_menu = true;
    }
}
// owl-carousel1 js
$('.owl-carousel1').owlCarousel({
    loop:false,
    rtl:true,
    margin:10,
    nav:true,
    navText: ['<i class="fas fa-angle-right"></i>', '<i class="fas fa-angle-left"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
//  end owl-carousel1 js

// owl-carousel2 js
$('.owl-carousel2').owlCarousel({
    loop:false,
    rtl:true,
    margin:10,
    nav:true,
    navText: ['<i class="fas fa-angle-right"></i>', '<i class="fas fa-angle-left"></i>'],
    dotsEach:true,
    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
//  end owl-carousel2 js

// owl-carousel3 js
$('.owl-carousel3').owlCarousel({
    autoplay:true,
    loop:true,
    rtl:true,
    margin:10,
    nav:true,
    navText: ['<i class="fas fa-angle-right"></i>', '<i class="fas fa-angle-left"></i>'],
    items:1,
    dots:false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }

})
//  end owl-carousel3 js

var my_filter = false;
function open_filter()
{
    if(my_filter)
    {
        $('.archive-filter').addClass('d-none');
        my_filter = false;
    }
    else
    {
        $('.archive-filter').removeClass('d-none');
        my_filter = true;
    }
}
// owl-carousel4 js
$('.owl-carousel4').owlCarousel({
    loop:true,
    rtl:true,
    margin:10,
    nav:true,
    navText: ['<i class="fas fa-angle-right"></i>', '<i class="fas fa-angle-left"></i>'],
    items:1,
    dots:false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }

})
//  end owl-carousel4 js
