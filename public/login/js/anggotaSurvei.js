// function tambahAnggota() {
//     var container = document.getElementById('anggotaSurveiContainer');
//     var selectGroup = document.createElement('div');
//     selectGroup.innerHTML = '<select class="form-control mb-2 anggotaSurveiInput"></select><input type="hidden" name="anggotaSurveiId[]">';
//     container.appendChild(selectGroup);
//     var dropdown = $('.anggotaSurveiInput').last();

//     isiDropdown(dropdown);
// }

// function hapusAnggota() {
//     var container = document.getElementById('anggotaSurveiContainer');
//     if (container.childElementCount > 2) { 
//         container.removeChild(container.lastElementChild);
//     }
// }

// function isiDropdown(dropdown, selectedUserId) {
//     $.ajax({
//         url: 'http://localhost:8080/Survei/api_survey_members', 
//         method: 'GET',
//         success: function(data) {
//             data.forEach(function(item) {
//                 var option = new Option(item.fullname, item.id);
//                 if (item.id === selectedUserId) {
//                     option.selected = true;
//                 }
//                 dropdown.append(option);
//             });
//         }
//     });
// }

// $(document).ready(function() {
//     $('.anggotaSurveiInput').each(function() {
//         var selectedUserId = $(this).next('input[type=hidden]').val(); 
//         isiDropdown(this, selectedUserId);
//     });
// });


function tambahAnggota() {
    var container = document.getElementById('anggotaSurveiContainer');
    var inputGroup = document.createElement('div');
    inputGroup.innerHTML = '<input type="text" class="form-control mb-2 anggotaSurveiInput" placeholder="Nama Anggota"><input type="hidden" name="anggotaSurveiId[]">';
    container.appendChild(inputGroup);
    initializeAutocomplete($('.anggotaSurveiInput').last());
}

function hapusAnggota() {
    var container = document.getElementById('anggotaSurveiContainer');
    if (container.childElementCount > 1) { 
        container.removeChild(container.lastElementChild);
    }
}

$(document).ready(function() {
    $('.anggotaSurveiInput').each(function() {
        initializeAutocomplete(this);
    });
});
