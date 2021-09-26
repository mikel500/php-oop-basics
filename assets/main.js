import '../vendor/twbs/bootstrap/dist/js/bootstrap.min.js'

document.getElementById('login-button').addEventListener('click', () => {
  let formData = new FormData()
  formData.append('login', true)
  formData.append('email', document.getElementById('email').value)
  formData.append('password', document.getElementById('password').value)
  login('http://localhost/store-php/user/login', formData)
})

async function login(url, data) {
  const postData = await fetch(url, {
    method: 'POST',
    body: data,
  })
  const response = await postData.json()
  if (response.code === 200) {
    location.reload();
  } else {
    document.getElementById('login-error').innerHTML = response.error_message
  }
}
