window.addEventListener(scroll, e => {
    let navbar = document.getElementById('navbar')
    let active_class = "navbar_scrolled"
    if(scrollY > 100) navbar.add(active_class)
    else navbar.remove(active_class)
})