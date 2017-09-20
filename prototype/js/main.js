
$(document).ready(function(){
    
    var  getMenuHeight = $(".header").height();
	//console.log(getMenuHeight);
    $(".content").css("padding-top", getMenuHeight);

    var  getFooterHeight = $(".footer").height();
	//console.log(getMenuHeight);
    $(".content").css("padding-bottom", getFooterHeight);
});





