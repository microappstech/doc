<?php 
function isAdmin($pdo){
     if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
        $stmt = $pdo->prepare("SELECT rolename from userroles inner join roles on userroles.roleid = roles.roleid where userid = ?");
        $stmt->execute([$userid]);
        $role = $stmt->fetchColumn();
        return $role === "Admin";
    } else {
        header("Location: /Tutorial/"); 
        exit;
    }
}
?>