<?php

class Guestbook {

    private $guestbookArray = [];

    public function getAllPosts() : array {
        return $this->guestbookArray;
    }

    public function pushToGuestbookArray($session) {
        $this->guestbookArray[] = $session;
    }

    public function postsLoader($array) {
        $data = json_encode($array);
        file_put_contents("database/posts.json", $data);
    }

    public function loaderDecoder() {
        return json_decode(file_get_contents("database/posts.json"), true);
    }
}
