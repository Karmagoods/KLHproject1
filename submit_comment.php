<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the input data
    $name = htmlspecialchars(trim($_POST['name']));
    $comment = htmlspecialchars(trim($_POST['comment']));
    $article = htmlspecialchars(trim($_POST['article']));

    // Save the comment to the text file
    $file = fopen("comments.txt", "a");
    fwrite($file, "Name: $name\n");
    fwrite($file, "Comment: $comment\n");
    fwrite($file, "Article: $article\n\n");
    fclose($file);

    // Display confirmation message
    echo "<h2>Thank you for your comment, $name!</h2>";
    echo "<p>Your comment on '$article': $comment</p>";

    // Redirect back to the page after 3 seconds
    header("refresh:3; url=index.html#articleID");
    exit();
}

