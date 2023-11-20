

try {
    const activePage = window.location.pathname;
    const sidebarLinks = document.querySelectorAll(".sidebar a");

    sidebarLinks.forEach(link => {
        if(link.href.includes(`${activePage}`)){
            link.classList.add('active')
        }
    })
} catch (error) {
    
}