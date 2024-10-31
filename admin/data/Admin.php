<?php
function getByID($conn, $id){
    $sql = "SELECT admin_id, email, username FROM admin WHERE admin_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
        return $data;
    }else{
        return 0;
    }
}
?>