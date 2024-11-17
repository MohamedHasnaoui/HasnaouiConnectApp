let elm= document.getElementById("openMenu");
elm.onclick = function(){
    console.log("hi");
    document.getElementById("aside1").classList.replace('-translate-x-80','right-0');
    document.getElementById("aside1").classList.replace('z-50','z-[70]');
    document.getElementById('backgroundDark').classList.remove('hidden');
}
let closeWindow = function(){
    console.log("hi");
    document.getElementById("aside1").classList.replace('right-0','-translate-x-80',);
    document.getElementById("aside1").classList.replace('z-[70]','z-50');
    document.getElementById('backgroundDark').classList.add('hidden');
}
document.getElementById("CloseMenu").onclick = closeWindow;
document.getElementById("backgroundDark").onclick = closeWindow;

