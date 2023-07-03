"use strict";
const pureScriptSelect = (selector) => {
    let selectors = document.querySelectorAll(selector);
    
    function eventDelegation(event, psSelector, program) {
        document.body.addEventListener(event, function(e) {
            document.querySelectorAll(psSelector).forEach(elem => {
                if (e.target === elem) {
                    program(e);
                }
            })
        });
    }

    let optionValues = {
        [document.querySelector(selector).getAttribute('id')]: eval(document.querySelector(selector).getAttribute('data-multiSelect'))
    };

    

    let isMax = {
        [document.querySelector(selector).getAttribute('id')]: eval(document.querySelector(selector).getAttribute('data-max'))
    };
  
    selectors.forEach((item, index) => {
        const multiSelect = item.getAttribute('data-multiSelect');
        const isSearch = item.getAttribute('data-isSearch');
        
        function multiSelects(){
            let defaultValues = {
                [document.querySelector(selector).getAttribute('id')]: document.querySelector(selector).getAttribute('data-default') ? eval(document.querySelector(selector).getAttribute('data-default')) : []
            };
            const arraySelector = item.getAttribute('id');            
            const hiddenInput = item.querySelector('input[type="hidden"]'); 

            let virtualSelect = document.createElement('div');
            virtualSelect.classList.add('directorist-select__container');
            item.append(virtualSelect);
            item.style.position = 'relative';
            item.style.zIndex = '0';
            let sibling = item.querySelector('.directorist-select__container'),
            option = optionValues[arraySelector];

            let html = `
            <div class="directorist-select__label">
                <div class="directorist-select__selected-list"></div>
                <input type="text" class='directorist-select__search ${ isSearch ? 'directorist-select__search--show' : 'directorist-select__search--hide' }' type='text' class='value' placeholder='Filter Options....' />
            </div>
            <div class="directorist-select__dropdown">            
                <div class="directorist-select__dropdown--inner"></div>
            </div>
            <span class="directorist-error__msg"></span>`;

            function insertSearchItem () {
                item.querySelector('.directorist-select__selected-list').innerHTML = defaultValues[arraySelector].map(item => `<span class="directorist-select__selected-list--item">${item}&nbsp;&nbsp;<a href="#" data-key="${item}" class="directorist-item-remove"><i class="fa fa-times"></i></a></span>`).join("")
            }

            sibling.innerHTML = html;            
            const button = sibling.querySelector('.directorist-select__label');            
            insertSearchItem();
                                                
            document.body.addEventListener('click', (event) => {                        
                if(event.target == button || event.target.closest('.directorist-select__container')){
                    return;
                } else {
                    sibling.querySelector('.directorist-select__dropdown').classList.remove('directorist-select__dropdown-open');
                }                
            });
            
            button.addEventListener('click', (e) => {

                e.preventDefault();
                var value = item.querySelector('input[type="text"]');
                value.focus();

                document.querySelectorAll('.directorist-select__dropdown').forEach(el => el.classList.remove('directorist-select__dropdown-open'));
                e.target.closest('.directorist-select__container').querySelector('.directorist-select__dropdown').classList.add('directorist-select__dropdown-open');
                                                
                var popUp = item.querySelector('.directorist-select__dropdown--inner');
                
                var item2 = '<ul>';
                option.forEach((el, key) => {  
                    item2 += `<li data-key="${el}" class="directorist-select-item-hide">${el}</li>`;
                });
                item2 += '</ul>';
                
                popUp.innerHTML = item2;
                var li = item.querySelectorAll('li');

                li.forEach((element, index) => { 
                    element.classList.remove('directorist-select-item-show');
                    element.classList.add('directorist-select-item-hide');
                    if(defaultValues[arraySelector].includes(element.getAttribute('data-key'))){                          
                        element.classList.add('directorist-select-item-show');
                        element.classList.remove('directorist-select-item-hide');
                    }
                });
                                    
                value && value.addEventListener('keyup', (event) => {     
                                   
                    var itemValue = event.target.value.toLowerCase();
                    var filter = option.filter((el, index) => {                       
                            return el.toString().toLowerCase().startsWith(itemValue);
                        });
                    
                    
                        
                    var elem = [];
                    optionValues[arraySelector].forEach((el, index) => {
                        filter.forEach(e => {                            
                            if(el.toLowerCase() == e.toLowerCase()){
                                elem.push(el);                                            
                            } 
                        });    
                    });
                    
                    var item2 = '<ul>';                
                    elem.forEach((el) => {
                        item2 += `<li data-key="${el}" class="directorist-select-item-hide">${el}</li>`;
                    });
                    item2 += '</ul>';
                    
                    var popUp = item.querySelector('.directorist-select__dropdown--inner');
                    popUp.innerHTML = item2;
                    var li = item.querySelectorAll('li');

                    
                    li.forEach((element, index) => {
                        element.classList.remove('directorist-select-item-show');
                        element.classList.add('directorist-select-item-hide');
                        if(defaultValues[arraySelector].includes(element.getAttribute('data-key'))){                          
                            element.classList.add('directorist-select-item-show');
                            element.classList.remove('directorist-select-item-hide');
                        }                       
                        element.addEventListener('click', (event) => {                            
                            sibling.querySelector('.directorist-select__dropdown--inner').classList.remove('directorist-select__dropdown.open');                                                
                        });
                    });
                });
                     
                eventDelegation('click', 'li', function(e){
                    var index = e.target.getAttribute('data-key');
                    var closestId = e.target.closest('.directorist-select').getAttribute('id');
                    
                    document.querySelectorAll('.directorist-select__dropdown').forEach(el => el.classList.remove('directorist-select__dropdown-open'));
                                                         
                                                      
                    defaultValues[closestId].filter(item => item == index ).length === 0 &&  defaultValues[closestId].push(index);
                   
                    hiddenInput.value = JSON.stringify(defaultValues[closestId]);                        
                    e.target.classList.remove('directorist-select-item-hide');
                    e.target.classList.add('directorist-select-item-show');
                    insertSearchItem();
                });
            });

            eventDelegation('click', '.directorist-item-remove', function(e){
                var li = item.querySelectorAll('li');
                var closestId = e.target.closest('.directorist-select').getAttribute('id');
                
                defaultValues[closestId] = defaultValues[closestId] && defaultValues[closestId].filter(item => item != e.target.getAttribute('data-key'));
                if((defaultValues[closestId] && defaultValues[closestId].length) < (isMax[closestId] && parseInt(isMax[closestId]))){
                    e.target.closest('.directorist-select').querySelector('.directorist-select__container').classList.remove('directorist-error');
                    e.target.closest('.directorist-select').querySelector('.directorist-error__msg').innerHTML = '';
                }

                li.forEach((element, index) => { 
                    element.classList.remove('directorist-select-item-show');
                    element.classList.add('directorist-select-item-hide');
                    if(defaultValues[closestId].includes(element.getAttribute('data-key'))){ 

                        element.classList.add('directorist-select-item-show');
                        element.classList.remove('directorist-select-item-hide');
                    }
                });
                insertSearchItem();                
                hiddenInput.value = JSON.stringify(defaultValues[closestId]);
            });            
        }

        multiSelect ? multiSelects() : singleSelect();
       
    });  
}