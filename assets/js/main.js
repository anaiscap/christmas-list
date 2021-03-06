
 // function to set a given theme/color-scheme
const date = Date.now();
const christmasStart = new Date('2022-06-10');
const christmasEnd = new Date('2022-06-13');
const motherStart = new Date('2022-06-10');
const motherEnd = new Date('2022-06-22');
const fatherStart = new Date('2022-05-10');
const fatherEnd = new Date('2022-07-22');


window.onload = themeHandler();
function themeHandler() {
  if(date > christmasStart && date < christmasEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("green");
    localStorage.setItem("theme", "green");
  } else if (date > motherStart && date < motherEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("pink");
    localStorage.setItem("theme", "pink")
  }
  else if (date > fatherStart && date < fatherEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("blue");
    localStorage.setItem("theme", "blue")
  } else {
    document.body.removeAttribute('class');
    document.body.classList.add("standard");
    localStorage.setItem("theme", "standard");
  }
}

window.onload = checkTheme();
function checkTheme() {
  const localStorageTheme = localStorage.getItem("theme");
  if (localStorageTheme !== null && localStorageTheme === "green") {
    document.body.className = localStorageTheme;
  } else if (localStorageTheme !== null && localStorageTheme === "pink") {
    document.body.className = localStorageTheme;
  } else if (localStorageTheme !== null && localStorageTheme === "blue") {
    document.body.className = localStorageTheme;
  }
  else if (localStorageTheme !== null && localStorageTheme === "standard") {
    document.body.className = localStorageTheme;
  }
}

 const setTheme = theme => document.documentElement.className = theme;

 function standardTheme(){
  
  var root = document.querySelector(':root');
  root.removeAttribute('class');
  root.classList.add("standard");
  console.log(localStorage);
 // root.style.setProperty("--primary", "#1c815f");
  //root.style.setProperty("--secondary", "#94c4b4");
}

 function greenTheme(){
  
  var root = document.querySelector(':root');
  root.removeAttribute('class');
  root.classList.add("green");
  console.log(localStorage);
  localStorage.setItem( 'theme', 'green');  
  if (localStorage.theme === 'green'){
    root.classList.add("green");
  }
 // root.style.setProperty("--primary", "#1c815f");
  //root.style.setProperty("--secondary", "#94c4b4");
}
function blueTheme(){
  
  var root = document.querySelector(':root');
  root.removeAttribute('class');
  root.classList.add("blue");
  console.log(localStorage);
 // root.style.setProperty("--primary", "#1c815f");
  //root.style.setProperty("--secondary", "#94c4b4");
}
function pinkTheme(){
  
  var root = document.querySelector(':root');
  root.removeAttribute('class');
  root.classList.add("pink");
  console.log(localStorage);
 // root.style.setProperty("--primary", "#1c815f");
  //root.style.setProperty("--secondary", "#94c4b4");
}



var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}


function cookie(){
    event.preventDefault();

    fetch(`index.php?page=cookie`)
    .then(response=>response.text())
        .then(response=>{
            document.querySelector(".cookie").style.display="none"; 
        });
}

function deleted(){
    
    //demander ?? l'utilisateur s'il est s??r de lui ?
      //si oui, alors on stoppe le comportement par d??faut du lien
    if (confirm("??tes-vous s??rs de supprimer ?"))
    {
        event.preventDefault();
       //envoie une requ??te ajax fetch -->index.php en lui disant qu'on veut supprimer une liste et celle qui a l'id 
      fetch(this.dataset.url)
      //.then --> supprimer le tr concern??
      .then(response=>response.text())
      .then(response=>{
         // this.parentNode.remove(); 
        //window.location.reload(); 
        document.querySelector(`[data-id="${this.dataset.id}"]`).remove();
        console.log(document.querySelector(`[data-id="${this.dataset.id}"]`)); 
      });
        console.log(this.dataset.url)
    }
    
}



var btn = document.getElementById("btn");
btn.addEventListener("click", function() {
	//Do something here
  alert("hello")
}, false);

document.addEventListener("DOMContentLoaded",function(){


console.log(localStorage);
    let buttons = document.querySelectorAll('.confirmButton');
     //boucle
    for (let i=0; i<buttons.length; i++){
        buttons[i].addEventListener('click',deleted);
    }

    let btnCookie = document.querySelector('.acceptCookie');
    btnCookie.addEventListener('click',cookie);


})
