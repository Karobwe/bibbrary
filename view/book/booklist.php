<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">ISBN</th>
            <th scope="col">Edition</th>
            <th scope="col">Author ID</th>
            <th scope="col">Publisher ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($books as $book): ?>
            <tr>
                <th scope="row"><?= $book->getId() ?></th>
                <td><?= $book->getTitle() ?></td>
                <td><?= $book->getIsbn() ?></td>
                <td><?= $book->getEdition() ?></td>
                <td><?= $book->getAuthorId() ?></td>
                <td><?= $book->getPublisherId() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>