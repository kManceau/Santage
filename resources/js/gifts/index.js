const searchEditButton = document.getElementById('search-edit-button');
const searchDeleteButton = document.getElementById('search-delete-button');
const searchSelector = document.getElementById('search-select');
const searchDeleteForm = document.getElementById('search-delete-form');


searchDeleteButton.addEventListener('click', (e) => {
    e.preventDefault();
    const giftId = searchSelector.value;
    let action = '/gifts/' + giftId;
    searchDeleteForm.action = action;
    confirm('Are you sure you want to delete this gift?') ? searchDeleteForm.submit() : null;
});
