


// import AAAA from "./modules/abc"

// const aaaa = new AAAA()




// const
const display_hide = "none";
const display_show = "block";


// slide show button click
let slideshow = null;
let index_slideshow = 1;
// auto slide
var action_autoslide =null;
const cooldown_autoslide = 2000;

Init_slideshow();
Init_slideshow_auto();
function Init_slideshow(){
    slideshow = document.getElementsByClassName("home-slideshow__container__holder");
    for (i = 0; i < slideshow.length; i++) {
        slideshow[i].style.display = display_hide;
    }
    slideshow[index_slideshow-1].style.display = display_show;
}
function slideshow_add(n) {
    clearTimeout(action_autoslide);
    action_autoslide = null;

    index_slideshow += n;
    let i;
    if (index_slideshow > slideshow.length) { index_slideshow = 1; }
    if (index_slideshow < 1) { index_slideshow = slideshow.length; }
    for (i = 0; i < slideshow.length; i++) { slideshow[i].style.display = display_hide; }
    slideshow[index_slideshow-1].style.display = display_show;
    console.log("click: " + index_slideshow);

    action_autoslide = setTimeout(Init_slideshow_auto, cooldown_autoslide);
}
function Init_slideshow_auto() {
    index_slideshow++;
    let i;
    for (i = 0; i < slideshow.length; i++) { slideshow[i].style.display = display_hide; }
    if (index_slideshow > slideshow.length) { index_slideshow = 1; }
    slideshow[index_slideshow-1].style.display = display_show;
    console.log("autoslide: " + index_slideshow);

    action_autoslide = setTimeout(Init_slideshow_auto, cooldown_autoslide);
}




