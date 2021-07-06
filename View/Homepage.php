
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<h3> The guestbook</h3>
<form method="post">
    <h3>Name:</h3>
    <label>
        <input name="name" size="15">
    </label> </br>
    <h3>Title:</h3>
    <label>
        <input name="title" size="30">
    </label>
    <h3>Message:</h3>
    <label>
        <textarea name="comment" ROWS=6 COLS=60></textarea>
    </label>

    <input type=submit value="Send">
</form>
<?php foreach ($dateOrderPosts as $post) :?>
<p><strong>Title: </strong><?php echo $post['title']?></p>
<p><strong>Message: </strong <?php echo $post['content']?>></p>
<p><strong>Posted on: </strong> <?php echo $post['date']?></p>
<p><strong>Author: </strong><?php echo $post['name']?></p>
<?php endforeach?>

<div id="interface">
</div>
</body>
</html>