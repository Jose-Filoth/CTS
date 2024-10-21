<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if($errors->any()): ?>
        <div>
            <p><?php echo e($errors->first('email')); ?></p>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(url('/login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php /**PATH /home/jose.filoth@ctdesarrollo-sdr.org/Documentos/Jose_Filoth/introduccion-a-php/entregas/Jose.Filoth/Proyecto-1/Retos/todo-list-api/resources/views/login.blade.php ENDPATH**/ ?>