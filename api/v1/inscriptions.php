<?php



ini_set('default_charset', 'UTF-8');
header('Content-Type: application/json;charset=UTF-8');

require_once('../../../../../wp-config.php');


$file = 'inscription';

if (isset($_GET['id'])) {
    $inscriptions_array = get_posts(array('post_parent' => $_GET['id'], 'post_type'  => 'inscription', 'posts_per_page' => -1, 'post_status' => 'publish'));
} else {
    $inscriptions_array = get_posts(array('post_type'  => 'inscription', 'posts_per_page' => -1, 'post_status' => 'publish'));
}




$data =  'Nom;Date;Évènement;Civilite;Prénom;Nom;Email;Téléphone;Choix'  .   "\n";



$fields = ['title', 'first_name', 'last_name', 'email',  'telephone',  'choice'];

foreach ($inscriptions_array as $inscription) {



    $meta_strings = [];
    foreach ($fields as $field) {
        $value =  get_field($field, $inscription->ID);
        if ($value) {
            $value = str_replace(';', ' ', $value);
            $value = preg_replace("/(\r|\n)/", " ", $value);
        } else {
            $value = '-';
        }
        array_push($meta_strings, $value);
    }



    if ($inscription->post_parent > 0) {
        $event_post = get_post($inscription->post_parent);
        $event = str_replace(';', ' ', $event_post->post_title);
    } else {
        $event = '';
    }

    $ar = array(
        $inscription->post_title,
        $inscription->post_date,
        $event
    );

    $ar =  array_merge($ar, $meta_strings);




    //$data .=  implode(',', $ar);
    $data .=  implode(';', $ar);
    $data .=  "\n";
}


// echo $data;



$encoded_csv = mb_convert_encoding($data, 'UTF-16LE', 'UTF-8');



$filename = $file . '_' . date('Y-m-d_H-i', time());
header('Content-type: inscription/vnd.ms-excel');
header('Content-disposition: csv' . date('Y-m-d') . '.csv');
header('Content-disposition: filename=' . $filename . '.csv');
header('Content-Length: ' . strlen($encoded_csv));
$encoded_csv =   chr(255) . chr(254) . $encoded_csv;
print $encoded_csv;

//print_r ($data);

exit;
