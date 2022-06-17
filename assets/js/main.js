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
        console.log(this.dataset.url)
    }
    
}



document.addEventListener("DOMContentLoaded",function(){

    let buttons = document.querySelectorAll('.confirmButton');
     //boucle
    for (let i=0; i<buttons.length; i++){
        buttons[i].addEventListener('click',deleted);
    }

    let btnCookie = document.querySelector('.acceptCookie');
    btnCookie.addEventListener('click',cookie);

})
