<?php
class icarus{
    public static function InsertBoards($name){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        khatral::khquery('INSERT INTO n_boards VALUES(NULL, :nm, :unm, :hashcode, :office, NULL)', array(
            ':nm'=>$name,
            ':unm'=>$_SESSION['unme'],
            ':hashcode'=>$randomString,
            ':office'=>$_SESSION['office']
        ));
    }
    public static function InsertApprovalFlow($flowNm, $office){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        khatral::khquery('INSERT INTO approval_flow VALUES(NULL, :nm, :office, :hashcode, NULL)', array(
            ':nm'=>$flowNm,
            ':office'=>$office,
            ':hashcode'=>$randomString
        ));
    }
    public static function InsertFlowUser($nm, $flow, $office){
        khatral::khquery('INSERT INTO flow_user VALUES(NULL, :nm, :flow, :office)', array(
            ':nm'=>$nm,
            ':flow'=>$flow,
            ':office'=>$office
        ));
    }
    public static function DeleteFlowUser($id){
        khatral::khquery('DELETE FROM flow_user WHERE user_id=:id', array(
            ':id'=>$id
        ));
    }
    public static function GetFlowUsers($flow, $office){
        return khatral::khquery('SELECT * FROM flow_user WHERE user_flow=:flow AND user_office=:office', array(
            ':flow'=>$flow,
            ':office'=>$office
        ));
    }
    public static function GetFlowWOTParm(){
        return khatral::khquerypar('SELECT * FROM approval_flow');
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
    public static function InsertUsers($nm, $pass, $role, $office){
        $ret = khatral::khquery('SELECT COUNT(user_id) AS totalusrs FROM user WHERE user_nm=:unm', array(
            ':unm'=>$nm
        ));
        foreach($ret as $p){
            if($p['totalusrs'] >= 1){
                return '1';
            }else{
                $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
                $office_set = '';
                if($role == "1" || $role == '3'){
                    $office_set = '';
                }else{
                    $office_set = $office;
                }
                khatral::khquery('INSERT INTO user VALUES(NULL, :nm, :pass, :typ, :office)', array(
                    ':nm'=>$nm,
                    ':pass'=>$pass_hashed,
                    ':typ'=>$role,
                    ':office'=>$office_set
                ));
                return '0';
            }
        }
    }
    public static function InsertOffice($officenm){
        $ret = khatral::khquery('SELECT COUNT(office_id) AS tot_offices FROM office WHERE office_nm=:unm', array(
            ':unm'=>$officenm
        ));
        foreach($ret as $p){
            if($p['tot_offices'] >= 1){
                return '1';
            }else{
                khatral::khquery('INSERT INTO office VALUES(NULL, :nm, NULL)', array(
                    ':nm'=>$officenm
                ));
                return '0';
            }
        }
    }
    public static function GetOfficeWOTParm(){
        return khatral::khquerypar('SELECT * FROM office');
    }
    public static function DeleteUsers($id){
        khatral::khquery('DELETE FROM user WHERE user_id=:id', array(
            ':id'=>$id
        ));
        return "1";
    }
    public static function insertmtrlsales($code, $mtrlnm, $hsn, $rate, $cgst, $sgst, $openbal, $loc){
        khatral::khquery('INSERT INTO mtrlsales VALUES(NULL, :code, :mtrl_nm, :hsncode, :rate, :cgst, :sgst, :open_bal, :loc, :usr)', array(
            ':code'=>$code,
            ':mtrl_nm'=>$mtrlnm,
            ':hsncode'=>$hsn,
            ':rate'=>$rate,
            ':cgst'=>$cgst,
            ':sgst'=>$sgst,
            ':open_bal'=>$openbal,
            ':loc'=>$loc,
            ':usr'=>$_SESSION['office']
        ));
    }
    public static function insertEntrySo($dt, $finyear, $custnm, $sono, $invno, $valid, $stat){
        khatral::khquery('INSERT INTO entryso VALUES(NULL,:fin, :dt,  :custnm, :sono, :invno, :valid, :stat, :inst)', array(
            ':fin'=>$finyear,
            ':dt'=>$dt,
            ':custnm'=>$custnm,
            ':sono'=>$sono,
            ':invno'=>$invno,
            ':valid'=>$valid,
            ':stat'=>$stat,
            ':inst'=>$_SESSION['office']
        ));
    }
    public static function insertItemsSo($itemn, $hsn, $quant, $rte, $cgst, $sgst, $tot, $entrypo){
        khatral::khquery('INSERT INTO itemsso VALUES(NULL, :nm, :hsn, :quant, :rte, :cgst, :sgst, :tot, :entrypo)', array(
            ':nm'=>$itemn,
            ':hsn'=>$hsn,
            ':quant'=>$quant,
            ':rte'=>$rte,
            ':cgst'=>$cgst,
            ':sgst'=>$sgst,
            ':tot'=>$tot,
            ':entrypo'=>$entrypo
        ));
    }
    public static function insertSotxTot($freight, $dis, $terms, $poid){
        khatral::khquery('INSERT INTO totandtaxso VALUES(NULL, :fright, :discounts, :terms, :poid)', array(
            ':fright'=>$freight,
            ':discounts'=>$dis,
            ':terms'=>$terms,
            ':poid'=>$poid
        ));
    }
    public static function insertWebsite($webnm, $offnm){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 25; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        khatral::khquery('INSERT INTO website VALUES(NULL, :hashcode, :nm, :unm, :inst)', array(
            ':hashcode'=>$randomString,
            ':nm'=>$webnm,
            ':unm'=>$_SESSION['unme'],
            ':inst'=>$offnm
        ));

    }
    public static function insertPages($pagenm, $pagepath, $pagewebhash, $prodnm, $prodver, $proddown, $type){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 12; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if($type == "0"){
            khatral::khquery('INSERT INTO home_page VALUES(NULL, :nm, :hashcode, :paths, :webhash)', array(
                ':nm'=>$pagenm,
                ':hashcode'=>$randomString,
                ':paths'=>$pagepath,
                ':webhash'=>$pagewebhash
            ));
        }else{
            khatral::khquery('INSERT INTO product_page VALUES(NULL, :nm, :hashcode, :paths, :webhash, :prodnm, :prodver, :proddown)', array(
                ':nm'=>$pagenm,
                ':hashcode'=>$randomString,
                ':paths'=>$pagepath,
                ':webhash'=>$pagewebhash,
                ':prodnm'=>$prodnm,
                ':prodver'=>$prodver,
                ':proddown'=>$proddown
            ));
        }
    }
    public static function insertFinYear($from_to, $inst){
        khatral::khquery('INSERT INTO fin_year VALUES(NULL, :year_from, :inst)', array(
            ':year_from'=>$from_to,
            ':inst'=>$inst
        ));
    }
    public static function GetWebsite(){
        return khatral::khquerypar('SELECT * FROM website');
    }
    public static function GetPage($type){
        if($type == "0"){
            return khatral::khquerypar('SELECT * FROM home_page');
        }else{
            return khatral::khquerypar('SELECT * FROM product_page');
        }
    }
    public static function GetProdQuery($webhash, $pagehash){
        return khatral::khquery('SELECT * FROM product_page WHERE page_hash=:pagehash AND page_web_hash=:webhash', array(
            ':pagehash'=>$pagehash,
            ':webhash'=>$webhash
        ));
    }
    public static function DisplayVersion(){
        echo 'v0.1.1';
    }
    public static function DisplayVerBuild(){
        echo 'v0.1.1 build23042021031020am-r20';
    }
    public static function DisplayKhatralVersion(){
        echo '0.0.6-r845';
    }
}