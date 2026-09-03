<?php

class SignupController extends Signup
{

    private $uid;
    private $firstName;
    private $pwd;
    private $pwdRepeat;
    private $email;
    public $emptyInputError = 'Please fill in all fields';
    public $invalidNameError = 'Invalid name. Only letters, numbers, and spaces are allowed.';
    public $invalidUserNameError = 'Invalid name. Only letters, numbers, and spaces are allowed.';
    public $invalidUserEmail = 'Please enter a valid email.';
    public $passwordsDoNotMatch = 'Passwords do not match.';
    public $userNameExists = 'Username or email already exists.';
    public function __construct(string $firstName, string $uid, string $pwd, string $pwdRepeat, string $email)
    {
        $this->firstName = $firstName;
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        //echo "Empty input!";
        if ($this->emptyInput() == false) {
            header("location: ../view/login.php?emptyInput=" . urlencode($this->emptyInputError));
            exit();
        }
        //echo "Invalid username!";
        if ($this->invalidName() == false) {
            header("location: ../view/login.php?errorName=" . urlencode($this->invalidNameError));
            exit();
        }
        //echo "Invalid username!";
        if ($this->invalidUid() == false) {
            header("location: ../view/login.php?errorUsername=" . urlencode($this->invalidUserNameError));
            exit();
        }
        //echo "Invalid email!";
        if ($this->invalidEmail() == false) {
            header("location: ../view/login.php?errorEmail" . urlencode($this->invalidUserEmail));
            exit();
        }
        //echo "Passwords don't match!";
        if ($this->pwdMatch() == false) {
            header("location: ../view/login.php?passwordmatch=" . urlencode($this->passwordsDoNotMatch));
            exit();
        }
        //echo "User or email taken!";
        if ($this->uidTakenCheck() == false) {
            header("location: ../view/login.php?userEmailTaken=" . urlencode($this->userNameExists));
            exit();
        }
        $this->setUser($this->firstName, $this->uid, $this->pwd, $this->email);
    }

    private function emptyInput(): bool
    {
        $result = "";
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid(): bool
    {
        $result = "";
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidName(): bool
    {
        $result = "";
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->firstName)) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail(): bool
    {
        $result = "";
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(): bool
    {
        $result = "";
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(): bool
    {
        $result = "";
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
            return $result;
        } else {
            $result = true;
        }
        return $result;
    }

}
