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