<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- RESET & BASIC STYLE --- */
        * { box-sizing: border-box; }
        body { 
            font-family: 'Nunito', sans-serif; margin: 0; padding: 0;
            background-color: #0c0f1d;
            background-image: 
                radial-gradient(white 1px, transparent 1px),
                radial-gradient(rgba(255,255,255,0.5) 1px, transparent 1px);
            background-size: 550px 550px, 350px 350px; 
            background-position: 0 0, 40px 60px;
            background-attachment: fixed;
            color: #ece5d8; min-height: 100vh;
            display: flex; justify-content: center; align-items: center;
            padding: 50px 20px;
        }

        /* --- GLASS CARD CONTAINER --- */
        .card {
            background: rgba(12, 15, 29, 0.85);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        /* HEADER */
        .header {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 20px; margin-bottom: 30px;
            text-align: center;
        }
        h2 { 
            font-family: 'Cinzel', serif; margin: 0; color: #fff; font-size: 28px; 
            text-shadow: 0 0 10px rgba(255,255,255,0.2);
        }

        /* FORM ELEMENTS */
        form { display: grid; gap: 25px; }
        
        .form-group { display: flex; flex-direction: column; gap: 10px; }
        
        label { 
            font-size: 13px; font-weight: 700; color: #94a3b8; 
            text-transform: uppercase; letter-spacing: 1px;
        }

        /* REVISI: Hapus Custom Arrow pada Select */
        input, select, textarea {
            background: rgba(30, 34, 50, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 12px 20px;
            color: #fff; font-family: 'Nunito', sans-serif; font-size: 15px;
            outline: none; transition: 0.3s;
            width: 100%;
        }
        
        /* Kembalikan Option ke warna gelap agar terbaca di dropdown */
        option { background: #1e1e2e; color: white; }

        input:focus, select:focus, textarea:focus {
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(30, 34, 50, 0.9);
            box-shadow: 0 0 15px rgba(255,255,255,0.05);
        }

        .row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

        /* PREVIEW GAMBAR */
        .img-preview-container {
            display: none; 
            gap: 20px; margin-top: 5px;
            background: rgba(0,0,0,0.2); padding: 15px; border-radius: 10px; 
            border: 1px solid rgba(255,255,255,0.05);
        }
        .preview-box { text-align: center; }
        .preview-box img { 
            height: 60px; object-fit: cover; border-radius: 8px; 
            border: 1px solid rgba(255,255,255,0.2); margin-bottom: 5px; background: #000;
        }
        .preview-box span { display: block; font-size: 11px; color: #777; }

        /* SELECTION GRID */
        .select-grid { 
            display: grid; grid-template-columns: repeat(auto-fill, minmax(90px, 1fr)); gap: 12px; 
            max-height: 250px; overflow-y: auto; 
            background: rgba(0,0,0,0.3); padding: 15px; border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.05);
        }
        .select-item { position: relative; cursor: pointer; }
        .select-item input { position: absolute; opacity: 0; cursor: pointer; height: 0; width: 0; }
        .select-item img { 
            width: 100%; aspect-ratio: 1/1; object-fit: cover;
            border-radius: 8px; border: 2px solid transparent; 
            opacity: 0.4; transition: 0.2s; filter: grayscale(80%);
            background: #1e1e1e;
        }
        .select-item span { 
            display: block; font-size: 11px; text-align: center; 
            color: #666; margin-top: 4px; overflow: hidden; 
            text-overflow: ellipsis; white-space: nowrap; transition: 0.2s;
        }
        .select-item input:checked + img { 
            border-color: #fff; opacity: 1; filter: grayscale(0%);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        .select-item input:checked ~ span { color: #fff; font-weight: bold; text-shadow: 0 0 5px #000; }
        .select-item:hover img { opacity: 0.8; }

        /* TOMBOL ACTION */
        .actions { margin-top: 30px; display: flex; gap: 15px; }
        button {
            flex: 1; background: #fff; color: #0c0f1d;
            padding: 14px; border: none; border-radius: 50px;
            font-weight: 800; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;
            cursor: pointer; transition: 0.3s;
        }
        button:hover { background: #e2e8f0; transform: translateY(-2px); box-shadow: 0 5px 20px rgba(255,255,255,0.2); }
        .btn-cancel {
            flex: 0; min-width: 140px; text-align: center; display: flex; align-items: center; justify-content: center;
            background: transparent; color: #aaa; border: 1px solid rgba(255,255,255,0.2);
            text-decoration: none; border-radius: 50px; font-weight: 700; font-size: 14px;
        }
        .btn-cancel:hover { background: rgba(255,255,255,0.05); color: #fff; border-color: #fff; }

    </style>
</head>
<body>

<div class="card">
    <div class="header">
        <h2>New Entry</h2>
    </div>
    
    <form action="<?= BASEURL; ?>/admin/store" method="POST" id="formEntry">
        
        <div class="row">
            <div class="form-group">
                <label>Character Name</label>
                <input type="text" name="name" required placeholder="e.g. Arlecchino" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <?php if(!empty($data['roles'])): ?>
                        <?php foreach($data['roles'] as $role) : ?>
                            <option value="<?= $role['name']; ?>"><?= $role['name']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled>No roles found.</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Vision / Element</label>
            <select name="element">
                <option value="Pyro">Pyro</option>
                <option value="Hydro">Hydro</option>
                <option value="Anemo">Anemo</option>
                <option value="Electro">Electro</option>
                <option value="Dendro">Dendro</option>
                <option value="Cryo">Cryo</option>
                <option value="Geo">Geo</option>
            </select>
        </div>

        <div class="form-group">
            <label>Icon URL (Portrait)</label>
            <input type="text" name="icon_url" id="iconUrl" required placeholder="https://...">
        </div>
        <div class="form-group">
            <label>Namecard URL (Background)</label>
            <input type="text" name="namecard_url" id="namecardUrl" required placeholder="https://...">
        </div>

        <div class="img-preview-container" id="previewContainer">
            <div class="preview-box">
                <img id="prevIcon" src="" alt="Icon">
                <span>Icon</span>
            </div>
            <div class="preview-box" style="flex: 1; text-align: left;">
                <img id="prevNamecard" src="" style="width: 100%; height: 60px; aspect-ratio: auto;" alt="Namecard">
                <span style="text-align: center;">Namecard Preview</span>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 20px 0;">

        <div class="form-group">
            <label>Best Weapons (Select multiple)</label>
            <div class="select-grid">
                <?php if(empty($data['weapons'])): ?>
                    <p style="color: #666; font-size: 12px; grid-column: 1/-1; text-align: center;">
                        No weapons data. Please add in <a href="<?= BASEURL; ?>/admin/master" style="color:#fff">Master Data</a>.
                    </p>
                <?php else: ?>
                    <?php foreach($data['weapons'] as $w) : ?>
                        <label class="select-item">
                            <input type="checkbox" name="weapons[]" value="<?= $w['id']; ?>">
                            <img src="<?= $w['icon_url']; ?>" title="<?= $w['name']; ?>">
                            <span><?= $w['name']; ?></span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label>Best Artifacts (Select multiple)</label>
            <div class="select-grid">
                <?php if(empty($data['artifacts'])): ?>
                    <p style="color: #666; font-size: 12px; grid-column: 1/-1; text-align: center;">
                        No artifacts data. Add in Master Data.
                    </p>
                <?php else: ?>
                    <?php foreach($data['artifacts'] as $a) : ?>
                        <label class="select-item">
                            <input type="checkbox" name="artifacts[]" value="<?= $a['id']; ?>">
                            <img src="<?= $a['icon_url']; ?>" title="<?= $a['name']; ?>">
                            <span><?= $a['name']; ?></span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label>Best Teammates (Select other characters)</label>
            <div class="select-grid">
                <?php if(empty($data['characters'])): ?>
                    <p style="color: #666; font-size: 12px; grid-column: 1/-1; text-align: center;">
                        No other characters available yet.
                    </p>
                <?php else: ?>
                    <?php foreach($data['characters'] as $c) : ?>
                        <label class="select-item">
                            <input type="checkbox" name="teams[]" value="<?= $c['id']; ?>">
                            <img src="<?= $c['icon_url']; ?>" title="<?= $c['name']; ?>">
                            <span><?= $c['name']; ?></span>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label>Description / Overview</label>
            <textarea name="description" rows="4" placeholder="Character lore or brief guide..."></textarea>
        </div>

        <div class="actions">
            <a href="<?= BASEURL; ?>" class="btn-cancel">CANCEL</a>
            <button type="submit">CREATE CHARACTER</button>
        </div>
    </form>
</div>

<script>
    const iconInput = document.getElementById('iconUrl');
    const namecardInput = document.getElementById('namecardUrl');
    const previewContainer = document.getElementById('previewContainer');
    const prevIcon = document.getElementById('prevIcon');
    const prevNamecard = document.getElementById('prevNamecard');

    function updatePreview() {
        const iconVal = iconInput.value;
        const namecardVal = namecardInput.value;

        if (iconVal || namecardVal) {
            previewContainer.style.display = 'flex';
            if(iconVal) prevIcon.src = iconVal;
            if(namecardVal) prevNamecard.src = namecardVal;
        } else {
            previewContainer.style.display = 'none';
        }
    }

    iconInput.addEventListener('input', updatePreview);
    namecardInput.addEventListener('input', updatePreview);
</script>

</body>
</html>