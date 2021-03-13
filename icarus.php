<?php
class icarus{
    public static function InsertNotice($titl, $content, $priori){
        khatral::khquery('INSERT INTO notice_board VALUES(NULL, :titl, :content, :priori, :unme, NULL)', array(
            ':titl'=>$titl,
            ':content'=>$content,
            ':priori'=>$priori,
            ':unme'=>$_SESSION['unme']
        ));
    }
    public static function DeleteNotice($id){
        khatral::khquery('DELETE FROM notice_board WHERE notice_id=:id', array(
            ':id'=>$id
        ));
    }
    public static function InsertUsers($nm, $pass, $role){
        $ret = khatral::khquery('SELECT COUNT(user_id) AS totalusrs FROM user WHERE user_nm=:unm', array(
            ':unm'=>$nm
        ));
        foreach($ret as $p){
            if($p['totalusrs'] >= 1){
                return '1';
            }else{
                $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
                khatral::khquery('INSERT INTO user VALUES(NULL, :nm, :pass, :typ)', array(
                    ':nm'=>$nm,
                    ':pass'=>$pass_hashed,
                    ':typ'=>$role
                ));
                return '0';
            }
        }
    }
    public static function DeleteUsers($id){
        khatral::khquery('DELETE FROM user WHERE user_id=:id', array(
            ':id'=>$id
        ));
        return "1";
    }
    public static function DisplayVersion(){
        echo 'v0.1';
    }
    public static function DisplayVerBuild(){
        echo 'v0.1 build28022021121210am-r12';
    }
    public static function DisplayKhatralVersion(){
        echo '0.0.6-r845';
    }
}