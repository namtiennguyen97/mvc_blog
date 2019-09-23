<?php

namespace controller;
use function Couchbase\defaultDecoder;
use model\Blog;
use model\BlogDB;
use model\DBConnection;

class BlogController
{
    public $blogDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=db_mvc3", "root", "tienNam@97");
        $this->blogDB = new BlogDB($connection->connect());
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $title = $_POST['title'];
            $teaser = $_POST['teaser'];
            $content = $_POST['content'];
            $created = $_POST['created'];
            $blog = new Blog($title, $teaser, $content,$created);
            $this->blogDB->create($blog);
            $message = 'Blog has been created';
            include 'view/add.php';
        }
    }
    public function index()
    {
        $blog = $this->blogDB->getAll();
        include 'view/list.php';
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $blog = $this->blogDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->blogDB->delete($id);
            header('Location: index.php');
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $blog = $this->blogDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $blog = new Blog($_POST['title'], $_POST['teaser'], $_POST['content'],$_POST['created']);
            $this->blogDB->update($id, $blog);
            header('Location: index.php');
        }
    }
}