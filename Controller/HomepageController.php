<?php

declare(strict_types=1);

require "Model/Guestbook.php";
require "Model/Posts.php";

class HomepageController {

    public function show()
    {

        if (!isset($_POST["name"])) {
            $_POST["name"] = "name";
            $_POST["title"] = "title";
            $_POST["content"] = "content";
        }

        function fixTags($text) {

            $text = htmlspecialchars($text);
            return $text;
        }

        $nameInput = fixTags($_POST["name"]);
        $titleInput = fixTags($_POST["title"]);
        $contentInput = fixTags($_POST["content"]);
        $dateInput = date('m/d/Y h:i:s a', time());

        $input = new Posts($nameInput, $titleInput, $contentInput, $dateInput);
        $inputArray = $input->createPostsArray($nameInput, $titleInput, $contentInput, $dateInput);

        $book = new Guestbook();

        if (!isset($_SESSION["guestBook"])) {
            $_SESSION["guestBook"] = $book;
        } else {
            $book = $_SESSION["guestBook"];
        }

        $book->pushToGuestbookArray($inputArray);
        $guestBookArray = $book->getAllPosts();
        $toJSON = $book->loaderDecoder();

        // just show first 20 posts
       /* while (count($toJSON) > 20) {
            array_shift($toJSON);
        }*/

        // first show new posts
//        $dateOrderPosts = array_reverse($toJSON);

        require 'View/Homepage.php';
            }
}


