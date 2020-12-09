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

