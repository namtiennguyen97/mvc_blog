<?php

namespace model;
class BlogDB
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function create($blog){
        $sql = "INSERT INTO blog(title,teaser,content,created) VALUES (?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$blog->title);
        $statement->bindParam(2,$blog->teaser);
        $statement->bindParam(3,$blog->content);
        $statement->bindParam(4,$blog->created);
        return $statement->execute();

    }
    public function getAll(){
        $sql ="SELECT * FROM blog";
        $statement= $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $blogs= [];
        foreach ($result as $row){
            $blog = new Blog($row['title'],$row['teaser'],$row['content'],$row['created']);
            $blog->id= $row['id'];
            $blogs[]= $blog;
        }
        return $blogs;
    }
    public function get($id){
        $sql = "SELECT * FROM blog WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $blog = new Blog($row['title'], $row['teaser'], $row['content'],$row['created']);
        $blog->id = $row['id'];
        return $blog;
    }
    public function delete($id){
        $sql = "DELETE FROM blog WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
    public function update($id, $blog)
    {
        $sql = "UPDATE blog SET title = ?, teaser = ?, content = ?, created= ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $blog->title);
        $statement->bindParam(2, $blog->teaser);
        $statement->bindParam(3, $blog->content);
        $statement->bindParam(4, $blog->created);
        $statement->bindParam(5, $id);
        return $statement->execute();
    }

}