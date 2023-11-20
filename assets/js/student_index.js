const preferredColorScheme = localStorage.getItem('color-scheme');

if (preferredColorScheme === 'dark') {
    document.body.classList.add('dark-theme-variables');
}

const themeToggler = document.querySelector(".theme-toggler");

// change theme

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

    if (document.body.classList.contains('dark-theme-variables')) {
        localStorage.setItem('color-scheme', 'dark');
    } else {
        localStorage.removeItem('color-scheme');
    }
})

console.log(localStorage);

    




const activePage = window.location.pathname;
const sidebarLinks = document.querySelectorAll(".nav-middle-container a");

sidebarLinks.forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active')
    }
})

const activePage1 = window.location.pathname;

if(activePage1 == "/new_clearance/student_user/student_user_index.php"){
    document.querySelector(".office-top-container").classList.add("index-page")
}


let td = document.querySelectorAll("table tbody tr td")


td.forEach(td => {
    if(td.innerHTML == "Cleared"){
        td.style.color = "green";
    }else if(td.innerHTML == "Not Cleared"){
        td.classList.add("warning")
    }
})

try{
    let navtopMenuBtn = document.querySelector("#navtop-menu");
    let menuContainer = document.querySelectorAll(".office-top-container .nav-right-container .nav-middle-container")

    navtopMenuBtn.addEventListener("click", function() {
        menuContainer.forEach(container => {
            container.classList.toggle("active")
        })
        if(this.innerText == "menu"){
            this.innerText = "close"
        }else if(this.innerText == "close"){
            this.innerText = "menu"
        }
    })
}catch(err){
    console.log(error);
}

try {
    let changeProfileButton = document.querySelector("#open-change-profile");
    let changeProfileContainer = document.querySelectorAll(".upload-profile-pic");

    changeProfileButton.addEventListener("click", function() {
        changeProfileContainer.forEach(container => {
            container.classList.toggle("active")
        })

        if(this.innerText == "Change Profile"){
            this.innerText = "Cancel Change"
        } else if(this.innerText == "Cancel Change"){
            this.innerText = "Change Profile"
        }
    })
} catch (error) {
    console.log(error);
}



try {
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}



pwShowHide = document.querySelectorAll(".showHidePw");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener('click', () => {
        if(eyeIcon.parentElement.firstElementChild.type === "password"){
            eyeIcon.parentElement.firstElementChild.type = "text";
            
            eyeIcon.classList.replace("uil-eye-slash", "uil-eye")
        }else {
            eyeIcon.parentElement.firstElementChild.type = "password";
            eyeIcon.classList.replace("uil-eye", "uil-eye-slash")
        }
    })
})



document.querySelector("#show-profile-tap").addEventListener("click", function() {
    document.querySelectorAll(".profile-tap").forEach(profileTap => {
        profileTap.classList.toggle("active")
    })
})
} catch (error) {
    console.log(error);
}




