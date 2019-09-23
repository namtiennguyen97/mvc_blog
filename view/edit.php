
<h2>Update post content</h2>
<form method="post" action="./index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $blog->id; ?>"/>
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $blog->title; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Teaser</label>
        <textarea name="teaser" class="form-control"><?php echo $blog->teaser; ?></textarea>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control"><?php echo $blog->content; ?></textarea>
    </div>
    <div class="form-group">
        <label>Created</label>
        <textarea name="created" class="form-control"><?php echo $blog->created; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>