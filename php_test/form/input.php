<?php
    session_start();
    header('X-FRAME-OPTIONS:DENY');

    if(!empty($_SESSION)){
        // スーパーグローバル変数
        // 連想配列
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    }

    function h($str)
    {
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    //入力・確認・完了、input,confirm,thanks
    // CSRF 偽物のinput.php→悪意のあるページ
    $pageFlag=0;
    if(!empty($_POST["but_confirm"])){
        $pageFlag = 1;
    }
    if(!empty($_POST["but_submit"])){
        $pageFlag = 2;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   

<?php if($pageFlag === 1):?>
    <?php if($_POST["csrf"] === $_SESSION["csrfToken"]):?>
    <form method="POST" action="input.php">
    氏名
    <?php echo h($_POST["your_name"]); ?>
    <br>
    メールアドレス
    <?php echo h($_POST["email"]);?>
    <br>
    <input type="submit" name="back" value="戻る">
    <input type="submit" name="but_submit" value="送信する">
    <input type="hidden" name="your_name" value="<?php echo h($_POST["your_name"]); ?>">
    <input type="hidden" name="email" value="<?php echo h($_POST["email"]); ?>">
    <input type="hidden" name="csrf" value="<?php echo h($_POST["csrf"]); ?>">
    </form>
    <?php endif; ?>
<?php endif; ?>


<?php if($pageFlag === 2):?>
    <?php if($_POST["csrf"] === $_SESSION["csrfToken"]):?>
    送信が完了しました。
    <?php unset($_SESSION["csrfToken"]);?>
    <?php endif; ?>
<?php endif; ?>


<?php if($pageFlag === 0):?>
    <?php  
        if(!isset($_SESSION["csrfToken"])){
            $csrfToken = bin2hex(random_bytes(32)); 
            $_SESSION["csrfToken"] = $csrfToken;
        }
        $token = $_SESSION["csrfToken"];
    ?>

    <form method="POST" action="input.php">
    氏名
    <input type="text" name="your_name" 
        value="<?php if(!empty($_POST["your_name"])){echo h($_POST["your_name"]);} ?>">
    <br>
    メールアドレス
    <input type="email" name="email" 
    value="<?php if(!empty($_POST["email"])){echo h($_POST["email"]); }?>">
    <br>
    <input type="submit" name="but_confirm" value="確認する">
    <input type="hidden" name="csrf" value="<?php echo $token; ?>">
    </form>
<?php endif; ?>


</body>
</html>