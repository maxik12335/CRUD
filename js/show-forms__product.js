// create
const submitCreate = document.querySelector(".submit-create")
const submitFormCreate = document.querySelector(".submit-form__create")
const closeButtonCreate = document.querySelector(".close-create")

submitCreate.addEventListener("click", () => {
  submitCreate.style.display = 'none'
  submitFormCreate.style.display = 'block'
})

closeButtonCreate.addEventListener("click", () => {
  submitCreate.style.display = 'block'
  submitFormCreate.style.display = 'none'
})

// update

const submitUpdate = document.querySelector(".submit-update")
const submitFormUpdate = document.querySelector(".submit-form__update")
const closeButtonUpdate = document.querySelector(".close-update")


submitUpdate.addEventListener("click", () => {
  submitUpdate.style.display = 'none'
  submitFormUpdate.style.display = 'block'
})

closeButtonUpdate.addEventListener("click", () => {
  submitUpdate.style.display = 'block'
  submitFormUpdate.style.display = 'none'
})