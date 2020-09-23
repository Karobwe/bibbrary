<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
		<?php foreach($books as $index => $book): ?>
			<tr>
				<th scope="row"><a href="index.php?book=<?= $book->getId() ?>"><?= $book->getTitle() ?></a></th>
				<td><?= $book->getAuthor() ?></td>
				<td><?= $book->getDescription() ?></td>
			</tr>
		<?php endforeach; ?>
  </tbody>
</table>