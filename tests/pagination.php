<?php
require_once ('../src/Mind.php');

$Mind = new Mind();

// url: pagination.php?page OR pagination.php?page=1
// url: pagination.php?p OR pagination.php?p=1
$options = array(
    'prefix'=>'page', // Default p
    'search'=>array(
        'scope'=>'like',
        'keyword'=>'%iyi misin%',
        'column'=>'text',
        'delimiter'=>array(
            'or'=>'AND'
        ),
        'or'=>array(
            array(
                'sender_id'=>1,
                'reciver_id'=>1
            ),
            array(
                'sender_id'=>3,
                'reciver_id'=>3
            )
        )
    ),
    'column'=>array('sender_id','reciver_id','text'), // array / string
    'limit'=>2, // Default 5
    'format'=>'json', // json 
    'sort'=>'id:asc' // asc / ASC / desc / DESC
);
$options['navigation'] = [
    'route_path'=>'page',
    'prev'=>'Prev',
    'next'=>'Next'
];
// $data = $Mind->pagination('messages');
$data = $Mind->pagination('messages', $options);


if($Mind->is_json($data)){

    /* -------------------------------------------------------------------------- */
    /*                                    JSON                                    */
    /* -------------------------------------------------------------------------- */
    echo '<pre>';
    echo $data;
    echo '</pre>';

    $data = $Mind->json_decode($data);

} else {

    /* -------------------------------------------------------------------------- */
    /*                                    ARRAY                                   */
    /* -------------------------------------------------------------------------- */
    echo '<pre>';
    print_r($data['data']);
    echo '</pre>';
}

echo "\n";

/* -------------------------------------------------------------------------- */
/*                                 NAVIGATION                                 */
/* -------------------------------------------------------------------------- */
echo $data['navigation'];

?>
<style>
    .pagination{
        border: 1px solid #e5e5e5;
        padding: 8px;
        border-radius: 4px;
    }
    span.page_selected{
        background-color: #444;
        color: #fff;
    }
    a.page, a.dots, span.page_selected, a.next, a.prev{
        padding:5px;
        margin: 2px;
        text-align: center;
        letter-spacing: 0.7px;
        text-decoration: none;
    }

    a.next, a.prev, a.page{
        background-color: #f3f1f1;
        text-decoration: none;
        color: #333;
    }
    a.next:hover, a.prev:hover, a.page:hover{
        background-color: #ebdfdf;
        color: #333;
    }
    
</style>
