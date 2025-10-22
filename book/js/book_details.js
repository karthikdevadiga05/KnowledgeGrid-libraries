document.addEventListener('DOMContentLoaded', () => {


    // Image Carousel
    const mainImage = document.getElementById('main-book-image');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    const images = [
        'https://images.unsplash.com/photo-1588666301433-1428a49c4033?w=500&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=500&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1550399105-c4db5fb85c18?w=500&auto=format&fit=crop'
    ];
    let currentImageIndex = 0;

    function showImage(index) {
        mainImage.style.opacity = 0;
        setTimeout(() => {
            mainImage.src = images[index];
            mainImage.style.opacity = 1;
        }, 300); // Match CSS transition time
    }

    if(mainImage && prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            showImage(currentImageIndex);
        });

        nextBtn.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            showImage(currentImageIndex);
        });
    }
});