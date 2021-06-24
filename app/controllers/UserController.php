<?php 

class UserController {

    public function log(){

        if(isset($_POST['submit'])){
            $data['username'] = $_POST['username'];
            $result = User::login($data);
            if($result->username === $_POST['username'] && password_verify($_POST['password'], $result->password)){
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $result->id;
                    $_SESSION['username'] = $result->username;
                    $_SESSION['role'] = $result->role_u;
                    if($result->role_u == 0 ){
                        Redirect::to('home');
                    }else{
                        Redirect::to('dashadmin');
                    }
            }else{
                Session::set('error', 'Username or Password incorrect');
                Redirect::to('login');
            }
        }
    }

    public function register(){

        if(isset($_POST['submit'])){
            $options =[
                'cost' => 12
            ];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
            $data = array(
                'fname' => $_POST['fname'],
                'username' => $_POST['username'],
                'password' => $password,
            );
            $result = User::createUser($data);
            if($result === 'ok'){
                    Session::set('success', 'Account created!');
                    Redirect::to('login');
            }else{
               echo $result ;
            }
        }
    }

	static public function logout(){
		session_destroy();
	}

}