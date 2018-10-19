<?php 
/*
*Plugin name: Lycéens sur les planches - Inscription
*Description: Cette extension permettra la gestion des inscriptions des troupes de comédien, pour les représentations du festival de théâtre francophone.
*Plugin URI: https://github.com/jacquesPichon/LyceensSurLesPlanches
*License: GPLv2 or later
*/

require_once('functions.php');

function team_page(){
    include_once 'template/inscription.html';
}
function register_menu(){
    if(restrictly_get_current_user_role()=='admin_troupe') add_menu_page( 'Troupe', 'Troupe', 'read', 'team_page','team_page', 'dashicons-tickets', 7);
}

function plugin_debug(){

    // $role=get_role('admin_troupe');
    // if($role==null){
        // echo 'création du role ...';
    // } 
    // else echo 'le rôle existe déjà !';
    // var_dump(restrictly_get_current_user_role());

}

function register_plugin_activate(){
    $role=get_role('admin_troupe');
    if($role==null){
        add_role('admin_troupe','Responsable de troupe',array('read'=>true));
    } 

}

function register_plugin_deactivate(){
    remove_role('admin_troupe');
}

add_action('admin_notices','plugin_debug');
add_action('wp','plugin_debug');

add_action( 'admin_menu', 'register_menu' );

register_activation_hook(__FILE__, 'register_plugin_activate');
register_deactivation_hook(__FILE__, 'register_plugin_deactivate');