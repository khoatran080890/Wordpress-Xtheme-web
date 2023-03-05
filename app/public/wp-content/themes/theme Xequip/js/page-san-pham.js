

const pagesanpham_clickcategory = {
	one_active: 0,
	multiple_active: 1,
}

class pagesanpham{
    constructor(){

        // this.btn_item_parent = document.getElementsByClassName("san-pham-body__column_1__Category__item__parent");
        // this.btn_item_item = document.getElementsByClassName("san-pham-body__column_1__Category__item__item");
        this.content = document.getElementById("content");
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
        for (var i = 0; i < _pagesanpham.btn_current_children.length; i++)
        {
            if (_pagesanpham.btn_current_children[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
            {
                _pagesanpham.btn_current_children[i].classList.toggle("san-pham-body__column_1__Category__item__child__animation");
            }
        }

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
    Click_showitem($id_category){
        console.log($id_category);
        jQuery.getJSON(WP_vars.root_url + "/wp-json/api/v1/" + "get_products_info", (data, status, xhr)=> {
            // console.log(data);
            // console.log(status);
            // console.log(xhr.status);
            
            _pagesanpham.content.innerHTML = `
                <div class="container_product_item">
                ${data.length > 0 ? 
                `
                ${data.map(item => `
                    <div class="container_product_item__box">
                        <a href="${item.permalink}">
                        <img class="container_product_item__box__icon" src="http://xequip.local/wp-content/themes/theme%20Xequip/images/slideshow/apples.jpg" alt="test icon" />
                        <p class="title title__small title__post-title container_product_item__box__price">${item.price_presale}</p>
                        <p class="title title__small title__post-title container_product_item__box__title">${item.title}</p>
                        <p class="title title__small title__post-title container_product_item__box__sold">Đã bán: ${item.sold}</p>
                        </a>
                            
                    </div>
                `).join('')}
                </div>
                ` :
                `No data added`
                }
                
            `;
        });
    }

}

const _pagesanpham = new pagesanpham()