// try{

// }catch(error){
//     console.log(error);
// }

// const openModalButtons = document.querySelectorAll('[data-modal-target]')
// const closeModalButtons = document.querySelectorAll('[data-close-button]')
// const overlay = document.getElementById('overlay')

// openModalButtons.forEach(button => {
//     button.addEventListener('click', () => {
//     const modal = document.querySelector(button.dataset.modalTarget)
//     openModal(modal)
//     })
// })

// overlay.addEventListener('click', () => {
//     const modals = document.querySelectorAll('.modal.active')
//     modals.forEach(modal => {
//     closeModal(modal)
//     })
// })

// closeModalButtons.forEach(button => {
//     button.addEventListener('click', () => {
//     const modal = button.closest('.modal')
//     closeModal(modal)
//     })
// })

// function openModal(modal) {
//     if (modal == null) return
//     modal.classList.add('active')
//     overlay.classList.add('active')
// }

// function closeModal(modal) {
//     if (modal == null) return
//     modal.classList.remove('active')
//     overlay.classList.remove('active')
// }



// // update modal

// const openUpdateModalButtons = document.querySelector('#open-update-modal')
// const overlayUpdate = document.getElementById('overlay-update')
// const closeUpdateModalButton = document.getElementById('update-modal-close-button')

// const modalEditButton = document.querySelector("#modal-edit-button")
// const modalEditButtonTable = document.querySelector("#modal-edit-button-table")

// modalEditButtonTable.addEventListener("click", function(){
//     const modal = document.querySelector('#update-modal')
//     openUpdateModal(modal)
// })

// modalEditButton.addEventListener('click', () => {
//     const modal = document.querySelector('#update-modal')
//     openUpdateModal(modal)
// })

// // openUpdateModalButtons.addEventListener('click', () => {
// //     const modal = document.querySelector('#update-modal')
// //     openUpdateModal(modal)
// // })


// overlayUpdate.addEventListener('click', () => {
//     const modals = document.querySelectorAll('.update-modal.active')
//     modals.forEach(modal => {
//     closeUpdateModal(modal)
//     })
// })

// closeUpdateModalButton.addEventListener('click', () => {
//     const modals = document.querySelectorAll('.update-modal.active')
//     modals.forEach(modal => {
//     closeUpdateModal(modal)
//     })
// })


// function openUpdateModal(modal) {
//     if (modal == null) return
//     modal.classList.add('active')
//     overlayUpdate.classList.add('active')
// }

// function closeUpdateModal(modal) {
//     if (modal == null) return
//     modal.classList.remove('active')
//     overlayUpdate.classList.remove('active')
// }


