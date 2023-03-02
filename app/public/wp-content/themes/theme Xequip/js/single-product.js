


class singleproduct{
    constructor(){
        // this.slideshow = document.getElementsByClassName("home-slideshow__container__holder");
        this.btn_mainproduct = document.getElementsByClassName("product-icon__main__child");
        this.btn_subproduct = document.getElementsByClassName("product-icon__sub__child");

        this.btn_alltab = document.getElementsByClassName("block-tabs__pannel__header__tab");
        this.btn_product_technical_detail = document.getElementById("product-technical-detail");
        this.btn_product_product_review = document.getElementById("product-review");

        this.abc = document.getElementsByClassName("block-tabs__pannel__body");
        this.Init();
        
    }

    Init(){
        // console.log(this.btn_mainproduct);
        // console.log(this.btn_subproduct);
        console.log(this.btn_product_technical_detail);
        console.log(this.btn_product_product_review);
        console.log(this.btn_alltab[0]);
        console.log(this.btn_alltab[1]);
        for (let i = 0; i < this.btn_subproduct.length; i++) {
            this.btn_subproduct[i].addEventListener("click", this.Button_subproduct, false);
            // console.log(this.btn_subproduct[i].src);
            this.btn_subproduct[i].param_element = this.btn_subproduct[i].src;
        }
        for (var i = 0; i < this.btn_alltab.length; i++) {
            this.btn_alltab[i].addEventListener("click", this.Button_product_detail, false);
            this.btn_alltab[i].param_element = this.btn_alltab[i].id;
        }
        
        // this.btn_next.param_movingnumber = 1;
    }
    

    Button_subproduct(param_element){
        // console.log(param_element.currentTarget.param_element);
        _singleproduct.btn_mainproduct[0].src = param_element.currentTarget.param_element;
        // _frontpage.slideshow = document.getElementsByClassName("home-slideshow__container__holder");
        // for (var i = 0; i < _frontpage.slideshow.length; i++) {
        //     _frontpage.slideshow[i].style.display = _frontpage.display_hide;
        // }
        // _frontpage.slideshow[_frontpage.index_slideshow-1].style.display = _frontpage.display_show;
    }
    Button_product_detail(param_element){
        console.log(param_element.currentTarget.param_element);
        for (var i = 0; i < _singleproduct.btn_alltab.length; i++) {
            if (_singleproduct.btn_alltab[i].id == param_element.currentTarget.param_element){
                _singleproduct.btn_alltab[i].classList.add("block-tabs__pannel__header__tab__active");

                jQuery.getJSON("http://xequip.local/wp-json/wp/v2/posts", (data, status, xhr)=>{
                    console.log(data);
                    console.log(status);
                    console.log(xhr.status);

                    
                    _singleproduct.abc[0].innerHTML = `
                        ${data.map(item => `<h2>${item.title.rendered}</h2>`).join('')}
                    `;
                });

                // jQuery.ajax({
                //     url: 'http://xequip.local/wp-json/wp/v2/posts',
                //     method: 'GET',
                //     success: function( data, txtStatus, xhr ) {
                //         console.log(data);
                //         console.log(txtStatus);
                //         console.log(xhr.status);
                //     }
                // });
            }
            else{
                _singleproduct.btn_alltab[i].classList.remove("block-tabs__pannel__header__tab__active");
            }

            // _frontpage.btn_alltab[i].style.display = _frontpage.display_hide;
        }
    }

}




const _singleproduct = new singleproduct()