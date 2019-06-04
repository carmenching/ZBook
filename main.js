//declaration des variables

let myInput = document.getElementById("psw");
let letter = document.getElementById("letter");
let capital = document.getElementById("capital");
let number = document.getElementById("number");
let length = document.getElementById("length");


// Lorsques l'utilisateur click sur le champ mot de passe, s'affiche la boite a message
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// lorsque l'utlisateur click en dehors du champ mot de passe , cacher la boite a message
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// Quand l'utlisateur commence a ecrire dans le champ mot de passe
myInput.onkeyup = function() {

  // pour valider lettre minuscule
  let lettresMinuscule = /[a-z]/g;
  if(myInput.value.match(lettresMinuscule)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // pour valider les lettres majuscule
  let lettresMajuscule = /[A-Z]/g;
  if(myInput.value.match(lettresMajuscule)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Pour valider les nombres
  let nombres = /[0-9]/g;
  if(myInput.value.match(nombres)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Pour valider la longueur
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}


      