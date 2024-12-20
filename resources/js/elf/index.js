const searchAddAllButton = document.getElementById('search-all-add-button');
const searchAllSelector = document.getElementById('search-all-select');
const searchAddButton = document.getElementById('search-add-button');
const searchSelector = document.getElementById('search-select');


searchAddAllButton.addEventListener('click', (e) => {
    e.preventDefault();
    const childId = searchAllSelector.value;
    window.location.href = '/elf/child_gift/add/' + childId;
});

searchAddButton.addEventListener('click', (e) => {
    e.preventDefault();
    const childId = searchSelector.value;
    window.location.href = '/elf/child_gift/add/' + childId;
});
