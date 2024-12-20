let counter = 0;
document.querySelector('.hero-image-container').addEventListener('click', () => {
    counter++;
    if(counter === 5){
        let audio = new Audio("/storage/music.mp3");
        audio.play();
    }
})
