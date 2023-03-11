const submit = document.querySelector(".submit")
const submitForm = document.querySelector(".submit-form")
const closeButton = document.querySelector(".close")

submit.addEventListener("click", () => {
  submit.style.display = 'none'
  submitForm.style.display = 'block'
})

closeButton.addEventListener("click", () => {
  submit.style.display = 'block'
  submitForm.style.display = 'none'
})