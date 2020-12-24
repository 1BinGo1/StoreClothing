let sections = document.querySelectorAll('span.section-link');
let contents = document.querySelectorAll('.content');

function blockChange(){
    let dropdown_section = document.getElementById('sections-title');
    dropdown_section.classList.remove('active');
    for (let i = 0; i < contents.length; i++){
        if (contents[i].classList.contains('active')){
            contents[i].classList.remove('active');
        }
    }
    for( let i = 0; i < sections.length; i++){
        if (sections[i].classList.contains('active')){
            sections[i].classList.remove('active');
        }
    }
    this.classList.add('active');
    if (this.classList.contains('dropdown-item')){
        dropdown_section.classList.add('active');
    }
    let new_active_content = document.getElementById(this.getAttribute('id').split('-')[0]);
    new_active_content.classList.add('active');
}

for( let i = 0; i < sections.length; i++){
    sections[i].addEventListener('click', blockChange);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let form_create_user = document.getElementById('form-create-user');
let form_create_product = document.getElementById('form-create-product');
let form_create_section = document.getElementById('form-create-section');
let form_create_category = document.getElementById('form-create-category');
let form_create_brand = document.getElementById('form-create-brand');

if (form_create_user !== null){
    form_create_user.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(this);
        executeAction(data, 'create-user');
    });
}

if (form_create_product !== null){
    form_create_product.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(this);
        executeAction(data, 'create-product');
    });
}

if (form_create_section !== null){
    form_create_section.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(this);
        executeAction(data, 'create-section');
    });
}

if (form_create_category !== null){
    form_create_category.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(this);
        executeAction(data, 'create-category');
    });
}

if (form_create_brand !== null){
    form_create_brand.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(this);
        executeAction(data, 'create-brand');
    });
}

function isEmptyObject(obj) {
    for (let i in obj) {
        if (obj.hasOwnProperty(i)) {
            return false;
        }
    }
    return true;
}

function removeError(){
    this.classList.remove('is-invalid');
    if (this.nextElementSibling !== null){
        this.nextElementSibling.remove();
    }
}

function executeAction(data, action){
    let path = null;
    let parent_title = null;
    if (action == "create-user"){
        path = '/admin/create-user';
        parent_title = "user";
    }
    else if (action == "create-product"){
        path = '/admin/create-product';
        parent_title = "product";
    }
    else if (action == "create-section"){
        path = '/admin/create-section';
        parent_title = "section";
    }
    else if (action == "create-category"){
        path = '/admin/create-category';
        parent_title = "category";
    }
    else if (action == "create-brand"){
        path = '/admin/create-brand';
        parent_title = "brand";
    }
    fetch(path, {
        method: 'POST',
        body: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).then(
        response => {
            return response.json();
        }
    ).then(
         text => {
             if (isEmptyObject(text)){
                 window.location.href = '/admin';
             }
             else{
                 let errors = document.querySelectorAll('.alert-danger');
                 for (let i = 0; i < errors.length; i++){
                     errors[i].previousElementSibling.classList.remove('is-invalid');
                     errors[i].remove();
                 }
                 for(let key in text){
                     let error = document.createElement('div');
                     error.classList.add('alert', 'alert-danger');
                     error.innerHTML = text[key];
                     let parent = document.getElementById(parent_title + "-" + key);
                     parent.classList.add('is-invalid');
                     parent.insertAdjacentElement('afterend', error);
                 }
             }
         }
    );
}

let options = document.querySelectorAll('option');

for (let i = 0; i < options.length; i++){
    options[i].addEventListener('click', changeOption);
}

function changeOption(){

}

let modals = document.querySelectorAll('.modal-dialog');
for (let i = 0; i < modals.length; i++){
    modals[i].addEventListener('change', changeModal);
}

function changeModal(){
    let modals = document.querySelectorAll('.modal-dialog');
    for (let i = 0; i < modals.length; i++){
        if (window.getComputedStyle(modals[i]).display === "none"){
            let alerts = modals[i].querySelector('.alert');
            for (let j = 0; j < alerts.length; j++){
                alerts[j].remove();
            }
        }
    }
}




