const searchEditButton = document.getElementById('search-edit-button');
const searchDeleteButton = document.getElementById('search-delete-button');
const searchSelector = document.getElementById('search-select');
const searchDeleteForm = document.getElementById('search-delete-form');
const cardDeleteButtons = document.querySelectorAll('.card-delete-button');


searchDeleteButton.addEventListener('click', (e) => {
    e.preventDefault();
    const giftId = searchSelector.value;
    let action = '/gifts/' + giftId;
    searchDeleteForm.action = action;
    confirm('Are you sure you want to delete this gift?') ? searchDeleteForm.submit() : null;
});

searchEditButton.addEventListener('click', (e) => {
    e.preventDefault();
    const giftId = searchSelector.value;
    let action = '/gifts/' + giftId + '/edit';
    window.location.href = action;
});

cardDeleteButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        const form = button.parentElement;
        confirm('Are you sure you want to delete this gift?') ? form.submit() : null;
    });
})
