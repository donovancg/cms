var form = document.getElementById('js--comment-form');
var trigger = document.getElementById('js--comment-reveal');

trigger.addEventListener('click', function() {
    form.style.display = 'block';
    trigger.style.display = 'none';
})