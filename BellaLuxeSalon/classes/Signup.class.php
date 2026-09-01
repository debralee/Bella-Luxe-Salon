<?php

class Signup extends DbConnect
{

    protected function setUser($firstName, $uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (first_name,users_uid, users_pwd, users_email) VALUES (?, ?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($firstName, $uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare("SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;");
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }
        $resultCheck = null;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
