/**
 * This file simply proves that we can import our own javascript from views.
 * This file is included from app/views/partials/footer
 * 
 */
console.log("My Script");


//Assignment 1 ajax call using fetch api build-in js.
document.querySelector("#ajaxBtn").addEventListener('click', function(){
    let file = "/public/assets/fetch_info.html";
    loadContent(file);
});
/*    
document.querySelector("#ajaxBtn").addEventListener('click', function(){
    let file = "restricted.php";
    loadContent(file);
});
      */      
function loadContent(content){
    fetch (content)
        .then(response => response.text())
        .then(data => document.querySelector("#ajaxContent").innerHTML = data);
}
