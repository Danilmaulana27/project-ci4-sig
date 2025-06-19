document.addEventListener('DOMContentLoaded', function () {
    var checkbox = document.getElementById('status_survei');

    checkbox.addEventListener('change', function () {
        document.getElementById('survei_status_text').innerText = this.checked ? 'Di Setujui' : 'Tidak Di Setujui';
        document.getElementById('tanggal_belum_survei_div').style.display = this.checked ? 'none' : 'block';
        document.getElementById('tanggal_selesai_survei_div').style.display = this.checked ? 'block' : 'none';
    });

    checkbox.dispatchEvent(new Event('change'));
});
