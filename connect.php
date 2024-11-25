<?php
$conn=mysqli_connect("localhost:3308","root","","reblog");





    // Get data to display on index page
    $sql = "SELECT * FROM data";
    $query = mysqli_query($conn, $sql);


 // Create a new post
 if(isset($_REQUEST['new_post'])){
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $author = $_REQUEST['author'];

    $sql = "INSERT INTO data(`title`,`content`,`author`) VALUES('$title','$content','$author')";
    mysqli_query($conn, $sql);


    header("Location: index.php?info=added");
    exit();
}


    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM data WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }

    // Update a post
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        $sql = "UPDATE data SET title = '$title', content = '$content', author = '$author' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }

?>

?>