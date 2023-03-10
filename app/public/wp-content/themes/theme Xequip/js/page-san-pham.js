

const pagesanpham_clickcategory = {
	one_active: 0,
	multiple_active: 1,
}

class pagesanpham{
    constructor(){

        // this.btn_item_parent = document.getElementsByClassName("san-pham-body__column_1__Category__item__parent");
        // this.btn_item_item = document.getElementsByClassName("san-pham-body__column_1__Category__item__item");
        this.content = document.getElementById("content");
        this.body = document.body;
        this.Init();
    }

    Init(){
        // console.log(this.content);
        // this.btn_item_parent[0].addEventListener("click", this.Click_showdropdown, false);

        // console.log(WP_vars.parent_categoryID);
        // if (WP_vars.parent_categoryID != null){
        //     this.btn_current_init = document.getElementById(WP_vars.parent_categoryID).getElementsByTagName('div');
        //     setTimeout(()=>
        //     {
        //         for (var i = 0; i< this.btn_current_init.length; i++)
        //         {
        //             if (this.btn_current_init[i].getAttribute('id') == "child_" + WP_vars.parent_categoryID) // any attribute could be used here
        //             {
        //                 this.btn_current_init[i].classList.add("san-pham-body__column_1__Category__item__child__animation");
        //             }
        //         }
        //     }, 50);
        // }
    }

