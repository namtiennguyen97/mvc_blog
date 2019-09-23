<h2>Post list</h2>
<a href="./index.php?page=add">Add new</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Title</th>
        <th>Teaser</th>
        <th>Content</th>
        <th>Created</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($blog as $key => $value): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $value->title ?></td>
        <td><?php echo $value->teaser ?></td>
        <td><?php echo $value->content ?></td>
        <td><?php echo $value->created ?></td>
        <td> <a href="./index.php?page=delete&id=<?php echo $value->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <td> <a href="./index.php?page=edit&id=<?php echo $value->id; ?>" class="btn btn-sm">Update</a></td>
        <?php endforeach; ?>
    </tr>
    </tbody>
</table>

