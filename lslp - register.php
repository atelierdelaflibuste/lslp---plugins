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

function add_comedian_page(){
    // echo '<h1>Ajout de comédien(s)</h1>';
    global $wpdb;

    $troupeid=get_user_troupeid();
    // var_dump($troupeid);
    if(!empty($_POST)) {
        // var_dump($_POST);
        // var_dump($troupeid);
        extract($_POST);

        $atelier="";
        if(isset($grafikart)&&$grafikart=="on") $atelier.="arts graphiques";
        if(isset($choreography)&&$choreography=="on") $atelier.=", chorégraphie";
        if(isset($mask)&&$mask=="on") $atelier.=", masques";
        if(isset($mime)&&$mime=="on") $atelier.=", mimes et improvisations";
        if(isset($costume)&&$costume=="on") $atelier.=", costume";
        
        // var_dump($atelier);
        $query="INSERT INTO `comediens` 
        (`comedien_id`, `nom`, `prenom`, `date_naissance`, `sexe`, `taille_t_shirt`, `allergie_remarque`, `atelier`, `troupe_id`) 
        VALUES 
        (NULL, '$lastname', '$firstname', '$birthday', '$gender', '$size', '$remarks', '$atelier', '$troupeid');";

        $r=$wpdb->query($query);
        // var_dump($r);
        if($r!=false) echo '<div class="notice notice-success"><p>Vous avez bien inscrit votre comédien(ne) !</p></div>';
        else echo '<div class="notice notice-error"><p>Une erreur s\'est produite ! Merci de contacter l\'administrateur du site.</p></div>';
    }
    if($troupeid) include_once 'template/comedien.html';
    else echo '<div class="notice notice-error"><p>Vous devez inscrire votre troupe avant de pouvoir ajouter des comédiens !</p></div>';

}

function edit_comedian_page(){
    global $wpdb;  

    $troupeid=get_user_troupeid();

    // var_dump($_GET);
    if(isset($_GET['a'])&&$_GET['a']=="del"){
        $comedian_id=$_GET['id'];
        
        $query="DELETE FROM `comediens` WHERE `comedien_id`='$comedian_id' AND `troupe_id`='$troupeid'";
        
        $r=$wpdb->query($query);
        if($r!=false) echo '<div class="notice notice-success"><p>Comédien(ne) correctement supprimmé(e) !</p></div>';
        else echo '<div class="notice notice-error"><p>Une erreur s\'est produite ! Merci de contacter l\'administrateur du site.</p></div>';
    }

    if(isset($_GET['a'])&&$_GET['a']=="edit"){
        if(isset($_GET['id'])) $comedian_id=$_GET['id'];

        if(isset($_POST['submit'])){
            // var_dump($_POST);
            extract($_POST);

            $query="UPDATE `comediens` SET 
            `nom`='$lastname',
            `prenom`='$firstname',
            `date_naissance`='$birthday',
            `taille_t_shirt`='$size',
            `sexe`='$gender',
            `allergie_remarque`='$remarks'
            WHERE `comedien_id`='$comedian_id'";
            // var_dump($query);
            $r=$wpdb->query($query);
            //var_dump($r);
            if($r!=false) echo '<div class="notice notice-success"><p>Votre comédien(ne) a bien été mise à jour !</p></div>';
            else echo '<div class="notice notice-error"><p>Vous n\'avez modifié aucune donnée ou une erreur s\'est produite ! Merci de contacter l\'administrateur du site.</p></div>';
        }
        else{
            $query="SELECT * FROM `comediens` WHERE `comedien_id`='$comedian_id'";
            $comedien=$wpdb->get_results($query);
    
            include_once 'template/edit_comedien.php';
        }

    }

    $query="SELECT * FROM `comediens` WHERE `troupe_id`=$troupeid";
    $result=$wpdb->get_results($query);
    if(!empty($result)){
        //var_dump($result);
        ?>
        <style>
        #comedian_table td{border-bottom:solid 1px;padding:10px}
        </style>
        <table id="comedian_table" style="border-collapse: collapse;">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>date de naissance</th>
                <th>sexe</th>
                <th>taille de t-shirt</th>
                <th>allergie(s) ou commentaires</th>
                <th>atelier(s)</th>
                <th>actions</th>
            </tr>
        <?php
        foreach($result as $comedian){
            echo '<tr>';
            echo '<td>'.$comedian->nom.'</td>';
            echo '<td>'.$comedian->prenom.'</td>';
            echo '<td>'.$comedian->date_naissance.'</td>';
            $sexe="M";
            if($comedian->sexe=="f") $sexe="F";
            echo '<td>'.$sexe.'</td>';
            echo '<td>'.$comedian->taille_t_shirt.'</td>';
            echo '<td>'.$comedian->allergie_remarque.'</td>';
            echo '<td>'.$comedian->atelier.'</td>';
            echo '<td><a href="?page=edit_comedian&a=edit&id='.$comedian->comedien_id.'">editer</a> <a href="?page=edit_comedian&a=del&id='.$comedian->comedien_id.'">supprimer</a></td>';
            echo '</tr>';
        }
        ?>
        </table>
        <?php
    }
    else echo 'Il n\'y a pas encore de comédie(nes) dans votre troupe';
}

function register_menu(){
    if(restrictly_get_current_user_role()=='admin_troupe') {
        add_menu_page( 'Troupe', 'Troupe', 'read', 'team_page','team_page', 'dashicons-tickets', 7);
        add_submenu_page('team_page','Ajout de comédiens','Ajout de comédiens','read','add_comedian','add_comedian_page');
        add_submenu_page('team_page','Edition de comédiens','Edition de comédiens','read','edit_comedian','edit_comedian_page');
    }
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
    
    $query="
    CREATE TABLE IF NOT EXISTS `comediens` (
      `comedien_id` int(11) NOT NULL AUTO_INCREMENT,
      `nom` text NOT NULL,
      `prenom` text NOT NULL,
      `date_naissance` text NOT NULL,
      `sexe` varchar(1) NOT NULL,
      `taille_t_shirt` varchar(3) NOT NULL,
      `allergie_remarque` text NOT NULL,
      `atelier` text NOT NULL,
      `troupe_id` int(11) NOT NULL,
      PRIMARY KEY (`comedien_id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
    ";
    
    $result=$wpdb->query($query);
    add_register_page();
}

function register_plugin_deactivate(){
    remove_role('admin_troupe');
    delete_register_page();

}

add_action('admin_notices','plugin_debug');
add_action('wp','plugin_debug');

add_action( 'admin_menu', 'register_menu' );

add_filter("page_template", "replace_template_register");
function replace_template_register($page_template)
{
    if(is_page('Enregistrez votre famille')){
        $page_template = plugin_dir_path(__FILE__) . 'template/famille.php';
        return $page_template;
    }
    return $page_template;
}

register_activation_hook(__FILE__, 'register_plugin_activate');
register_deactivation_hook(__FILE__, 'register_plugin_deactivate');