/* 
 * Fetch images from folder
 * After the dom is loaded
 */

window.onload = function() { // same as window.addEventListener('load', (event) => {
    
    var r = new XMLHttpRequest();
    r.open("POST", "images.php", true);
    // Send the proper header information along with the request
    r.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    r.onreadystatechange = function () { // Call a function when the state changes.

        if (r.readyState != 4 || r.status != 200)
            return;
        
        var json = JSON.parse(r.responseText);
        
        var count = 0;
        Object.keys(json).forEach(key => {

            // Get the parent node
            var parentNode = document.querySelector('.grid');

            // create elements and add to parent node
            var newLI = document.createElement('li');
        
            var anchorLink = document.createElement('a');
            /*      anchorLink.setAttribute("target", '_blank');*/
            anchorLink.setAttribute("href", '#');
            anchorLink.setAttribute("id", 'img_' + key);  
            //anchorLink.setAttribute("class", 'gallery_img');
            anchorLink.setAttribute("onclick", 'openImagePage(' + key + ')');
            
            var img = document.createElement('img');
            img.setAttribute("src", json[key]);
            img.setAttribute("alt", json[key]);
            img.setAttribute("height", '150px');
            img.setAttribute("weight", '300px');
            img.setAttribute("class", 'gallery_img');
        
            // add image to anchor tag
            anchorLink.appendChild(img);
                    
            // add anchor link to <li>
            newLI.appendChild(anchorLink);

            // add <li> to <ul>
            parentNode.appendChild(newLI);
                    
            count++;
            
        });
        document.getElementById('count').innerText = count + ' items';
    };
    
    r.send("p=ls"); // can send parameters here
    
};
/**
* Upload file
* add event listener to input with id ""fileElem"
*/
/*var control = document.querySelector("#fileElem");*/
let images = document.getElementById("fileElem");

images.addEventListener("change", function(event) {
    
    event.preventDefault();
    event.stopPropagation();
    document.querySelector('.result').innerText = '';
    // When the control has changed, there is new file    
     uploadFileWithAjax("up",images)
     .then(function (response) {
        document.querySelector('.result').innerText = response.body[0];
    })
    .catch(function (errorResponse) {
        console.log(errorResponse);
    });
    
    

}, false);


/**
* Open image page by id
*/

function openImagePage(id) {
    // Get the anchor element
    let a = document.querySelector('#img_' + id);

    // Get image src inside anchor with the .gallery_img class
    let img = a.querySelector('.gallery_img').src;
    
    // create form
    var form = document.createElement("form");
    form.setAttribute("method", 'post');
    form.setAttribute("action", 'editor.php');

    //Move the submit function to another variable
    //so that it doesn't get overwritten.
    form._submit_function_ = form.submit;
    
    // create 'p' param input
    var hiddenParam = document.createElement("input");
    hiddenParam.setAttribute("type", "hidden");
    hiddenParam.setAttribute("name", 'p');
    hiddenParam.setAttribute("value", encodeURIComponent('vu'));
    // append it to form 
    form.appendChild(hiddenParam);
    
    // create 'img_id' param input 
    var hiddenParam = document.createElement("input");
    hiddenParam.setAttribute("type", "hidden");
    hiddenParam.setAttribute("name", 'img_id');
    hiddenParam.setAttribute("value", encodeURIComponent(id));
    // append it to form 
    form.appendChild(hiddenParam);
    
    
    // create 'img src' param input 
    var hiddenParam = document.createElement("input");
    hiddenParam.setAttribute("type", "hidden");
    hiddenParam.setAttribute("name", 'img_src');
    hiddenParam.setAttribute("value", encodeURIComponent(img));
    // append it to form 
    form.appendChild(hiddenParam);
    
    // append form to document
    document.body.appendChild(form);
    // submit the form
    form._submit_function_();
    document.body.removeChild(form);
}



function showImage(id) {
    
    // create a form with parameters to send to server
    var form = new FormData();
    form.append("p", 'vu');
    form.append('id',id);
    
    var json;
        
    // send via XHR
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      
        if (xhr.readyState != 4 || xhr.status != 200)
            return;
          
        json = JSON.parse(xhr.responseText);  
        console.log("readystatechange: " + json); 
        // open new page 'editor.html'
    }
    xhr.onload = function() {
        //console.log("load complete.")
    };
    

    xhr.open("post", "images.php", true);
    xhr.send(form);
    
    return json;/**/    
    
}