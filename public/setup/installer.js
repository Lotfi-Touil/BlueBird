import generateStructure from './DomRenderer.js';

<<<<<<< develop
const routes = {
  '/step1': {
    render: renderStep1
  },
  '/step2': {
    render: renderStep2,
    onSubmit: onSubmitStep2
  },
  '/step3': {
    render: renderStep3,
    onSubmit: onSubmitStep3
  },
  '/step4': {
    render: renderStep4
  }
};

function startInstallation() {
  const currentPath = window.location.pathname;

  if (routes.hasOwnProperty(currentPath)) {
    routes[currentPath].render();
  } else {
    navigateTo('/step2');
  }
}

function navigateTo(path) {
  window.history.pushState({}, '', path);
  routes[path].render();
}

function renderStep1() { }

function renderStep2() {
  fetch('/api/installation/step2')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', routes['/step2'].onSubmit);
      document.getElementById('app').innerHTML = '';
=======
// Première étape : informations sur la base de données
function startInstallation() {
  // Faire un appel API pour obtenir la structure du formulaire
  fetch('/api/installation/step1')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', onSubmitDatabaseForm);
>>>>>>> Installeur JS : V1
      document.getElementById('app').appendChild(formElement);
    });
}

<<<<<<< develop
function onSubmitStep2(event) {
  event.preventDefault();

  const formData = new FormData(event.target);

=======
// Gérer la soumission du formulaire de base de données
function onSubmitDatabaseForm(event) {
  event.preventDefault();

  // Récupérer les données du formulaire
  const formData = new FormData(event.target);

  // Envoyer les données à l'API pour la création de la base de données
>>>>>>> Installeur JS : V1
  fetch('/api/installation/createDatabase', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
<<<<<<< develop
        navigateTo('/step3');
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

=======
        // Si la base de données est créée avec succès, passer à la prochaine étape
        proceedToNextStep();
      } else {
        let errors = responseData.errors;

        // Supprimer les messages d'erreur existants dans le formulaire
        clearErrorMessages();

        // Afficher les nouveaux messages d'erreur
>>>>>>> Installeur JS : V1
        displayErrorMessages(errors);
      }
    });
}

<<<<<<< develop
function renderStep3() {
  fetch('/api/installation/step3')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', routes['/step3'].onSubmit);
      document.getElementById('app').innerHTML = '';
=======
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
>>>>>>> Installeur JS : V1
      document.getElementById('app').appendChild(formElement);
    });
}

<<<<<<< develop
function onSubmitStep3(event) {
  event.preventDefault();

  const formData = new FormData(event.target);

=======
// Gérer la soumission du formulaire utilisateur
function onSubmitUserForm(event) {
  event.preventDefault();

  // Récupérer les données du formulaire
  const formData = new FormData(event.target);

  // Envoyer les données à l'API pour la création du compte utilisateur
>>>>>>> Installeur JS : V1
  fetch('/api/installation/createUser', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
<<<<<<< develop
        navigateTo('/step4');
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

=======
        // Si le compte utilisateur est créé avec succès, finir l'installation
        finishInstallation();
      } else {
        let errors = responseData.errors;

        // Supprimer les messages d'erreur existants dans le formulaire
        clearErrorMessages();

        // Afficher les nouveaux messages d'erreur
>>>>>>> Installeur JS : V1
        displayErrorMessages(errors);
      }
    });
}

<<<<<<< develop
function renderStep4() {
  document.getElementById('app').innerHTML = '';

  let element = document.createElement('p');
  element.textContent = 'Installation terminée !';
  element.className = 'container alert alert-success';
  document.querySelector('#app').appendChild(element);
}

=======
// Finir l'installation
function finishInstallation() {
  // Afficher un message de succès (à personnaliser)
  alert('L\'installation est terminée avec succès!');
}

// Supprimer les messages d'erreur existants dans le formulaire
>>>>>>> Installeur JS : V1
function clearErrorMessages() {
  const formElement = document.querySelector('#app form');
  const errorElements = formElement.querySelectorAll('.form-error');
  
  errorElements.forEach(element => {
    element.remove();
  });
}

<<<<<<< develop
=======
// Afficher les nouveaux messages d'erreur dans le formulaire
>>>>>>> Installeur JS : V1
function displayErrorMessages(errors) {
  const formElement = document.querySelector('#app form');

  errors.forEach(error => {
    let errorElement = document.createElement('p');
    errorElement.textContent = error;
    errorElement.className = 'form-error alert alert-danger';
    formElement.appendChild(errorElement);
  });
}

<<<<<<< develop
window.addEventListener('popstate', startInstallation);

document.addEventListener('DOMContentLoaded', startInstallation);
=======
// Commencer l'installation lorsque le document est prêt
document.addEventListener('DOMContentLoaded', startInstallation);
>>>>>>> Installeur JS : V1
