<?php 
require_once("db/DB.php");

// user
require_once("user/User.php");
require_once("user/UserDB.php");

// form
require_once("form/Form.php");
require_once("form/FormDB.php");

Class Application {
    /**
     * @var DB
     */
    private DB $db;
    /**
     * @var UserDB
     */
    private UserDB $userDB;
    private FormDB $formDB;

    function __construct()
    {
        $this->db = new DB();

        // user
        $this->userDB = new UserDB($this->db->getDbConnect());

        //form
        $this->formDB = new FormDB($this->db->getDbConnect());
    }

    private function hash($user): string
    {
        return md5(md5($user->getPassword().$user->getEmail()).$user->getPassword());
    }

    public function registration($body): bool
    {
        $user = new User((object) $body);
        $password = $this->hash($user);
        $user->setPassword($password);
        return $this->userDB->insertInto($user);
    }

    public function authorization($body): string
    {
        $user = new User((object) $body);
        $hash = $this->hash($user);
        $user->setPassword($hash);
        $token = md5($hash.uniqid(rand(1000, 5000)));
        $user->setToken($token);
        if($this->userDB->selectByPassword($hash)) {
            if ($this->userDB->updateToken($user)) {
                return $token;
            }
        }
        return false;
    }

    public function addForm($body): bool
    {
        $form = new Form((object) $body);
        return $this->formDB->insertInto($form);
    }

    public function getForms()
    {
        return $this->formDB->select();
    }

    public function updateForm($body)
    {
        $form = new Form((object) $body);
        return $this->formDB->update($form, $body->id);
    }

    public function deleteForm($body)
    {
        return $this->formDB->delete($body->id);
    }

    public function checkToken(string $token)
    {
        return $this->userDB->selectByToken($token);
    }
}