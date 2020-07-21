window.onload = function() {
    let btn_active = document.querySelector('.btn-highlight').id;
    //console.log(btn_active);
    
    
    
};

// change image accroding to selected filter
function changeTopImg(elm){
    var parentElmCls = elm.parentElement.className;
    var topImg = document.querySelector('.TopCenter img');
    if(topImg.className != "") {
        document.querySelector('.TopCenter img').classList.remove(topImg.className);
    }
    document.querySelector('.TopCenter img').classList.add(parentElmCls);
    
    //elm.parentElement.style = "border: 1px solid #C8D2DE";
    
}

function saveFilteredImage(){ 
    var topImg = document.querySelector('.TopCenter img');
    var topImgCls = topImg.className;
    if(topImgCls=="filter1" || topImgCls == ""){
        alert("Please change filter to save image.");
        return;
    }
    var topImgSrc = topImg.src;
    // create a form with parameters to send to server
    var form = new FormData();
    form.append("p", 'fl');
    form.append('fl_name',topImgCls);
    form.append('fl_src',topImgSrc);
    
    var json;
        
    // send via XHR
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      
        if (xhr.readyState != 4 || xhr.status != 200)
            return;
          
        json = JSON.parse(xhr.responseText);  
        alert(json);
    }
    xhr.onload = function() {
        //console.log("load complete.")
    };
    

    xhr.open("post", "images.php", true);
    xhr.send(form);
    
    
    return true;
    
}

// show image
function showImageById(id,src) { 
    let subTitle = document.querySelector('.sub-title');
    subTitle.innerText = src;
}