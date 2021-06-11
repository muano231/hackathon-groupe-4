// déclaration de la fonction
function toggleRectangle(){
    RECT.toggle('slow');
}

function hover(){
    RECT.addClass("important");
}

function doubleClick(){
    RECT.addClass("good");
}

function out(){
    RECT.removeClass("important good");
}

const RECT = $(".rectangle");

$("#toggle-rectangle").on("click",toggleRectangle);
RECT.on("mouseover",hover);
RECT.on("dblclick",doubleClick);
RECT.on("mouseout",out);

/*
RECT.hover(function(){
    RECT.css("background-color","red");
}, function(){
    RECT.css("background-color","#3f5efb");
});

RECT.dblclick(function(){
    RECT.css("background-color","green")
});
*/
