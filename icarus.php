<?php
class icarus{
    public static function InsertBoards($name){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        khatral::khquery('INSERT INTO n_boards VALUES(NULL, :nm, :unm, :hashcode, NULL)', array(
            ':nm'=>$name,
            ':unm'=>$_SESSION['unme'],
            ':hashcode'=>$randomString
        ));
    }
    public static function DeleteBoards($hash){
        $ret = khatral::khquery('SELECT COUNT(notice_id) AS totalnotices FROM notice_board WHERE notice_board_id=:hashcode', array(
            ':hashcode'=>$hash
        ));
        foreach($ret as $p){
            if($p['totalnotices'] >= 1){
                return "0";
            }else{
                khatral::khquery('DELETE FROM n_boards WHERE board_hash=:hashcode', array(
                    ':hashcode'=>$hash
                ));
                return "1";
            }
        }
    }
    public static function InsertNotice($titl, $content, $priori, $noid){
        khatral::khquery('INSERT INTO notice_board VALUES(NULL, :titl, :content, :priori, :unme, NULL, :noid)', array(
            ':titl'=>$titl,
            ':content'=>$content,
            ':priori'=>$priori,
            ':unme'=>$_SESSION['unme'],
            ':noid'=>$noid
        ));
    }
    public static function DeleteNotice($id){
        khatral::khquery('DELETE FROM notice_board WHERE notice_id=:id', array(
            ':id'=>$id
        ));
    }
    public static function InsertShareNotice($name, $unme, $hashcode){
        $ret = khatral::khquery('SELECT COUNT(share_id) AS totalshare FROM share_notice WHERE share_b_unm=:unm AND share_b_hash=:hashcode', array(
            ':unm'=>$unme,
            ':hashcode'=>$hashcode
        ));
        foreach($ret as $p){
            if($p['totalshare'] >= 1){
                return '1';
            }else{
                khatral::khquery('INSERT INTO share_notice VALUES(NULL, :nm, :unm, :hashcode, NULL)', array(
                    ':nm'=>$name,
                    ':unm'=>$unme,
                    ':hashcode'=>$hashcode
                ));  
                return '0';
            }
        }
    }
    public static function DeleteShare($id){
        khatral::khquery('DELETE FROM share_notice WHERE share_id=:id', array(
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