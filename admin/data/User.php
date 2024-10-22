<?php
//Get all users
function getAll($conn){
    $sql = "SELECT id, email, username FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else{
        return 0;
    }
}

//Delete by id
function deleteById($conn, $id){
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);

    if($res){
        return 1;
    }else{
        return 0;
    }
}
?>