<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected static $table = DB_PREFIX . 'post';
    protected static $fillable = ['title', 'content', 'created_at'];

    protected $id;

    protected $title;
    protected $content;
    protected $created_at;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
