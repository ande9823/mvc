/**
 * This file simply proves that we can import our own javascript from views.
 * This file is included from app/views/partials/footer
 * 
 */
console.log("My Script");

/*  
//Assignment 1 ajax call using fetch api build-in js.
document.querySelector("#picBTN").addEventListener('click', function(){
    let file =  "pictures.php";
    loadContent(file);
});
        
document.querySelector("#usrBTN").addEventListener('click', function(){
    let file = "users.php";
    loadContent(file);
});
        
document.querySelector("#signUpBTN").addEventListener('click', function(){
    let file = "Signup.php";
    loadContent(file);
});
            
function loadContent(content){
    fetch (content)
        .then(response => response.text())
        .then(data => document.querySelector(".content").innerHTML = data);
}
*/