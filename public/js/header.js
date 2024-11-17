let elm=document.getElementById("colapsedMenu");
    let classList=elm.classList;
document.getElementById("MenuTogler").onclick=()=>{
        elm.classList.replace("menuInActive","menuActive");
}
document.getElementById("AnotherMenuTogler").onclick= ()=>{
        elm.classList.replace("menuActive","menuInActive");
}

