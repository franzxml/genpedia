document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('btn-explore');
    
    if(btn) {
        btn.addEventListener('click', function() {
            alert('Fitur ini akan segera hadir! Data Karakter sedang disiapkan.');
        });
    }
    
    console.log('Genpedia App Ready!');
});