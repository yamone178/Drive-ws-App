

if (contactImgInput){
    contactImgInput.addEventListener('change',function (){
        let currentFile=  this.files[0];



        let reader= new FileReader();
        console.log(reader)
        reader.onload=function (e){

            console.log(e.target.result);
            contactImgArea.classList.add('d-none')
            outputImg.classList.remove('d-none')
            outputImg.classList.add('d-block')
            outputImg.src= e.target.result

        }
        reader.readAsDataURL(currentFile)
    })

}
