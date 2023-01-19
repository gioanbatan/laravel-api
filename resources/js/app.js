import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// const deleteBtn = document.querySelectorAll('.delete-btn');

// deleteBtn.forEach((btn) => {
//     btn.addEventListener("click", (event) => { event.preventDefault(); })
// })

// Dynamic preview image

const inputImage = document.getElementById('cover_image');
const previewImageContainer = document.getElementById('image-preview-wrapper');
// const previewImage = document.getElementById('image-preview');

if (inputImage) {
    inputImage.addEventListener('change', function () {
        console.log(this);
        const uploadedImage = this.files[0];
        if (uploadedImage) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
                // previewImage.src = reader.result;
                previewImageContainer.innerHTML =
                    `<img id="image-preview" src="${reader.result}" alt="Immagine in upload">`;

            });
            reader.readAsDataURL(uploadedImage);
            console.log('changed image', typeof (inputImage), uploadedImage);
        }
    });
}