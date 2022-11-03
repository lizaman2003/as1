function sorting(category, type) {
    $.get({
        url: '/sorting',
        data: {
            category: category,
            type: type,
        },
        success: (res) => {
         $('div#items').html(res);
        console.log(res)
          
        },
        error: (res) => {
            console.log(res);
        }
    });
}
function formAction(form,action){
    action.preventDefault();

    let idForm = $(form).attr('id');

    $.post({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        success: (res)=>{
            console.log(res)
        }, error:(res)=>{
            $('form#' + idForm + ' div.invalid-feedback').text('');
            $('form#' + idForm + ' input').removeClass('is-invalid');
            $.each(res.responseJSON, (index, value) => {
                $('form#' + idForm + ' div#' + index + 'Error').text(value);
                $('form#' + idForm + ' input#' + index + 'Input').addClass('is-invalid');
            })
            console.log(res);
        }
    })
}  






