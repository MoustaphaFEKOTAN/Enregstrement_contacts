  // Fonction pour basculer entre les modes sombre et clair
  function toggleDarkMode() {
    var contentElement = document.getElementById("content");
    
    if (contentElement.classList.contains("dark-mode")) {
        contentElement.classList.remove("dark-mode");
        contentElement.classList.add("light-mode");
    } else {
        contentElement.classList.remove("light-mode");
        contentElement.classList.add("dark-mode");
    }
}


function changertexte() {
    let clickme = document.getElementById("Mode");
   /* clickme.innerText === 'Dark-Mode' : C'est la condition de la ternaire. Cela vérifie si le 
   texte actuel du bouton (représenté par clickme.innerText) est égal à 'Dark-Mode'.
? : C'est l'opérateur ternaire. Il permet de choisir entre deux valeurs en fonction de la condition. 
Si la condition est vraie, l'expression entre le ? et le : est renvoyée ; sinon, 
l'expression après le : est renvoyée. */
    clickme.innerText = (clickme.innerText === 'Dark-Mode') ? 'Light-Mode' : 'Dark-Mode';
}


