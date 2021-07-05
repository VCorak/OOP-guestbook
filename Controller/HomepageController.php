<?php

declare(strict_types=1);

require "Model/PostLoader.php";
require "Model/Posts.php";

class HomepageController {

    public function show()
    {

        if (!isset($_POST["name"])) {
            $_POST["name"] = "name";
            $_POST["title"] = "title";
            $_POST["comment"] = "comment";
        }

        function fixTags($text) {

            $text = htmlspecialchars($text);
            return $text;
        }

        $nameInput = fixTags($_POST["name"]);
        $titleInput = fixTags($_POST["title"]);
        $commentInput = fixTags($_POST["comment"]);
        $dateInput = date('m/d/Y h:i:s a', time());

        $input = new Posts($nameInput, $titleInput, $commentInput, $dateInput);
        $inputArray = $input->createPostsArray($nameInput, $titleInput, $commentInput, $dateInput);

        $book = new PostLoader();

        if (!isset($_SESSION["postLoader"])) {
            $_SESSION["postLoader"] = $book;
        } else {
            $book = $_SESSION["postLoader"];
        }

        $book->pushToPostLoaderArray($inputArray);
        $postLoaderArray = $book->getAllPosts();
        $book->postsLoader($postLoaderArray);
        $toJSON = $book->loaderDecoder();

        // just show first 20 posts
       while (count($toJSON) > 20) {
            array_shift($toJSON);
        }

        // first show new posts
       $dateOrderPosts = array_reverse($toJSON);

        require 'View/Homepage.php';
            }
}


