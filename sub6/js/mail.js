// var uploadFile = document.getElementById('file');
var uploadBox = document.querySelector('.uploadBox dl')
var uploadInput = document.querySelector('.uploadBox input')
var uploadData = document.querySelector('.uploadBox dd')

if(uploadInput.files.length === 0) {
    let uploadResult = document.createElement('span');
    uploadResult.innerText = '선택된 파일이 없습니다.';
    uploadResult.classList = 'nofile';
    uploadData.appendChild(uploadResult);
    console.log('선택된 파일 없음');
}

uploadInput.addEventListener('change', updateFile);

function updateFile(e) {
    var uploadFile = e.target.files; // FileList 객체
    console.log(uploadFile); // { 0: File, 1: File, length: 2 }
    console.log(uploadFile[0]); //업로드된 파일의 정보를 보여줌
    
    if(uploadFile.length !== 0) {
        let lastChildText = uploadData.lastChild.innerText;
        if(lastChildText == '선택된 파일이 없습니다.' || lastChildText =='유효한 파일 형식이 아닙니다.') {
            uploadData.removeChild(uploadData.lastChild);
        } 

        fileReader(e);
        // if (lastChildClass == 'imgPreview') {
        //     uploadData.removeChild(uploadData.lastChild);
        // }
    }

    // fileReader(e);
}

function fileReader(e) {
    var uploadFile = e.target.files; // FileList 객체
    console.log(uploadFile); // { 0: File, 1: File, length: 2 }
    console.log(uploadFile[0]); //업로드된 파일의 정보를 보여줌

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
    console.log(file,file[0].type)
    return fileTypes.includes(file[0].type);
    }

    //파일리더 api
    var fileReader = new FileReader(); //객체 
    fileReader.readAsDataURL(e.target.files[0]); //주소로 반환해라
    fileReader.onload = function(e) { 
        console.log(e.target.result);
        if(validFileType(uploadFile)) {
        let imgPreview = document.createElement('div');
        imgPreview.classList = 'imgPreview';
        uploadData.appendChild(imgPreview);
        
        let imgInList = document.createElement('img');
        imgInList.src = e.target.result;
        imgInList.alt = '첨부파일 이미지 미리보기';
        console.log(imgInList.src);
        imgPreview.appendChild(imgInList);
        } else {
        let uploadResult = document.createElement('span');
        uploadResult.innerText ='유효한 파일 형식이 아닙니다.';
        uploadData.appendChild(uploadResult);
        }
    } 
}