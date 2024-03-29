
 // function to set a given theme/color-scheme
const date = Date.now();
const christmasStart = new Date('2022-12-01');
const christmasEnd = new Date('2022-12-31');
const motherStart = new Date('2022-05-20');
const motherEnd = new Date('2022-06-29');
const fatherStart = new Date('2022-06-10');
const fatherEnd = new Date('2022-06-29');
const video = document.querySelector('video');
var vid = document.getElementById("myVideo");
var mp4Vid = document.getElementById('mp4Source');
var player = document.getElementById('videoPlayer');


window.onload = themeHandler();

function themeHandler() {
  if(date > christmasStart && date < christmasEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("green");
    localStorage.setItem("theme", "green");
   //video.src = "assets/santaclaus.mp4";
  } else if (date > motherStart && date < motherEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("pink");
    localStorage.setItem("theme", "pink");
    //video.src = "assets/pink-vid.mp4";
  }
  else if (date > fatherStart && date < fatherEnd) {
    document.body.removeAttribute('class');
    document.body.classList.add("blue");
    localStorage.setItem("theme", "blue");
    //video.src = "assets/blue-vid.mp4";
  } else {
    document.body.removeAttribute('class');
    document.body.classList.add("standard");
    localStorage.setItem("theme", "standard");
    //video.src = "assets/yellow-video.mp4";
    
  }
  
};

window.onload = checkTheme;
function checkTheme() {
  if(video === null) return;
  const localStorageTheme = localStorage.getItem("theme");
  if (localStorageTheme !== null && localStorageTheme === "green") {
    document.body.className = localStorageTheme;
    video.src = "assets/santaclaus.mp4";
    searchUser();
  } else if (localStorageTheme !== null && localStorageTheme === "pink") {
    document.body.className = localStorageTheme;
    video.src = "assets/pink-vid.mp4";
    searchUser();
  } else if (localStorageTheme !== null && localStorageTheme === "blue") {
    document.body.className = localStorageTheme;
    video.src = "assets/blue-vid.mp4";
    searchUser();
  }
  else if (localStorageTheme !== null && localStorageTheme === "standard") {
    document.body.className = localStorageTheme;
    video.src = "assets/yellow-video.mp4";
    searchUser();
  }
};

var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");



/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
};

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
};

glowCookies.start('fr', { 
  policyLink: 'https://cssscript.com/privacy-policy/'
});

function deleted(){
    console.log("click");
    //demander à l'utilisateur s'il est sûr de lui ?
      //si oui, alors on stoppe le comportement par défaut du lien
    if (confirm("Étes-vous sûrs de supprimer ?"))
    {
        event.preventDefault();
       //envoie une requête ajax fetch -->index.php en lui disant qu'on veut supprimer une liste et celle qui a l'id 
      fetch(this.dataset.url)
      //.then --> supprimer le tr concerné
      .then(response=>response.text())
      .then(response=>{
         // this.parentNode.remove(); 
        //window.location.reload(); 
        document.querySelector(`[data-id="${this.dataset.id}"]`).remove();
        console.log(document.querySelector(`[data-id="${this.dataset.id}"]`)); 
      });
    }
}

function searchUser(){
  if(document.getElementById("the-filter") !== null) {

      // (A) GET HTML ELEMENTS
    var filter = document.getElementById("the-filter"), // search box
    list = document.querySelectorAll("#the-list li"); // all list items
    // (B) ATTACH KEY UP LISTENER TO SEARCH BOX
    filter.onkeyup = () => {
      // (B1) GET CURRENT SEARCH TERM
      let search = filter.value.toLowerCase();
      // (B2) LOOP THROUGH LIST ITEMS - ONLY SHOW THOSE THAT MATCH SEARCH
      for (let i of list) {
        let item = i.innerHTML.toLowerCase();
        if (item.indexOf(search) == -1) { i.classList.add("hide"); }
        else { i.classList.remove("hide"); }
      }
    };
  }
}


document.addEventListener("DOMContentLoaded", function(){

    let buttons = document.querySelectorAll('.confirmButton');
     //boucle
    for (let i=0; i<buttons.length; i++){
        buttons[i].addEventListener('click',deleted);
    }

    if(openBtn !== null)    openBtn.onclick = openNav;
    if(closeBtn !== null)   closeBtn.onclick = closeNav;


});

