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

function get_register_page(){
    $pages=get_pages(array('authors'=>'lslp'));
    foreach($pages as $page){
      if($page->post_title=="Enregistrez votre famille") return $page->ID;
    }
    return false;
}
function delete_register_page(){
    $pageid=get_register_page();
    if($pageid){
      var_dump($pageid);
      var_dump(wp_delete_post($pageid,true));
    }
  }
function add_register_page(){
    $pageexist=false;

    if(get_register_page()) $pageexist=true;

    if(!$pageexist){
    //add page
    $my_post = array(
    'post_title' => 'Enregistrez votre famille',
    'post_content' => 'Ici prochainement le formulaire d\'inscription ...',
    'post_status' => 'publish',
    'post_author' => 1,
    'post_type' => 'page'
    );

    $pageid=wp_insert_post( $my_post );
    //echo "added page";
    if(is_int($pageid)) add_register_item_menu($pageid);
    }
}
function add_register_item_menu($pageid){
    $locations = get_nav_menu_locations();
  
    reset($locations);
    $first_key = key($locations);
    //var_dump($first_key);
    $menu_id = $locations[ $first_key ] ;
    // var_dump($menu_id);
    $menu=wp_get_nav_menu_object($menu_id);
    //var_dump($menu);
    $menu_item_data = array(
      'menu-item-object-id' => $pageid, // ID of the page you want to add
      'menu-item-parent-id' => 0,              // top level menu item
      'menu-item-position' => 0,               // setting position to 0 will add it to the end
      'menu-item-object' => 'page',
      'menu-item-type' => 'post_type',
      'menu-item-status' => 'publish'
    );
    wp_update_nav_menu_item( $menu->term_id, 0, $menu_item_data );
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
