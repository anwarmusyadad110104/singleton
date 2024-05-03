<?php

class Mobil
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createMobil($jenis, $nama, $tipe)
    {
        if (empty($jenis) || empty($nama) || empty($tipe)) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                    Mohon lengkapi semua data.
                </p>
            </div>
        </div>';
            return;
        }

        $sql = "INSERT INTO mobil (jenis, nama, tipe) VALUES ('$jenis', '$nama', '$tipe')";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-blue-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                    Data mahasiswa berhasil ditambahkan.
                </p>
            </div>
        </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }

    public function readMobil($jenis)
    {
        $sql = "SELECT * FROM mobil WHERE jenis='$jenis'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-yellow-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Read!</div>
                <p class="text-gray-700 text-base">
                JENIS: ' . $row['Jenis'] . ' - Nama: ' . $row['nama'] . ' - Tipe: ' . $row['tipe'] . '<br>
                </p>
            </div>
        </div>';
            }
        } else {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Error!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa tidak ditemukan.
                </p>
            </div>
        </div>';
        }
    }

    public function updateMobil($jenis, $nama, $tipe)
    {
        $sql = "UPDATE mobil SET jenis='$jenis', tipe='$tipe' WHERE nama='$nama'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-green-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa berhasil diperbarui.
                </p>
            </div>
        </div>';
        } else {
            echo "Error updating record: " . $this->db->error;
        }
    }

    public function deleteMobil($nama)
    {
        $sql = "DELETE FROM mobil WHERE nama='$nama'";
        if ($this->db->query($sql) === TRUE) {
            echo '<div class="mb-2 w-full rounded overflow-hidden shadow-lg bg-red-100">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Sukses!</div>
                <p class="text-gray-700 text-base">
                Data mahasiswa berhasil dihapus.
                </p>
            </div>
        </div>';
        } else {
            echo "Error deleting record: " . $this->db->error;
        }
    }
}