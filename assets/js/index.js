// let label = document.querySelector(".myDate");

// function printDate(){
//     let mydate = new Date()
    
//     label.innerHTML = `${formatDate(mydate)} // ${formatTime(mydate)} `

//     function formatDate(date){
//         let year = date.getFullYear();
//         let month = date.getMonth() + 1;
//         let day = date.getDate();
        
//         return `${month}/${day}/${year}`;
//     }

//     function formatTime(date){
//         let hours = date.getHours();
//         let minutes = date.getMinutes();
//         let seconds = date.getSeconds();

//         return `${hours}:${minutes}:${seconds}`
//     }
    
// }

// setInterval(printDate,1000)


try {
    const sideMenu = document.querySelector("aside");
    const menuBtn = document.querySelector("#menu-btn");
    const closeBtn = document.querySelector("#close-btn");
    
    
    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = "block";
    })
    
    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = "none";
    })
    
    // change theme
    
    const preferredColorScheme = localStorage.getItem('color-scheme');
    const themeToggler = document.querySelector(".theme-toggler");

    if (preferredColorScheme === 'dark') {
        document.body.classList.add('dark-theme-variables');
    }

    

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

}catch(error) {
    console.log(error);
}






// <td class="${order.shipping === 'Declined' ? 'danger': 
// order.shipping === 'Pending' ? 'warning':
// 'primary'}">${order.shipping}</td>





try{
    const container = document.querySelector(".container"),
        pwShowHide = document.querySelectorAll(".showHidePw"),
        pwFields = document.querySelectorAll(".password");


        
        // code to show/hide password and change icon

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
}catch(error) {
    console.log(error);
}








// // add class container for student.html

// let currentLocation = window.location.pathname;


// if(currentLocation == "/student.html"){
//     document.querySelector(".container").classList.add('addClassContainer')
// }


// let mediaQuery = window.matchMedia("(min-width: 769px)")

// if(currentLocation == "/student.html"){
//     if(mediaQuery.matches){
//         document.querySelector('aside').classList.add('aside')
        
//     }
// }










// for show profile modal

// const studentId = document.querySelectorAll('.student-id');
// const firstName = document.querySelector('.first-name');
// const lastName = document.querySelector('.last-name');
// const course = document.querySelector('.course');
// const year = document.querySelector('.year');
// const email = document.querySelector('.email');



// console.log(firstName.innerHTML);



// studentId.forEach( student => {
//     student.addEventListener('click', function() {
//         const children = student.parentElement.children;

//         firstName.innerHTML = ` ${children[1].innerHTML} &nbsp;`;
//         lastName.innerHTML = ` ${children[2].innerHTML} `;
//         course.innerHTML = ` ${children[4].innerHTML} &nbsp;`;
//         year.innerHTML = ` ${children[3].innerHTML} `;
//         email.innerHTML = ` ${children[5].innerHTML} `;

//         const modal = document.querySelector('#modal')
//         openModal(modal)

//     })
// })


// function openModal(modal) {
//     if (modal == null) return
//     modal.classList.add('active')
//     overlay.classList.add('active')
// }







// back button to student.php



// const EditProfileBtn = document.querySelector("#edit-profile-button")

// EditProfileBtn.addEventListener('click', function(){
//     window.location.href = "student.php";
// })


try{
    let bulkOptionsButton = document.getElementById("bulk-options");
    let closeOptions = document.getElementById("close-bulk-options-button");
    let bulkActions = document.getElementsByClassName("bulk-actions-container")

    bulkOptionsButton.addEventListener("click", function() {
        bulkActions[0].style.display = "flex"
    })

    closeOptions.addEventListener("click", function() {
        bulkActions[0].style.display = "none"
    })
}catch(error){
    console.log(error);
}





try {
    let overallStatus = document.querySelectorAll(".overall-clearance-status")

    overallStatus.forEach(status => {
        if(status.innerHTML == "Cleared"){
            status.classList.add("success")
        }else {
            status.classList.add("warning")
        }
    })

} catch (error) {
    
}