    Click_showdropdown($id, $type){
        _pagesanpham.btn_current = document.getElementById($id);
        _pagesanpham.btn_current_children = _pagesanpham.btn_current.getElementsByTagName('div');
        // for (var i = 0; i < _pagesanpham.btn_current_children.length; i++)
        // {
        //     if (_pagesanpham.btn_current_children[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
        //     {
        //         _pagesanpham.btn_current_children[i].classList.toggle("san-pham-body__column_1__Category__item__child__animation");
        //     }
        // }

        if($type == pagesanpham_clickcategory.one_active){
            _pagesanpham.btn_alltopcategory = document.getElementsByClassName('san-pham-body__column_1__Category__item__child');
            for (var i = 0; i < _pagesanpham.btn_alltopcategory.length; i++)
            {
                if (_pagesanpham.btn_alltopcategory[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
                {
                    _pagesanpham.btn_alltopcategory[i].classList.add("san-pham-body__column_1__Category__item__child__animation");
                }
                else{
                    _pagesanpham.btn_alltopcategory[i].classList.remove("san-pham-body__column_1__Category__item__child__animation");
                }
            }
        }
    }


    Click_showitem($id_category, $post_per_page){
        console.log($id_category);
        console.log($post_per_page);

        jQuery.getJSON(WP_vars.root_url + "/wp-json/api/v1/" + "get_products_info", (data, status, xhr)=> {
            console.log(data);
            console.log(status);
            console.log(xhr.status);
            console.log(_pagesanpham);


            
            _pagesanpham.content.innerHTML = '';
            // _pagesanpham.content.innerHTML = `
            //     <div class="container_product_item">
            //     ${data.length > 0 ? 
            //     `
            //     ${data.map(item => 
            //         item.id_category == $id_category ?
            //         `
            //         <div class="container_product_item__box">
            //             <a href="${item.permalink}">
            //             <img class="container_product_item__box__icon" src="http://xequip.local/wp-content/themes/theme%20Xequip/images/slideshow/apples.jpg" alt="test icon" />
            //             <p class="title title__small title__post-title container_product_item__box__price">${item.price_presale}</p>
            //             <p class="title title__small title__post-title container_product_item__box__title">${item.title}</p>
            //             <p class="title title__small title__post-title container_product_item__box__sold">Đã bán: ${item.sold}</p>
            //             </a>
            //         </div>
            //         ` : ``
            //     ).join('')}
            //     </div>
            //     ` :
            //     `No data added`
            //     }
            // `;
            var final_data = data.filter(x => x.id_category == $id_category);
            console.log(final_data);
            var string_builder_product = "";
            string_builder_product += '<div class="container_product_item">';
            var count = 1;
            var id = 1;
            for (let i = 0; i < final_data.length; i++) {
                string_builder_product += '<div class="container_product_item__box';
                string_builder_product += (id != 1) ? ' container_product_item__box__animation' : '';
                string_builder_product += '" id="' + id + '" ';
                string_builder_product += 'onclick="_pagesanpham.Click_product()">';
                // string_builder_product += '<a href=' + final_data[i].permalink + '>';
                string_builder_product += '<img class="container_product_item__box__icon" src="http://xequip.local/wp-content/themes/theme%20Xequip/images/slideshow/apples.jpg" alt="test icon" />';
                string_builder_product += '<p class="title title__small title__post-title container_product_item__box__price">' + final_data[i].price_presale + '</p>';
                string_builder_product += '<p class="title title__small title__post-title container_product_item__box__title">' + final_data[i].title + '</p>';
                string_builder_product += '<p class="title title__small title__post-title container_product_item__box__sold">Đã bán: ' + final_data[i].sold + '</p>'
                string_builder_product += '</a>';
                string_builder_product += '</div>';

                if (count == $post_per_page){
                    count = 1;
                    id ++;
                }
                else{
                    count++;
                }
            }
            string_builder_product += '</div>';
            _pagesanpham.content.innerHTML += string_builder_product;
            


            var total_page = Math.ceil(final_data.length / $post_per_page);
            var string_builder_paginate = "";
            string_builder_paginate += '<div class="paginate-container"><a class="prev page-numbers"><</a>';
            for (let i = 0; i < total_page; i++) {
                string_builder_paginate += '<a class="page-numbers ';
                string_builder_paginate += (i == 0) ? 'page-numbers__current' : '';
                string_builder_paginate += '" onclick="_pagesanpham.Click_paginate(' + (i + 1) + ')" ';
                string_builder_paginate += 'id="' + (i + 1) + '"';
                string_builder_paginate += '>' + (i + 1) + '</a>';
            }
            string_builder_paginate += '<a class="next page-numbers">></a></div>';
            _pagesanpham.content.innerHTML += string_builder_paginate;


        });
    }

    Click_paginate($paginate_number){
        // set up product
        console.log($paginate_number);
        _pagesanpham.product_all = document.getElementsByClassName('container_product_item__box');
        // _pagesanpham.product_in_page = document.getElementById($paginate_number);

        for (var i = 0; i < _pagesanpham.product_all.length; i++)
        {
            if (_pagesanpham.product_all[i].getAttribute('id') == $paginate_number)
            {
                _pagesanpham.product_all[i].classList.remove("container_product_item__box__animation");
            }
            else{
                _pagesanpham.product_all[i].classList.add("container_product_item__box__animation");
            }
        }

        // set up paginate
        _pagesanpham.paginate_all = document.getElementsByClassName('page-numbers');
        for (var i = 0; i < _pagesanpham.paginate_all.length; i++)
        {
            if (_pagesanpham.paginate_all[i].getAttribute('id') == $paginate_number)
            {
                _pagesanpham.paginate_all[i].classList.add("page-numbers__current");
            }
            else{
                _pagesanpham.paginate_all[i].classList.remove("page-numbers__current");
            }
        }
    }

    Click_product(){
        _pagesanpham.product_pannel_background = document.getElementsByClassName('san-pham-body-detail');
        _pagesanpham.product_pannel_background[0].classList.toggle("san-pham-body-detail__hidden");
        console.log('product');
        // disable scroll
        
        _pagesanpham.body.classList.toggle("no-scroll");
    }

    Click_productdetail_background(){
        _pagesanpham.product_pannel_background = document.getElementsByClassName('san-pham-body-detail');
        _pagesanpham.product_pannel_background[0].classList.toggle("san-pham-body-detail__hidden");
        console.log('background');

        _pagesanpham.body.classList.toggle("no-scroll");
    }
    Click_productdetail_background_pannel($event){
        $event.stopPropagation()
        console.log('pannel');
    }
}

const _pagesanpham = new pagesanpham()