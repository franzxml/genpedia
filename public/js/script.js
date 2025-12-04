/**
 * Script Utama Genpedia
 * Menangani interaksi frontend sederhana
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Genpedia App Ready!');
    
    // Inisialisasi Menu Mobile (Hamburger)
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    // Cek apakah elemen ada sebelum menambahkan event listener
    if(menuToggle && navLinks) {
        menuToggle.addEventListener('click', function() {
            // Toggle class 'slide' untuk animasi menu mobile (perlu CSS tambahan nanti)
            navLinks.classList.toggle('slide'); 
        });
    }
});