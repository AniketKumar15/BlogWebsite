function switchForm(form) {
  document.getElementById("loginForm").style.display = form === 'login' ? 'block' : 'none';
  document.getElementById("signupForm").style.display = form === 'signup' ? 'block' : 'none';
}
function openModal() {
  document.getElementById("authModal").style.display = "flex";
}
function closeModal() {
  document.getElementById("authModal").style.display = "none";
}
