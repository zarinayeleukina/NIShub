<?php
    include "../config/db-connect.php";
    if (isset($_GET["fileid"])) {
        $id = $_GET['fileid'];
        
        
        $stmt = mysqli_prepare($conn,"SELECT * FROM Student_Files WHERE FileID=?");
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        header("Content-Type: ".$data[0]['Type']);
        header('Content-Disposition: attachment; filename='.$data[0]["filename"]);
        ob_clean();
        flush();
        echo $data[0]["File"];
        mysqli_close($conn);
        exit;
    } else {
        echo "NOT ISSET";
    }
?>