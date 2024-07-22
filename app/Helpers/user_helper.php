<?php
function userLogin(){
    $db = \Config\Database::connect();
    return $db->table('login')->where('id_user', session('id_user'))->get()->getRow();
}
?>