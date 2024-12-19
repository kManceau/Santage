export const christmasEgg = () => {
    if(document.querySelector('img[src="/storage/gifts/default.jpg"]')){
        const image = document.querySelector('img[src="/storage/gifts/default.jpg"]');
        let counter = 0;
        image.addEventListener('click', () => {
            counter++;
            if(counter === 5){
                window.open('https://youtu.be/Rt0spqQtMKg?si=G-lwX_W8cnvtQpb7','_blank');
            }
        })
    }
}
