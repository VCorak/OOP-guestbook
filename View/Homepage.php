
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

    <b>Name:</b>
    <label>
        <input name="name" size="30">
    </label> <br>
    <b>Title:</b>
    <label>
        <input name="title">
    </label>
    <h3>Message:</h3>

    <label>
        <textarea name="comment" ROWS=6 COLS=60></textarea>
    </label>

    <input type=submit value="Send">
</form>
<?php foreach ($dateOrderPosts as $post) :?>
<p>Title: <strong><?php echo $post['title']?></strong></p>
<p>Message: <strong><?php echo $post['content']?></strong></p>
<p>Posted on: <strong><?php echo $post['date']?></strong></p>
<p>Author: <strong><?php echo $post['name']?></strong></p>
<?php endforeach?>

<div id="interface">
</div>
</body>
</html>