<?php 
/*
*Plugin name: Lycéens sur les planches - Inscription
*Description: Cette extension permettra la gestion des inscriptions des troupes de comédien, pour les représentations du festival de théâtre francophone.
*Plugin URI: https://github.com/jacquesPichon/LyceensSurLesPlanches
*License: GPLv2 or later
*/

require_once('functions.php');


function team_page(){
    global $wpdb;

    $user_datas=wp_get_current_user();
    $user_ID=$user_datas->data->ID;

    $query="SELECT * FROM troupes WHERE user_ID='".$user_ID."';";
    $result=$wpdb->get_results($query);
    
    // rechercher dans la base la troupes associée à l'utilisateur (wp_users)
    // si troupe trouvé : récupérer détails de la troupe et remplir les champs
    if(!empty($result)){
        //echo 'Modification possible ...';
        $troupe=$result[0];
        //var_dump($troupe);
        if(!empty($_POST)){
            // var_dump($_POST);
            extract($_POST);
            $query="
            UPDATE `troupes` SET 
            `nom_responsable`='$name',
            `email`='$email',
            `telephone`='$phone',
            `pays`='$country',
            `ville`='$city',
            `lieu_arrivee`='$arrival_point',
            `date_arrivee`='$arrival_day',
            `lieu_depart`='$departure_point',
            `date_depart`='$departure_day',
            `titre_spectacle`='$title',
            `resume`='$synopsis'
            WHERE `user_ID`='$user_ID'";
            //var_dump($query);
            $r=$wpdb->query($query);
            //var_dump($r);
            if($r!=false) echo '<div class="notice notice-success"><p>L\'inscription de votre troupe a bien été mise à jour.</p></div>';
            else echo '<div class="notice notice-error"><p>Vous n\'avez modifié aucune donnée ou une erreur s\'est produite ! Merci de contacter l\'administrateur du site.</p></div>';

        }
        else include_once 'template/modification.php';
        
    } 
    // sinon : créer une entrée dans la base
    else{
        //echo 'Ajout à la base de donnée ...';
        
        if(!empty($_POST)){
            //var_dump($_POST);
            extract($_POST);
            $query="
            INSERT INTO `troupes` 
            (`troupe_id`, `nom_responsable`, `email`, `telephone`, `nom_troupe`, `titre_spectacle`, `resume`, `pays`, `ville`, `lieu_arrivee`, `date_arrivee`, `lieu_depart`, `date_depart`,`user_ID`) 
            VALUES 
            (NULL, '$name', '$email', '$phone', 'ma troupe', '$title', '$synopsis', '$country', '$city', '$arrival_point', '$arrival_day', '$departure_point', '$departure_day',$user_ID);";
            //var_dump($query);
            $r=$wpdb->query($query);
            if($r!=false) echo '<h1>Merci</h1><div class="notice notice-success"><p>Vous avez bien inscrit votre troupe de comédiens !</p></div>';
            else echo '<div class="notice notice-error"><p>Une erreur s\'est produite ! Merci de contacter l\'administrateur du site.</p></div>';
        }
        else include_once 'template/inscription.html';
    }
    
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
    
    $query="
    CREATE TABLE IF NOT EXISTS `troupes` (
        `troupe_id` int(11) NOT NULL AUTO_INCREMENT,
        `nom_responsable` text NOT NULL,
        `email` text NOT NULL,
        `telephone` text NOT NULL,
        `nom_troupe` text NOT NULL,
        `titre_spectacle` text NOT NULL,
        `resume` text NOT NULL,
        `pays` text NOT NULL,
        `ville` text NOT NULL,
        `lieu_arrivee` text NOT NULL,
        `date_arrivee` text NOT NULL,
        `lieu_depart` text NOT NULL,
        `date_depart` text NOT NULL,
        `user_ID` int(11) NOT NULL,
        PRIMARY KEY (`troupe_id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    ";
    
    global $wpdb;

    $result=$wpdb->query($query);

}

function register_plugin_deactivate(){
    remove_role('admin_troupe');
}

add_action('admin_notices','plugin_debug');
add_action('wp','plugin_debug');

add_action( 'admin_menu', 'register_menu' );

register_activation_hook(__FILE__, 'register_plugin_activate');
register_deactivation_hook(__FILE__, 'register_plugin_deactivate');