function toggleNav() {
    var nav = document.getElementById("js--nav");
    nav.classList.toggle('nav--respond');
}

var icon = document.getElementById("js--nav-icon");
icon.addEventListener('click', function() {
    toggleNav();
    icon.classList.toggle('open');
});

window.addEventListener('scroll', function() {
    navSticky();
});

var nav = document.getElementById("js--nav");

var sticky = nav.offsetTop;

function navSticky() {
  if (window.pageYOffset >= sticky) {
    nav.classList.add("sticky")
  } else {
    nav.classList.remove("sticky");
  }
}