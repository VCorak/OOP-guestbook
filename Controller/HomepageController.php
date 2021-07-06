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
            $_POST["content"] = "comment";
        }

        function fixTags($text) {

            $text = htmlspecialchars($text);
            return $text;
        }
        $titleInput = fixTags($_POST["title"]);
        $dateInput = date("l jS \of F Y H:i:s a");
        $contentInput = fixTags($_POST["comment"]);
        $nameInput = fixTags($_POST["name"]);


        $input = new Posts( $titleInput, $dateInput, $contentInput, $nameInput,);
        $inputArray = $input->createPostsArray($titleInput, $dateInput, $contentInput, $nameInput);

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


