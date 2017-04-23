<?php
   /** ----------------------------------------------------------------------- **
    *   User PHP Class                                                          *
    * ------------------------------------------------------------------------ **
    *   File         ./classes/Education.php                                    *
    *   Date         11/03/2017                                                 *
    *   Author       Reinhardt Zundorf                                          *
    *   Updated      11/03/2017                                                 *
    *   Desc         Contains authentication information for iSV admins.        *
    *                Login functionality for the iSV portal is also contained   *
    *                in this class. Password/hash generator classes are exten-  *
    *                ded from the 'Password' class.                             *
    ** ----------------------------------------------------------------------- **/

    include('password.php');

    /** ----------------------------------------------------------------------- **/
    
    class User extends Password
    {

        private $_db;

        function __construct($db) 
        {
            parent::__construct();

            $this->_db = $db;
        }

        private function get_user_hash($username) 
        {

            try 
            {
                $stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="Yes" ');
                $stmt->execute(array('username' => $username));

                return $stmt->fetch();
            } catch (PDOException $e) {
                echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
            }
        }

        public function login($username, $password) 
        {
            $row = $this->getUserHash($username);

            if ($this->verifyCredentials($password, $row['password']) == 1) 
            {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['memberID'] = $row['memberID'];

                return true;
            }
        }

        /* ----------------------------------------------------------- **
         * Check the session variable and return true if the user has a *
         * active session                                               *
         * -----------------------------------------------------------  *
         * Updated 11/03/2017 by Reinhardt                              *
         * ----------------------------------------------------------- **/
        public function logout() 
        {
            session_destroy();
        }

        /* ----------------------------------------------------------- **
         * Check the session variable and return true if the user has a *
         * active session                                               *
         * -----------------------------------------------------------  *
         * Updated 11/03/2017 by Reinhardt                              *
         * ----------------------------------------------------------- **/
        public function checkLogin() 
        {
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
            {
                return true;
            }
        }

    }

?>
