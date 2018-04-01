<?php
require_once('dbconnection.php');
require_once('session.php');
class User
{
    const COLLECTION = 'registration';
    private $_mongo;
    private $_collection;
    private $_user;
    public function __construct()
    {
        $this->_mongo      = DBConnection::instantiate();
        $this->_collection = $this->_mongo->getCollection(User::COLLECTION);
        if ($this->isLoggedIn())
            $this->_loadData();
    }
    public function isLoggedIn()
    {
       
        return isset($_SESSION['user_id']);
    }
    public function authenticate($regdno, $password, $passkey)
    {
         $query       = array(
            'regdno' =>  $regdno,            
            'passkey'  => $passkey
        );
        $this->_user = $this->_collection->findOne($query);
        if (empty($this->_user))
            return False;
        
        $encrypted_password = $this->_user['password'];

        if (password_verify($password, $encrypted_password)) 
        {

            #### CHECK SESSION EXISTS || IF EXISTS THEN DELETE #####

            $session_userid = (string) $this->_user['_id'];

            $this->_sesscollection = $this->_mongo->getCollection(SessionManager::COLLECTION);

            $session_find= $this->_sesscollection->find(array("data" =>new MongoRegex("/$session_userid/")));

            $session_user_count = $session_find->count();

            if($session_user_count > 0){

                $this->_sesscollection->remove(array("data" =>new MongoRegex("/$session_userid/")));

            }

            #### CHECK SESSION EXISTS || IF EXISTS THEN DELETE #####
            

            ########## IF PASSWORD IS VERIFIED REHASH AGAIN ############
            
            $secure_pass= password_hash($password, PASSWORD_DEFAULT);

            $this->_collection->update(array('_id'=> 
                new MongoId($this->_user['_id'])),
                array('$set' => array('password' => $secure_pass)));

            $_SESSION['user_id'] = (string) $this->_user['_id'];
            session_regenerate_id(true);
            return True;

        }else
        {
            return False;
        }
    }
    public function logout()
    {
        session_regenerate_id(true);
        unset($_SESSION['user_id']);
       
       
    }
    public function __get($attr)
    {
        if (empty($this->_user))
            return Null;
        switch ($attr) {
            
            case 'password':
                return NULL;
            default:
                return (isset($this->_user[$attr])) ? $this->_user[$attr] : NULL;
        }
    }
    private function _loadData()
    {
        $id          = new MongoId($_SESSION['user_id']);
        $this->_user = $this->_collection->findOne(array(
            '_id' => $id
        ));
    }
}

?>