function previewImage(file){
    console.log(1);
    var preview = document.querySelector('#preview');
    var reader = new FileReader();
    reader.onload = function(){
        preview.src = reader.result;
    }
    if(file){
        reader.readAsDataURL(file.files[0]);
        console.log(file.files[0]);
    }
    
}