<?php
namespace Ijdb\Entity;
class Joke {
    public $authorsTable;

    public $id;
    public $joketext;
    public $jokedate;
    public $authorId;

    public function __construct(\CSY2028\DatabaseTable $authorsTable){
        $this->authorsTable = $authorsTable;
    }

    public function getAuthor() {
        return $this->authorsTable->find('author_id', $this->authorId)[0];
    }
}
?>