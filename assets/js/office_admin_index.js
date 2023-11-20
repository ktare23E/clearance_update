try {
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
} catch (error) {
    console.log(error);
}

    // document.body.classList.add('dark-theme-variables');

    




try {
    
const activePage = window.location.pathname;
const sidebarLinks = document.querySelectorAll(".nav-middle-container a");

sidebarLinks.forEach(link => {
    if(link.href.includes(`${activePage}`)){
        link.classList.add('active')
    }
})
} catch (error) {
    console.log(error);
}











// tabs

try {
    const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget)
        tabContents.forEach(tabContent => {
            tabContent.classList.remove('active')
        })
        tabs.forEach(tab => {
            tab.classList.remove('active')
        })
        tab.classList.add('active')
        target.classList.add('active')
    })
})





let openCsv = document.querySelector("#open-csv");
let csvContainer = document.querySelectorAll(".upload-csv-container");

openCsv.addEventListener("click", function() {
    csvContainer.forEach(container => {
        container.classList.toggle("active")
    })

    console.log(this.innerText);
    if(this.innerText == "Bulk Upload Requirements"){
        this.innerText = "Close"
        console.log("sasasa");
    }else if(this.innerText == "Close"){
        this.innerText = "Bulk Upload Requirements"
    }
})



} catch (error) {
    console.log(error);
}





try {
    let overallStatus = document.querySelectorAll(".overall-clearance-status")

    overallStatus.forEach(status => {
        if(status.innerHTML == "Approved" || status.innerHTML == "Cleared"){
            status.classList.add("success")
        }else {
            status.classList.add("warning")
        }
    })
} catch (error) {
    console.log(error);
}


try {
    let overallStatusCleared = document.querySelectorAll(".overall-clearance-cleared")

    overallStatusCleared.forEach(status => {
        if(status.innerHTML == "Cleared"){
            status.classList.add("success")
        }else {
            status.classList.add("warning")
        }
    })
} catch (error) {
    
}
