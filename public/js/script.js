document.addEventListener('DOMContentLoaded', function() {
    console.log('Genpedia App Ready!');
    
    // Nanti kita akan tambahkan logika pencarian atau filter di sini
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if(menuToggle && navLinks) {
        menuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('slide'); // Siapkan class slide untuk mobile menu nanti
        });
    }
});