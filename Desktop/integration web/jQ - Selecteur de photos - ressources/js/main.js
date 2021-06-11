"use strict"

function onclickLI(){
    $(this).toggleClass("selected");
    let selected = $("li.selected").length;
    total.text(selected);
    //total.html(selected);
}

function selectALLFunction(){
    photos.addClass("selected");
    let selected = $("li.selected").length;
    total.text(selected);
}

function removeALLFunction(){
    photos.removeClass("selected");
    let selected = $("li.selected").length;
    total.text(selected);
}

const total = $("#total em");
const photos = $(".photo-list li");
const selectAll = $("#selectAll");
const deselectAll = $("#deselectAll");

photos.on("click", onclickLI);
selectAll.on("click", selectALLFunction);
deselectAll.on("click", removeALLFunction);

/*
var total = 0;

$("li").click(function(){
    total++;
    document.getElementById(".total").innerHTML = total;
});
$("li").trigger("click");

$("em").html()
$("#total em")
*/
