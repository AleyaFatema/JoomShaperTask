function _(x){
    //function to avoid repetition of: document.getElementById(x)
    return document.getElementById(x);
}

function goBack() {
  window.history.back();
}

/* Upload file using ajax post method */
function uploadFileWithAjax(param,control) {
    return new Promise(function (resolve, reject) {
        
        // create a form with parameters to send to server
    var form = new FormData();
    form.append("p", param);
    form.append("photo", control.files[0]);
    
        var request = new XMLHttpRequest();

        request.overrideMimeType("application/json");
        
        
        request.open('POST', 'images.php', true);
        request.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    resolve({status: this.status, body: JSON.parse(this.responseText)});
                } else {
                    reject({status: this.status, body: this.responseText});
                }
            }
        };

        request.send(form);
    });
}




/**
Rotate element
*/

function rotateElem() { 
    document.querySelector('.box').style.transform = 'rotate(90deg)'; 
}