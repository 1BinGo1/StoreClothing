let form_title = document.getElementById('title');
let form_excerpt = document.getElementById('excerpt');
let form_price = document.getElementById('price');
let form_body = document.getElementById('body');

let form_create = document.getElementById('form-create');
let form_edit = document.querySelector('.form-edit');

if (form_create !== null){
    form_create.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(form_create);
        executeCreate(data, 'create');
    });
}

if (form_edit !== null){
    form_edit.addEventListener('submit', function (e){
        e.preventDefault();
        let data = new FormData(form_edit);
        executeCreate(data, 'edit');
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

function executeCreate(data, action){
    fetch('/products/check_validate', {
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
                if (action == 'create'){
                    fetch('/products/store', {
                        method: 'POST',
                        body: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then(
                        response => {
                            return response.text();
                        }
                    ).then(
                        text =>{
                            window.location.href = '/products';
                        }
                    )
                }
                else if (action == 'edit'){
                    let id = form_edit.getAttribute('id').split('-')[1];
                    fetch('/products/update/' + id, {
                        method: 'POST',
                        body: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then(
                        response => {
                            return response.text();
                        }
                    ).then(
                        text =>{
                            window.location.href = '/products';
                        }
                    )
                }
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
                    let parent = document.getElementById(key);
                    parent.classList.add('is-invalid');
                    parent.insertAdjacentElement('afterend', error);
                }
            }
        }
    )
}

function removeError(){
    this.classList.remove('is-invalid');
    if (this.nextElementSibling !== null){
        this.nextElementSibling.remove();
    }
}

form_title.addEventListener('input', removeError);
form_excerpt.addEventListener('input', removeError);
form_price.addEventListener('input', removeError);
form_body.addEventListener('input', removeError);
