// Active menu

$(function () { 
    if ("http://bayestree.appiness.co.in/" == window.location.href.split("/")[2]) 
      //local server
      // var e = window.location.href.split("/")[3]  
      // else 
      //   e = window.location.href.split("/")[4];     
    //test or live server 
        var e = window.location.href.split("/")[4]  
         else 
           e = window.location.href.split("/")[3]; 
    switch (e) { 
        case "": 
        case "home": 
        $(".home-link").addClass("menu-active"); 
        break;
        case "sainapse": 
        $(".sainapse-link").addClass("menu-active"); 
        break;
        case "science": 
        $(".science-link").addClass("menu-active"); 
        break;
        case "resources": 
        $(".resources-link").addClass("menu-active"); 
        break;
        case "about-us": 
        case "our-team":
        case "newsroom":
        $(".company-link").addClass("menu-active"); 
        break;
    } 
});