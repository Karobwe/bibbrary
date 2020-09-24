<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($authors as $author): ?>
            <tr>
                <th scope="row" data-id="<?= $author['author_id'] ?>"><?= $author['author_id'] ?></th>
                <td data-key="author"><?= $author['author_name'] ?></td>
                <td class="edit"><i class="fas fa-lg fa-pencil-alt"></i></td>
                <td class="delete"><i class="fas fa-lg fa-trash-alt"></i></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <form id="add-form" action="">
                <td id="id" class="border-bottom-0"></td>
                <td class="row border-bottom-0">
                    <label for="name" class="col-3">Author Name</label>
                    <input type="text" class="form-control col" id="name">
                </td>
                <td class="border-bottom-0">
                    <button type="submit" id="add-author" class="btn btn-primary mb-2">Submit</button></button>
                </td>
                <td class="border-bottom-0">
                    <button type="reset" class="btn btn-warning mb-2">Clear form</button></button>
                </td>
            </form>
        </tr>
  </tfoot>
</table>