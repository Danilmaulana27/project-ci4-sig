function initializeAutocomplete(inputElement) {
    $(inputElement).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "http://localhost:8080/Survei/searchUsers",
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.fullname, 
                            value: item.id       
                        };
                    }));
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            $(this).next('input[type=hidden]').val(ui.item.value);
            $(this).val(ui.item.label);
            return false;
        }
    });
}
