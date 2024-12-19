import { christmasEgg } from '../christmasEgg.js';

const giftSelect = document.getElementById('gift-select');
const giftName = document.getElementById('gift-name');
const giftDescription = document.getElementById('gift-description');
const giftCategory = document.getElementById('gift-category');
const giftAvif = document.getElementById('gift-avif');
const giftWebp = document.getElementById('gift-webp');
const giftJpg = document.getElementById('gift-jpg');

const getGiftInfo = () => {
    const giftId = giftSelect.value;
    let gift = getGiftById(giftId);
    replaceGiftInfos(gift);
}

const getGiftById = (giftId) => {
    return gifts.find(gift => gift.id === Number(giftId));
}

function imageExists(imageName) {
    return imageList.includes(imageName);
}

const replaceGiftInfos = (gift) => {
    giftName.textContent = gift.name;
    giftDescription.textContent = gift.description;
    giftCategory.textContent = categories.find(category => category.id === gift.category_id).name;
    if (imageExists(gift.id + '.avif')) {
        giftAvif.src = '/storage/gifts/'+ gift.id + '.avif';
        giftWebp.src = '/storage/gifts/'+ gift.id + '.webp';
        giftJpg.src = '/storage/gifts/'+ gift.id + '.jpg';
    } else {
        giftAvif.src = '/storage/gifts/default.avif';
        giftWebp.src = '/storage/gifts/default.webp';
        giftJpg.src = '/storage/gifts/default.jpg';
    }
    christmasEgg();
}


getGiftInfo();
giftSelect.addEventListener('change', () => {
    getGiftInfo()
});
