document.querySelectorAll('#deleteButton').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        var form = this.parentElement;
        swal({
            title: "Apakah kamu yakin?",
            text: "Setelah dihapus, Anda tidak akan dapat memulihkan data ini!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
});
