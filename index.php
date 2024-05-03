<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container p-3 mx-auto">
        <div class="w-full mb-2 mx-auto rounded overflow-hidden shadow-lg bg-white">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Direktur PT. Laksana Jaya Mobil</div>
                <p class="text-gray-700 text-base">
                <p>Nama: Anwar Musyadad</p>
                <p>Kelas: D4RPL2B</p>
                <p>Prodi: Rekayasa Perangkat Lunak</p>
                <p>Matkul: Desain Perangkat Lunak 2</p>
                </p>
            </div>
        </div>
        <?php
        require_once 'Database.php';
        require_once 'Mahasiswa.php';

        $mobil = new Mobil();

        if (isset($_POST['create'])) {
            $jenis = $_POST['jenis'];
            $nama = $_POST['nama'];
            $tipe = $_POST['tipe'];
            $mobil->createMobil($jenis, $nama, $tipe);
        }

        if (isset($_POST['update'])) {
            $jenis = $_POST['jenis'];
            $nama = $_POST['nama'];
            $tipe = $_POST['tipe'];
            $mobil->updateMobil($jenis, $nama, $tipe);
        }

        if (isset($_POST['read'])) {
            $jenis = $_POST['jenis'];
            $mobil->readMobil($jenis);
        }

        if (isset($_POST['delete'])) {
            $nama = $_POST['nama'];
            $mobil->deleteMobil($nama);
        }
        ?>
            <div class="w-full mx-auto bg-white p-6 rounded-lg shadow-xl">
                <h1 class="text-3xl mb-6">CRUD Mobil</h1>
                <form method="post">
                    <div class="mb-4">
                        <label for="jenis" class="block text-gray-700">jenis:</label>
                        <input type="text" id="jenis" name="jenis" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700">Nama:</label>
                        <input type="text" id="nama" name="nama" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <label for="tipe" class="block text-gray-700">tipe:</label>
                        <input type="text" id="tipe" name="tipe" class="w-full rounded border-gray-300">
                    </div>
                    <div class="mb-4">
                        <input type="submit" name="create" value="Tambah" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="update" value="Perbarui" class="cursor-pointer bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="read" value="Baca" class="cursor-pointer bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        <input type="submit" name="delete" value="Hapus" class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>