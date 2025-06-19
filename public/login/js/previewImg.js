function previewImg() {
    const foto = document.querySelector ('#foto');
    const fotoLabel = document.querySelector ('.custom-file-label');
    const imgPreview = document.querySelector ('.img-preview');
    
    fotoLabel.textContent = foto.files[0].name;

    const filefoto = new FileReader();
    filefoto.readAsDataURL(foto.files[0]);

    filefoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

function previewProfile() {
    const user_image = document.querySelector ('#user_image');
    const fotoLabel = document.querySelector ('.custom-file-label');
    const imgPreview = document.querySelector ('.img-preview');
    
    fotoLabel.textContent = user_image.files[0].name;

    const filefoto = new FileReader();
    filefoto.readAsDataURL(user_image.files[0]);

    filefoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}