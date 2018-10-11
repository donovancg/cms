function toggleNav() {
    var nav = document.getElementById("js--nav");
    nav.classList.toggle('nav--respond');
}

var icon = document.getElementById("js--nav-icon");
icon.addEventListener('click', function() {
    toggleNav();
    icon.classList.toggle('open');
});