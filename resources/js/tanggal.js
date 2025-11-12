function updateDateTime() {
    const now = new Date();

    const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const bulan = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const namaHari = hari[now.getDay()];
    const tanggal = now.getDate();
    const namaBulan = bulan[now.getMonth()];
    const tahun = now.getFullYear();

    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');

    const waktuLengkap = `${namaHari}, ${tanggal} ${namaBulan} ${tahun} - ${jam}:${menit}:${detik}`;
    document.getElementById('datetime').textContent = waktuLengkap;
    }

    setInterval(updateDateTime, 1000);
updateDateTime(); 
        