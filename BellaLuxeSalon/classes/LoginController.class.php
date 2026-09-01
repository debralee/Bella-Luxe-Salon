<?php
session_start();

class LoginController extends Login
{

    private $uid;
    private $pwd;


    public function __construct(string $uid, string $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }


    public function loginUser()
    {
        //echo "Empty input!";
        if ($this->emptyInput()) {
            header("location: ../view/login.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput(): bool
    {
        $result = "";
        if (empty($this->uid) || empty($this->pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
