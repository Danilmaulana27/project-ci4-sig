document.addEventListener('DOMContentLoaded', (event) => {
    var jenis_bantuan = document.getElementById('jenis_bantuan');
    var penerima_hibah = document.getElementById('penerima_hibah').parentNode;
    var penerima_bansos = document.getElementById('penerima_bansos').parentNode;

    jenis_bantuan.addEventListener('change', function() {
        if (this.value == 'Dana Hibah') {
            penerima_hibah.style.display = 'block';
            penerima_bansos.style.display = 'none';
        } else if (this.value == 'Bantuan Sosial') {
            penerima_hibah.style.display = 'none';
            penerima_bansos.style.display = 'block';
        } else {
            penerima_hibah.style.display = 'none';
            penerima_bansos.style.display = 'none';
        }
    });

    jenis_bantuan.dispatchEvent(new Event('change'));
});
