$(document).ready(function () {
    $('#add-author').on('click', function (e) {
        e.preventDefault();

        if($('tfoot').find('#id').text() == '') {
            // Register the author
            let formDatas = new FormData();
            let author_name = $('tfoot').find('#name').val();
            formDatas.append('name', author_name);

            $.ajax({
                url: 'view/ajax/authors-ajax.php',
                data: formDatas,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(response){
                    response = JSON.parse(response);

                    if(response.success) {
                        // Update the authors list
                        $('tbody tr').remove();
                        let formDatas = new FormData();
                        formDatas.append('list-authors', 1);

                        $.ajax({
                            url: 'view/ajax/authors-ajax.php',
                            data: formDatas,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function(response){
                                response = JSON.parse(response);
            
                                if(response.success) {
                                    // Update the authors list
                                    $('tbody tr').remove();
                                    console.log(response);
                                }
                            }
                        });
                    }
                }
            });
        } else {
            // Update the author
        }
    });

    $('.edit').click(function (e) {
        let tr = $(this).parent();

        let author_name = tr.find('td[data-key="author"]').text();
        let author_id = parseInt(tr.find('th[data-id]').attr('data-id'));

        let input = $('tfoot').find('#name');
        input.val(author_name);
        $('tfoot').find('#id').text(author_id);
    });

    $('.edit, .delete').find('i.fa-pencil-alt, i.fa-trash-alt').hover(function () {
        $(this).css('cursor', 'pointer');
    });

    $('.edit').hover(function() {
        $(this).find('i.fa-pencil-alt').toggleClass('text-warning');
    }, function() {
        $(this).find('i.fa-pencil-alt').toggleClass('text-warning');
    });

    $('.delete').hover(function() {
        $(this).find('i.fa-trash-alt').toggleClass('text-danger');
    }, function() {
        $(this).find('i.fa-trash-alt').toggleClass('text-danger');
    });
});