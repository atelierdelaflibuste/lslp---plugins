<?php

function restrictly_get_current_user_role() {//https://catapultthemes.com/get-current-user-role-in-wordpress/
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $role = ( array ) $user->roles;
        return $role[0];
    } else {
        return false;
    }
}

function get_user_troupeid(){
    global $wpdb;

    $user_datas=wp_get_current_user();
    $user_ID=$user_datas->data->ID;

    $query="SELECT * FROM troupes WHERE user_ID='".$user_ID."';";
    $result=$wpdb->get_results($query);
    // var_dump($result);

    if(!empty($result)) return $result[0]->troupe_id;
    else return false;
}

add_action('wp_head', 'bootstrap');
function bootstrap(){
  ?>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <?php
};

add_action('wp_footer', 'bootstrap_footer');
function bootstrap_footer(){
  ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <?php
};
