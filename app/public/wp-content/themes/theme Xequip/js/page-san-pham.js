


class pagesanpham{
    constructor(){

        // this.btn_item = document.getElementsByClassName("san-pham-body__column_1__Category__item");
        // this.btn_item_item = document.getElementsByClassName("san-pham-body__column_1__Category__item__item");
        this.Init();
    }

    Init(){
        // this.btn_item[0].addEventListener("click", this.Click, false);
        // print_r(this.btn_item);
        
    }

    Click($id){
        // console.log(_pagesanpham.btn_item[0].childNodes.item("4"));
        // console.log(_pagesanpham.btn_item[0].getElementsByTagName('div'));

        _pagesanpham.btn_current = document.getElementById($id);
        _pagesanpham.btn_current_children = _pagesanpham.btn_current.getElementsByTagName('div');
        for (var i = 0; i< _pagesanpham.btn_current_children.length; i++)
        {
            if (_pagesanpham.btn_current_children[i].getAttribute('id') == "child_" + $id) // any attribute could be used here
            {
                _pagesanpham.btn_current_children[i].classList.toggle("san-pham-body__column_1__Category__item__item__animation");
            }
        }
        // _pagesanpham.btn_item_item[0].classList.toggle("san-pham-body__column_1__Category__item__item__animation");
    }
}

const _pagesanpham = new pagesanpham()