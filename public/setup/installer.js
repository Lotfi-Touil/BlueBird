import generateStructure from './DomRenderer.js';

// Première étape : informations sur la base de données
function startInstallation() {
  // Faire un appel API pour obtenir la structure du formulaire
  fetch('/api/installation/step1')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', onSubmitDatabaseForm);
      document.getElementById('app').appendChild(formElement);
    });
}

// Gérer la soumission du formulaire de base de données
function onSubmitDatabaseForm(event) {
  event.preventDefault();

  // Récupérer les données du formulaire
  const formData = new FormData(event.target);

  // Envoyer les données à l'API pour la création de la base de données
  fetch('/api/installation/createDatabase', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
        // Si la base de données est créée avec succès, passer à la prochaine étape
        proceedToNextStep();
      } else {
        let errors = responseData.errors;

        // Supprimer les messages d'erreur existants dans le formulaire
        clearErrorMessages();

        // Afficher les nouveaux messages d'erreur
        displayErrorMessages(errors);
      }
    });
}

// Deuxième étape : informations sur l'utilisateur
function proceedToNextStep() {
  // Supprimer le formulaire précédent
  const appElement = document.getElementById('app');
  appElement.innerHTML = '';

  // Faire un appel API pour obtenir la structure du formulaire
  fetch('/api/installation/step2')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', onSubmitUserForm);
      document.getElementById('app').appendChild(formElement);
    });
}

// Gérer la soumission du formulaire utilisateur
function onSubmitUserForm(event) {
  event.preventDefault();

  // Récupérer les données du formulaire
  const formData = new FormData(event.target);

  // Envoyer les données à l'API pour la création du compte utilisateur
  fetch('/api/installation/createUser', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
        // Si le compte utilisateur est créé avec succès, finir l'installation
        finishInstallation();
      } else {
        let errors = responseData.errors;

        // Supprimer les messages d'erreur existants dans le formulaire
        clearErrorMessages();

        // Afficher les nouveaux messages d'erreur
        displayErrorMessages(errors);
      }
    });
}

// Finir l'installation
function finishInstallation() {
  // Afficher un message de succès (à personnaliser)
  alert('L\'installation est terminée avec succès!');
}

// Supprimer les messages d'erreur existants dans le formulaire
function clearErrorMessages() {
  const formElement = document.querySelector('#app form');
  const errorElements = formElement.querySelectorAll('.form-error');
  
  errorElements.forEach(element => {
    element.remove();
  });
}

// Afficher les nouveaux messages d'erreur dans le formulaire
function displayErrorMessages(errors) {
  const formElement = document.querySelector('#app form');

  errors.forEach(error => {
    let errorElement = document.createElement('p');
    errorElement.textContent = error;
    errorElement.className = 'form-error alert alert-danger';
    formElement.appendChild(errorElement);
  });
}

// Commencer l'installation lorsque le document est prêt
document.addEventListener('DOMContentLoaded', startInstallation);
