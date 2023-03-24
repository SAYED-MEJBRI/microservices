// récupère les éléments DOM pour les formulaires de connexion et d'inscription
const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");

// récupère les liens de connexion et d'inscription
const loginLink = document.getElementById("login-link");
const signupLink = document.getElementById("signup-link");

// ajoute un gestionnaire d'événements pour le lien de connexion pour afficher le formulaire de connexion et masquer le formulaire d'inscription
loginLink.addEventListener("click", function() {
  loginForm.style.display = "block";
  signupForm.style.display = "none";
});

// ajoute un gestionnaire d'événements pour le lien d'inscription pour afficher le formulaire d'inscription et masquer le formulaire de connexion
signupLink.addEventListener("click", function() {
  loginForm.style.display = "none";
  signupForm.style.display = "block";
});