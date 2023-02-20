

const pagesanpham_clickcategory = {
	one_active: 0,
	multiple_active: 1,
}

class pagesanpham{
    constructor(){

        // this.btn_item = document.getElementsByClassName("san-pham-body__column_1__Category__item");
        // this.btn_item_item = document.getElementsByClassName("san-pham-body__column_1__Category__item__item");
        this.Init();
    }

    Init(){
        // this.btn_item[0].addEventListener("click", this.Click, false);
        console.log(WP_vars.parent_categoryID);
        if (WP_vars.parent_categoryID != null){
            this.btn_current_init = document.getElementById(WP_vars.parent_categoryID).getElementsByTagName('div');
            setTimeout(()=>
            {
                for (var i = 0; i< this.btn_current_init.length; i++)
                {
                    if (this.btn_current_init[i].getAttribute('id') == "child_" + WP_vars.parent_categoryID) // any attribute could be used here
                    {
                        this.btn_current_init[i].classList.add("san-pham-body__column_1__Category__item__item__animation");
                    }
                }
            }, 50);
        }
        

    }

    Click($id, $type){

        // _pagesanpham.btn_current = document.getElementById($id);
        // _pagesanpham.btn_current_children = _pagesanpham.btn_current.getElementsByTagName('div');
        // for (var i = 0; i < _pagesanpham.btn_current_children.length; i++)
        // {
        //     if (_pagesanpham.btn_current_children[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
        //     {
        //         _pagesanpham.btn_current_children[i].classList.toggle("san-pham-body__column_1__Category__item__item__animation");
        //     }
        // }

        // console.log($type);
        // if($type == pagesanpham_clickcategory.one_active){
        //     _pagesanpham.btn_alltopcategory = document.getElementsByClassName('san-pham-body__column_1__Category__item__item');
        //     for (var i = 0; i < _pagesanpham.btn_alltopcategory.length; i++)
        //     {
        //         if (_pagesanpham.btn_alltopcategory[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
        //         {
        //             _pagesanpham.btn_alltopcategory[i].classList.add("san-pham-body__column_1__Category__item__item__animation");
        //         }
        //         else{
        //             _pagesanpham.btn_alltopcategory[i].classList.remove("san-pham-body__column_1__Category__item__item__animation");
        //         }
        //     }
        // }


    }
}

const _pagesanpham = new pagesanpham()