let uploadBox = document.querySelector('.uploadBox dl')
let uploadInput = document.querySelector('.uploadBox input')
let uploadData = document.querySelector('.uploadBox dd')
let imgPreview = document.querySelector('.imgPreview');

if(uploadInput.files.length === 0) {
    let uploadResult = document.createElement('span');
    uploadResult.innerText = '*선택된 파일이 없습니다. 이미지 형식만 가능합니다.';
    uploadResult.className = 'nofile';
    uploadData.appendChild(uploadResult);
}

uploadInput.addEventListener('change', updateFile);

function updateFile(e) {
    let uploadFile = e.target.files; // FileList 객체
     console.log(uploadFile); // { 0: File, 1: File, length: 2 }
     console.log(uploadFile[0]); //업로드된 파일의 정보를 보여줌
    
    if(uploadFile.length !== 0) {
        let lastChildText = uploadData.lastChild.innerText;
        if(lastChildText == '*선택된 파일이 없습니다. 이미지 형식만 가능합니다.' || lastChildText =='유효한 파일 형식이 아닙니다.') {
            uploadData.removeChild(uploadData.lastChild);
        } 
        fileReader(e);
    }
}

function fileReader(e) {
    let uploadFile = e.target.files; // FileList 객체

    //validFileType() 매개변수로 file객체 받아 type이 fileTypes 값과 동일한지 판단
    const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon"
    ];

    function validFileType(file) {
    return fileTypes.includes(file[0].type);
    }

    //파일리더 api
    let fileReader = new FileReader(); //객체 

    //주소 반환해라_이미지 -> base64로 인코딩(클라이언트 측에서만)
    fileReader.readAsDataURL(e.target.files[0]); 
    fileReader.onload = function(e) { 
        if (imgPreview.children.length == 1 ) {
            imgPreview.classList.remove('on')
            imgPreview.classList.add('off') 
            imgPreview.removeChild(imgPreview.firstChild);
        }
        
        if(validFileType(uploadFile)) {
            let imgInList = document.createElement('img');
            imgInList.src = e.target.result;
            imgInList.alt = '첨부파일 이미지 미리보기';
            imgPreview.appendChild(imgInList);

            imgPreview.classList.remove('off')
            imgPreview.classList.add('on') 
        } else {
            let uploadResult = document.createElement('span');
            uploadResult.innerText ='유효한 파일 형식이 아닙니다.';
            uploadResult.className = 'invalidType';
            uploadData.appendChild(uploadResult);
        }
    } 
}