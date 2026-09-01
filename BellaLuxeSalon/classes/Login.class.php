<?php
session_start();

class Login extends DbConnect
{

    public function getUser($uid, $pwd)
    {

        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');


        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../view/login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../view/login.php?error=wrongpwd");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if (!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../view/login.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../view/login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userId"] = $user[0]["users_id"];
            $_SESSION["userName"] = $user[0]["first_name"];
            $_SESSION["userRole"] = $user[0]["users_role"];
            $stmt = null;
            // header("location: ../index.php?login=success");
            // exit();
        }


        // $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC)["users_pwd"];
        // if (password_verify($pwd, $pwdHashed)) {
        //     $stmt = null;
        //     session_start();
        //     $_SESSION["userid"] = $uid;
        //     $_SESSION["user"] = $uid;
        //     header("location: ../index.php?login=success");
        //     exit();
        // } else {
        //     $stmt = null;
        //     header("location: ../login.php?error=wrongpwd");
        //     exit();
        // }

    }
}
