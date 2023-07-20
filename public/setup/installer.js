import generateStructure from './DomRenderer.js';

<<<<<<< develop
<<<<<<< develop
=======
>>>>>>> Installeur JS : V2
const routes = {
  '/step1': {
    render: renderStep1,
    onSubmit: onSubmitStep1
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

<<<<<<< develop
function startInstallation() {
  const currentPath = window.location.pathname;

  if (routes.hasOwnProperty(currentPath)) {
    routes[currentPath].render();
  } else {
    navigateTo('/step1');
  }
}

function navigateTo(path) {
  window.history.pushState({}, '', path);
  routes[path].render();
}

function renderStep1() {
  fetch('/api/installation/step1')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', routes['/step1'].onSubmit);
      const appElement = document.getElementById('app');
      while (appElement.firstChild) {
        appElement.removeChild(appElement.firstChild);
      }
      appElement.appendChild(formElement);
    });
}

function onSubmitStep1(event) {
  event.preventDefault();

  navigateTo('/step2');
}

function renderStep2() {
  fetch('/api/installation/step2')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', routes['/step2'].onSubmit);
      document.getElementById('app').innerHTML = '';
=======
// Première étape : informations sur la base de données
=======
>>>>>>> Installeur JS : V2
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
<<<<<<< develop
      formElement.addEventListener('submit', onSubmitDatabaseForm);
>>>>>>> Installeur JS : V1
=======
      formElement.addEventListener('submit', routes['/step2'].onSubmit);
      document.getElementById('app').innerHTML = '';
>>>>>>> Installeur JS : V2
      document.getElementById('app').appendChild(formElement);
    });
}

<<<<<<< develop
<<<<<<< develop
function onSubmitStep2(event) {
  event.preventDefault();

  const formData = new FormData(event.target);

=======
// Gérer la soumission du formulaire de base de données
function onSubmitDatabaseForm(event) {
=======
function onSubmitStep2(event) {
>>>>>>> Installeur JS : V2
  event.preventDefault();

  const formData = new FormData(event.target);

<<<<<<< develop
  // Envoyer les données à l'API pour la création de la base de données
>>>>>>> Installeur JS : V1
=======
>>>>>>> Installeur JS : V2
  fetch('/api/installation/createDatabase', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
<<<<<<< develop
<<<<<<< develop
        navigateTo('/step3');
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

=======
        // Si la base de données est créée avec succès, passer à la prochaine étape
        proceedToNextStep();
=======
        navigateTo('/step3');
>>>>>>> Installeur JS : V2
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

<<<<<<< develop
        // Afficher les nouveaux messages d'erreur
>>>>>>> Installeur JS : V1
=======
>>>>>>> Installeur JS : V2
        displayErrorMessages(errors);
      }
    });
}

<<<<<<< develop
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
=======
function renderStep3() {
  fetch('/api/installation/step3')
    .then(response => response.json())
    .then(formStructure => {
      const formElement = generateStructure(formStructure);
      formElement.addEventListener('submit', routes['/step3'].onSubmit);
      document.getElementById('app').innerHTML = '';
>>>>>>> Installeur JS : V2
      document.getElementById('app').appendChild(formElement);
    });
}

<<<<<<< develop
<<<<<<< develop
function onSubmitStep3(event) {
  event.preventDefault();

  const formData = new FormData(event.target);

=======
// Gérer la soumission du formulaire utilisateur
function onSubmitUserForm(event) {
=======
function onSubmitStep3(event) {
>>>>>>> Installeur JS : V2
  event.preventDefault();

  const formData = new FormData(event.target);

<<<<<<< develop
  // Envoyer les données à l'API pour la création du compte utilisateur
>>>>>>> Installeur JS : V1
=======
>>>>>>> Installeur JS : V2
  fetch('/api/installation/createUser', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(responseData => {
      if (responseData.success) {
<<<<<<< develop
<<<<<<< develop
        navigateTo('/step4');
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

=======
        // Si le compte utilisateur est créé avec succès, finir l'installation
        finishInstallation();
=======
        navigateTo('/step4');
>>>>>>> Installeur JS : V2
      } else {
        let errors = responseData.errors;

        clearErrorMessages();

<<<<<<< develop
        // Afficher les nouveaux messages d'erreur
>>>>>>> Installeur JS : V1
=======
>>>>>>> Installeur JS : V2
        displayErrorMessages(errors);
      }
    });
}

<<<<<<< develop
<<<<<<< develop
=======
>>>>>>> Installeur JS : V2
function renderStep4() {
  document.getElementById('app').innerHTML = '';

  let element = document.createElement('p');
  element.textContent = 'Installation terminée !';
  element.className = 'container alert alert-success';
  document.querySelector('#app').appendChild(element);
<<<<<<< develop
}

=======
// Finir l'installation
function finishInstallation() {
  // Afficher un message de succès (à personnaliser)
  alert('L\'installation est terminée avec succès!');
}

// Supprimer les messages d'erreur existants dans le formulaire
>>>>>>> Installeur JS : V1
=======
}

>>>>>>> Installeur JS : V2
function clearErrorMessages() {
  const formElement = document.querySelector('#app form');
  const errorElements = formElement.querySelectorAll('.form-error');
  
  errorElements.forEach(element => {
    element.remove();
  });
}

<<<<<<< develop
<<<<<<< develop
=======
// Afficher les nouveaux messages d'erreur dans le formulaire
>>>>>>> Installeur JS : V1
=======
>>>>>>> Installeur JS : V2
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
<<<<<<< develop
window.addEventListener('popstate', startInstallation);

document.addEventListener('DOMContentLoaded', startInstallation);
=======
// Commencer l'installation lorsque le document est prêt
=======
window.addEventListener('popstate', startInstallation);

>>>>>>> Installeur JS : V2
document.addEventListener('DOMContentLoaded', startInstallation);
>>>>>>> Installeur JS : V1
