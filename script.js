const form = document.getElementById('myForm');
form.addEventListener('submit', submitForm);

function submitForm(event) {
  event.preventDefault();

  if (form.checkValidity()) {
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();

    xhr.open(form.method, form.action, true);
    xhr.setRequestHeader('Accept', 'application/json');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log('Email sent successfully.');
        form.reset();
      } else {
        console.error('There was a problem sending the email.');
      }
    };

    xhr.send(formData);
  } else {
    console.log('Please fill in all the required fields.');
  }
}
