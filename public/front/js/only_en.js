let input = document.querySelector('.input-en');
input.addEventListener('input',() => {
    input.value = input.value.replace(/[а-яё]/gi,'');
});
