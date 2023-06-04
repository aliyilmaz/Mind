<?php
require_once ('../src/Mind.php');

$Mind = new Mind();
?>

<!-- 
This test is designed to show how it is used on the same page 
with another form that does not validate. 
-->

<?php 
// captcha
if(isset($Mind->post['btn_captcha'])){

    if(empty($Mind->errors['captcha'])){
        echo 'captcha form';
        $Mind->print_pre($Mind->post);
    } else {
        $Mind->abort('401', 'Captcha not found.');
        exit;
    }

}

// Without captcha
if(isset($Mind->post['btn_without_captcha'])){
    if(isset($Mind->post['age'])){
        echo 'Without captcha form';
        $Mind->print_pre($Mind->post);
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=$Mind->base_url;?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="captcha.php" method="post">
    <?=$_SESSION['csrf']['input'];?>
    <?php 

    // $Mind->captcha(); 
    // $Mind->captcha(null); // null
    // $Mind->captcha(''); // null
    // $Mind->captcha(3, 9); length
    $Mind->captcha(3, 2, 320, 60); //width
    // $Mind->captcha(3, 8, 320, 60); height
    // 
    
    ?>

    <input type="text" name="username" placeholder="username">
        <br>
        <button type="submit" name="btn_captcha">Send</button>
    </form>
    <hr>
    
    <form action="captcha.php" method="post">
    <?=$_SESSION['csrf']['input'];?>
    <input type="text" name="username" placeholder="username">
    <input type="text" name="password" placeholder="password">
    <input type="text" name="age" placeholder="age">
        <br>
        <button type="submit" name="btn_without_captcha">Send</button>
    </form>
</body>
</html>