<?php

class PostLoader {

    private $postLoaderArray = [];

    public function getAllPosts() : array {
        return $this->postLoaderArray;
    }

    public function pushToPostLoaderArray($session) {
        $this->postLoaderArray[] = $session;
    }

    public function postsLoader($array) {
        $data = json_encode($array);
        file_put_contents("database/posts.json", $data);
    }

    public function loaderDecoder() {
        return json_decode(file_get_contents("database/posts.json"), true);
    }
}
