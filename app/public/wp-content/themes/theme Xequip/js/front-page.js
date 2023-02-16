


// import AAAA from "./modules/abc"


class frontpage{
    constructor(){
        this.display_hide = "none";
        this.display_show = "block";
        this.slideshow = document.getElementsByClassName("home-slideshow__container__holder");
        this.index_slideshow = 1;
        this.action_autoslide = null;
        this.cooldown_autoslide = 2000;


        this.btn_next = document.getElementById("home-slideshow-btn-next");
        this.btn_back = document.getElementById("home-slideshow-btn-back");
        this.Init();
    }

    Init(){
        this.btn_next.addEventListener("click", this.slideshow_add, false);
        this.btn_next.param_movingnumber = 1;
        this.btn_back.addEventListener("click", this.slideshow_add, false);
        this.btn_back.param_movingnumber = -1;
        // this.btn_next.addEventListener("click", function(){ this.slideshow_add(1)}, false);
        // this.btn_back.addEventListener("click", function(){ this.slideshow_add(1)}, false);

    }
    // slideshow_add(evt){
    //     console.log(evt.currentTarget.param_movingnumber);
    // }
    // // const
    // const display_hide = "none";
    // const display_show = "block";


    // // slide show button click
    // let slideshow = null;
    // let index_slideshow = 1;
    // auto slide
    // var action_autoslide =null;
    // const cooldown_autoslide = 2000;

    // Init_slideshow();
    // Init_slideshow_auto();
    Init_slideshow(){
        _frontpage.slideshow = document.getElementsByClassName("home-slideshow__container__holder");
        for (var i = 0; i < _frontpage.slideshow.length; i++) {
            _frontpage.slideshow[i].style.display = _frontpage.display_hide;
        }
        _frontpage.slideshow[_frontpage.index_slideshow-1].style.display = _frontpage.display_show;
    }
    slideshow_add(evt) {
        clearTimeout(_frontpage.action_autoslide);
        _frontpage.action_autoslide = null;
        _frontpage.index_slideshow += evt.currentTarget.param_movingnumber;
        let i;
        if (_frontpage.index_slideshow > _frontpage.slideshow.length) { _frontpage.index_slideshow = 1; }
        if (_frontpage.index_slideshow < 1) { _frontpage.index_slideshow = _frontpage.slideshow.length; }
        for (i = 0; i < _frontpage.slideshow.length; i++) { _frontpage.slideshow[i].style.display = _frontpage.display_hide; }
        _frontpage.slideshow[_frontpage.index_slideshow-1].style.display = _frontpage.display_show;
        console.log("click: " + _frontpage.index_slideshow);

        _frontpage.action_autoslide = setTimeout(_frontpage.Init_slideshow_auto, _frontpage.cooldown_autoslide);
    }
    Init_slideshow_auto() {
        _frontpage.index_slideshow++;
        let i;
        for (i = 0; i < _frontpage.slideshow.length; i++) { _frontpage.slideshow[i].style.display = _frontpage.display_hide; }
        if (_frontpage.index_slideshow > _frontpage.slideshow.length) { _frontpage.index_slideshow = 1; }
        _frontpage.slideshow[_frontpage.index_slideshow-1].style.display = _frontpage.display_show;
        console.log("autoslide: " + _frontpage.index_slideshow);

        _frontpage.action_autoslide = setTimeout(_frontpage.Init_slideshow_auto, _frontpage.cooldown_autoslide);
    }
}




const _frontpage = new frontpage()

// console.log(front.display_hide);
// console.log(front.display_show);
// console.log(front.slideshow);
// console.log(front.index_slideshow);
// console.log(front.action_autoslide);
// console.log(front.cooldown_autoslide);
// console.log(document.getElementsByClassName("home-slideshow__container__holder"));
_frontpage.Init_slideshow();
_frontpage.Init_slideshow_auto();




