<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken ?>">
        <textarea name="textarea"></textarea>
        <button type="submit">Submit</button>
    </form>
    <div>
        <?php echo $data; ?>
    </div>
</body>
</html>
