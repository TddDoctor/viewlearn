<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once('database-file.php');
include_once('security_rules.php');
include_once('page.php');
include_once('functions.php');



date_default_timezone_set('Africa/Kampala');
class config{

static function page(){
$menu=$_GET['ref_content'];
if($menu!=""){
if($_SESSION['ID']==""){
if($menu=="login"){
$content=true;
if($content==true){
$page=new page;
$page->login_interface();
}    
}elseif($menu=="register"){
$content=true;
$page=new page;
$page->signup_interface();    
}else{
$content=false;
echo page::page_error($content);
$page=new page;
$page->home_interface(); 
}
}elseif($_SESSION['ID']!=""){
$page=new page;
if($menu==1){
$page->count_dashboard();    
}elseif($menu==2){
    
}elseif($menu==3){
    
}elseif($menu==4){
    
}elseif($menu==5){
    
}elseif($menu==6){
    
}elseif($menu==7){
    
}elseif($menu==8){
    
}elseif($menu==md5('logout_learnview')){
if(session_destroy()){
header('Location:index.php');
}
}    
}
}else{
$page=new page;
$page->home_interface();
}
}    
    
function reg_check($session){
if($session!=""){
$db=new db;
$get=$db->get("SELECT ID FROM signup WHERE contact='$session' LIMIT 1");
$num=number_rows($get);
if($num==0){
$status='new';
}elseif($num==1){
$status='exist';
}
return $status;
}
}    
    
    
    
function return_user(){
$session=$_SESSION['ID'];
if($session!=""){
$db=new db;
$get=$db->get("SELECT * FROM signup WHERE contact='$session' LIMIT 1");
$num=number_rows($get);
if($num==1){
$row=record($get);
return $row;
}else{
error('user cannot be found');
}
}    
}    
    
    
    
function session_establish(){
$id=$_SESSION['ID'];
if($id!=""){
$sessionID=$_GET['ref_content'];
$db=new db;
return $post=$db->post("INSERT INTO session(userID,name,status)VALUES('$id','$sessionID','started')");    
}
}    
    
    
    
    
function session_terminate(){
$id=$_SESSION['ID'];
if($id!=""){
$sessionID=$_GET['ref_content'];
$db=new db;
return $post=$db->post("UPDATE session SET status='completed' WHERE userID='$id' AND name='$sessionID'");    
}
}    
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
} 
    











?>