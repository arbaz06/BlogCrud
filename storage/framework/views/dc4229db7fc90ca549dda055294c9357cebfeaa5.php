<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blog Pos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<div class="container mt-5">
    <h2>Add New Blog Post</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Add  Blog Post
    </button>
</div>
<form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit">Logout</button>
    </form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Blog Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo e(route('blog-posts.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="title">Articles Name:</label>
        <input type="text" class="form-control" id="title" name="articles_name">
    </div>
    <div class="form-group">
        <label for="content">description:</label>
        <textarea class="form-control" id="content" name="description"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2>Blog Posts</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Articles Name</th>
                <th>Description</th>
                <th>status</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($post->articles_name); ?></td>
                <td><?php echo e($post->description); ?></td>
                
                <td>
    <div class="form-group ml-auto">
        <form action="<?php echo e(route('blog-posts.update-status', $post->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="status" onchange="this.form.submit()" <?php echo e($post->status ? 'checked' : ''); ?>>
                <label class="form-check-label" for="status"><?php echo e($post->status ? 'Active' : 'Inactive'); ?></label>
            </div>
        </form>
    </div>
</td>

                <td>
    <a href="<?php echo e(route('blog-posts.edit', $post->id)); ?>" class="btn btn-primary">Edit</a>

                   <!-- Delete Button -->
                <form action="<?php echo e(route('blog-posts.destroy', $post->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>

                </td>

                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php /**PATH E:\xampp\htdocs\blog-crud\resources\views/blog-posts/create.blade.php ENDPATH**/ ?>