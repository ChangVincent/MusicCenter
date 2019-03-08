<?php

	class Account {

		private $con;
		private $errorArray;

		public function __construct($con) {
			$this->con = $con;
			$this->errorArray = array();
		}

		public function login($username, $password) {
			$password = md5($password);

			$login = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password' ");
			if(mysqli_num_rows($login) == 1) {
				return true;
			}
			else {
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}

		public function register($username, $firstName, $lastName, $email, $email2, $password, $password2) {
			$this->validateUsername($username);
			$this->validateFirstname($firstName);
			$this->validateLastname($lastName);
			$this->validateEmails($email, $email2);
			$this->validatePasswords($password, $password2);

			if(empty($this->errorArray) == true) {
				//insert into db
				return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
			}
			else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}

			return "<span class='errorMessage'>$error</span>";
		}

		private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
			$encryptedPw = md5($password);
			$profilePic = "assets/images/profile-pics/Vincent_CHANG.png";
			$date = date("Y-m-d");

			$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')");

			return $result;
		}


		private function validateUsername($un) {

			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsername = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un' ");
			if(mysqli_num_rows($checkUsername) != 0) {
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}

		}

		private function validateFirstname($fn) {

			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastname($ln) {

			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {

			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmail = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em' ");
			if(mysqli_num_rows($checkEmail) != 0) {
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}

		private function validatePasswords($pw, $pw2) {

			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordsDoNotMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}


			if(strlen($pw) > 25 || strlen($pw) < 5) {
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}
		}

	}

?>