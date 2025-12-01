<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #5a4da3; color: white; }
        .btn { padding: 10px 15px; background: #5a4da3; color: white; text-decoration: none; border-radius: 5px; }
        .btn-add { display: inline-block; margin-bottom: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Dashboard Admin</h1>
        <a href="/genpedia/public/home" target="_blank">Lihat Web Utama</a>
    </div>

    <a href="/genpedia/public/admin/create" class="btn btn-add">+ Tambah Karakter</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Element</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($data['karakter'] as $char) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $char['name']; ?></td>
                <td><?= $char['element']; ?></td>
                <td><?= $char['role']; ?></td>
                <td>
                    <a href="#" style="color:red;">Hapus</a> | 
                    <a href="#" style="color:blue;">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>