<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id']
        );
    }

    public function getUserByID(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE id = :id
        ');

        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id']
        );
    }

    public function setCookieUser(string $email)
    {
        $user = $this->getUser($email);
        $userID = $user->getId();
        setcookie('currentUser', $userID, time()+(86400*30),"/");
        $stmt = $this->database->connect()->prepare('
        UPDATE users SET logged_in = true WHERE email = ?
');
        $stmt->execute([$email]);
    }

    public function deleteCookieUser()
    {
        $stmt = $this->database->connect()->prepare(' 
        UPDATE users SET logged_in = false WHERE id = :id
        ');
        $stmt->bindParam(':id',$_COOKIE['currentUser'], PDO::PARAM_INT);
        $stmt->execute();
        setcookie('currentUser', $_COOKIE['currentUser'], time() - 1,"/");
    }
}