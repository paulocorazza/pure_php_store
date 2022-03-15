
function hello(){
    alert("Olá mundo");
}

let button = document.getElementById("button");
button.addEventListener("click", hello());

console.log(button);
