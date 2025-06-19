document.addEventListener('DOMContentLoaded', (event) => {
    var jenis_bantuan = document.getElementById('jenis_bantuan');
    var penghasilan = document.getElementById('penghasilan').parentNode;
    var keluarga = document.getElementById('keluarga').parentNode;

    jenis_bantuan.addEventListener('change', function() {
        if (this.value == 'Dana Hibah') {
            penghasilan.style.display = 'none';
            keluarga.style.display = 'none';
        } else if (this.value == 'Bantuan Sosial') {
            penghasilan.style.display = 'block';
            keluarga.style.display = 'block';
        } else {
            penghasilan.style.display = 'none';
            keluarga.style.display = 'none';
        }
    });

    jenis_bantuan.dispatchEvent(new Event('change'));
});
