<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- RESET --- */
        * { box-sizing: border-box; }
        
        body { 
            font-family: 'Nunito', sans-serif; 
            margin: 0; padding: 0;
            
            /* BACKGROUND: Deep Space Blue */
            background-color: #0c0f1d;
            background-image: 
                radial-gradient(white 1px, transparent 1px),
                radial-gradient(rgba(255,255,255,0.5) 1px, transparent 1px);
            background-size: 550px 550px, 350px 350px;
            background-position: 0 0, 40px 60px;
            
            color: #ece5d8;
            min-height: 100vh;
        }

        /* Overlay Gelap */
        body::before {
            content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(12, 15, 29, 0.7); 
            z-index: -1;
        }

        /* Navbar Transparan */
        .navbar { 
            position: sticky; top: 0; z-index: 100;
            padding: 20px 60px; 
            display: flex; justify-content: space-between; align-items: center; 
            background: rgba(12, 15, 29, 0.95); 
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05); 
        }
        
        /* Logo: Hapus Glow */
        .logo { 
            font-family: 'Cinzel', serif; font-size: 28px; 
            color: #fff; 
            letter-spacing: 2px; font-weight: 700;
            text-decoration: none;
        }

        /* Tombol New Entry: Disamakan size & style dengan Edit Guide, No Glow */
        .btn-add { 
            background: #fff; 
            color: #0c0f1d; 
            padding: 10px 25px; /* Size konsisten */
            text-decoration: none; border-radius: 50px; font-weight: 700; 
            font-size: 13px; text-transform: uppercase; letter-spacing: 1px;
            transition: all 0.2s ease;
            border: none;
            /* Hapus box-shadow glow */
        }
        .btn-add:hover { 
            background: #e2e8f0; 
            transform: translateY(-1px);
        }

        .container { max-width: 1200px; margin: 50px auto; padding: 0 20px; animation: fadeInUp 0.8s ease-out; }

        .section-title {
            font-family: 'Cinzel', serif; color: #fff; margin-bottom: 40px;
            font-size: 36px; text-align: center; letter-spacing: 4px;
            display: flex; align-items: center; justify-content: center;
            gap: 20px;
        }
        .section-title::before, .section-title::after {
            content: ''; width: 50px; height: 1px; background: #fff; opacity: 0.3;
        }

        /* --- CONTROLS --- */
        .controls { margin-bottom: 50px; text-align: center; }
        
        .search-wrapper { position: relative; max-width: 500px; margin: 0 auto 25px; }
        .search-input {
            width: 100%; padding: 16px 50px 16px 20px; font-size: 16px;
            background: rgba(30, 34, 50, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1); 
            border-radius: 30px;
            color: #fff;
            outline: none; transition: all 0.3s ease; font-family: 'Nunito', sans-serif;
        }
        .search-input::placeholder { color: rgba(255,255,255,0.3); }
        .search-input:focus { 
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(30, 34, 50, 0.9);
        }
        
        .shortcut-hint {
            position: absolute; right: 20px; top: 50%; transform: translateY(-50%);
            color: #fff; opacity: 0.6; font-size: 12px; font-weight: 700; pointer-events: none;
        }

        .filter-buttons { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; }
        .filter-btn {
            background: transparent; 
            border: 1px solid rgba(255,255,255,0.2);
            padding: 8px 20px; border-radius: 50px;
            cursor: pointer; font-size: 13px; font-weight: 700; color: #aaa;
            transition: all 0.3s ease; font-family: 'Nunito', sans-serif;
        }
        .filter-btn:hover { border-color: #fff; color: #fff; }
        .filter-btn.active { 
            background: #fff; color: #0c0f1d; border-color: #fff;
        }

        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 30px; }

        /* --- KARTU --- */
        .card {
            /* Glass Gelap */
            background: rgba(30, 41, 59, 0.4); 
            backdrop-filter: blur(10px);
            
            border-radius: 12px; 
            overflow: hidden; position: relative; height: 190px;
            display: flex; align-items: center; 
            
            /* Border tipis */
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 20px 50px rgba(0,0,0,0.6);
            border-color: rgba(255, 255, 255, 0.1); 
        }
        
        .card.hidden { display: none; }
        
        /* Link ke Detail Page */
        .card-link { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; }
        .card-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; z-index: 0; transition: transform 0.6s; }
        .card:hover .card-bg { transform: scale(1.05); }
        
        .card-overlay { 
            position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
            background: linear-gradient(90deg, #020617 0%, rgba(2, 6, 23, 0.8) 40%, rgba(2, 6, 23, 0.1) 100%);
            z-index: 1; 
        }
        
        .card-content { position: relative; z-index: 2; display: flex; align-items: center; padding: 0 30px; width: 100%; }
        .icon-wrapper { margin-right: 25px; }
        
        .char-icon { 
            width: 90px; height: 90px; border-radius: 50%; object-fit: cover; 
            background: transparent; border: none; 
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.8)); 
            transition: transform 0.3s; 
        }
        .card:hover .char-icon { transform: scale(1.05); }
        
        .char-info { flex: 1; }
        .char-name { 
            margin: 0; font-size: 26px; font-weight: 700; color: #fff; 
            font-family: 'Cinzel', serif; letter-spacing: 1px;
        }
        
        .char-role { 
            margin: 6px 0 0; font-size: 12px; color: #94a3b8; 
            font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; 
        }
        
        .element-badge { 
            display: inline-block; margin-top: 12px; font-size: 10px; font-weight: 800; 
            text-transform: uppercase; letter-spacing: 1px; color: #fff; 
            padding: 5px 14px; border-radius: 2px; 
            background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1);
        }
        
        .accent-Pyro { border-color: rgba(255, 126, 95, 0.5); }
        .accent-Hydro { border-color: rgba(79, 195, 247, 0.5); }
        .accent-Anemo { border-color: rgba(105, 240, 174, 0.5); }
        .accent-Electro { border-color: rgba(224, 64, 251, 0.5); }
        .accent-Dendro { border-color: rgba(178, 255, 89, 0.5); }
        .accent-Cryo { border-color: rgba(128, 222, 234, 0.5); }
        .accent-Geo { border-color: rgba(255, 215, 64, 0.5); }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .no-results { text-align: center; color: #787c94; font-style: italic; margin-top: 50px; display: none; grid-column: 1 / -1; }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">GENPEDIA</div>
        <a href="<?= BASEURL; ?>/admin/create" class="btn-add">New Entry</a>
    </nav>

    <div class="container">
        <div class="section-title">Character Archive</div>

        <div class="controls">
            <div class="search-wrapper">
                <input type="text" id="searchInput" class="search-input" placeholder="Search character...">
                <div class="shortcut-hint">Ctrl K</div>
            </div>

            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="Pyro">Pyro</button>
                <button class="filter-btn" data-filter="Hydro">Hydro</button>
                <button class="filter-btn" data-filter="Anemo">Anemo</button>
                <button class="filter-btn" data-filter="Electro">Electro</button>
                <button class="filter-btn" data-filter="Dendro">Dendro</button>
                <button class="filter-btn" data-filter="Cryo">Cryo</button>
                <button class="filter-btn" data-filter="Geo">Geo</button>
            </div>
        </div>

        <div class="grid" id="cardGrid">
            <?php foreach ($data['karakter'] as $char) : ?>
                <div class="card" data-name="<?= strtolower($char['name']); ?>" data-element="<?= $char['element']; ?>">
                    <a href="<?= BASEURL; ?>/home/detail/<?= $char['id']; ?>" class="card-link" title="Lihat Guide <?= $char['name']; ?>"></a>
                    
                    <div class="card-bg" style="background-image: url('<?= $char['namecard_url']; ?>');"></div>
                    <div class="card-overlay"></div>
                    <div class="card-content">
                        <div class="icon-wrapper">
                            <img src="<?= $char['icon_url']; ?>" class="char-icon" alt="Icon">
                        </div>
                        <div class="char-info">
                            <h2 class="char-name"><?= $char['name']; ?></h2>
                            <p class="char-role"><?= $char['role']; ?></p>
                            <span class="element-badge accent-<?= $char['element']; ?>">
                                <?= $char['element']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="no-results" id="noResults">No characters found.</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const filterBtns = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.card');
            const noResults = document.getElementById('noResults');

            document.addEventListener('keydown', (e) => {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); searchInput.focus(); }
            });

            function filterCards() {
                const searchTerm = searchInput.value.toLowerCase();
                const activeBtn = document.querySelector('.filter-btn.active');
                const filterValue = activeBtn.getAttribute('data-filter');
                let visibleCount = 0;

                cards.forEach(card => {
                    const name = card.getAttribute('data-name');
                    const element = card.getAttribute('data-element');
                    const matchesSearch = name.includes(searchTerm);
                    const matchesFilter = filterValue === 'all' || element === filterValue;

                    if (matchesSearch && matchesFilter) { card.classList.remove('hidden'); visibleCount++; } 
                    else { card.classList.add('hidden'); }
                });
                noResults.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            searchInput.addEventListener('keyup', filterCards);
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelector('.filter-btn.active').classList.remove('active');
                    btn.classList.add('active');
                    filterCards();
                });
            });
        });
    </script>

</body>
</html>