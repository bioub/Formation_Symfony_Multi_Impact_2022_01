const nameEl = document.querySelector('#contact_name');

nameEl.addEventListener('focusout', () => {
    if (nameEl.value === '') {
        alert('Name est obligatoire')
    }
});