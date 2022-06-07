<?php
    session_start();

    require "validation.php";

    header('X-FRAME-OPTIONS:DENY');

    if(!empty($_POST)){
        // スーパーグローバル変数
        // 連想配列
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

    function h($str)
    {
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    //入力・確認・完了、input,confirm,thanks
    // CSRF 偽物のinput.php→悪意のあるページ
    $pageFlag=0;
    $errors = validation($_POST);


    if(!empty($_POST["btn_confirm"]) && empty($errors)){
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    ホームページ
    <?php echo h($_POST["url"]);?>
    <br>
    性別
    <?php 
    if($_POST["gender"] === "0"){ echo "男性"; } 
    if($_POST["gender"] === "1"){ echo "女性"; }
    ?>
    <br>
    年齢
    <?php 
    if($_POST["age"] === "1"){ echo "~19歳"; } 
    if($_POST["age"] === "2"){ echo "20歳~29歳"; } 
    if($_POST["age"] === "3"){ echo "30歳~39歳"; } 
    if($_POST["age"] === "4"){ echo "40歳~49歳"; } 
    if($_POST["age"] === "5"){ echo "50歳~59歳"; } 
    if($_POST["age"] === "6"){ echo "60歳~"; } 
    ?>
    <br>
    お問合せ内容
    <?php echo h($_POST["contact"]);?>
    <br>
    <input type="submit" name="back" value="戻る">
    <input type="submit" name="but_submit" value="送信する">
    <input type="hidden" name="your_name" value="<?php echo h($_POST["your_name"]); ?>">
    <input type="hidden" name="email" value="<?php echo h($_POST["email"]); ?>">
    <input type="hidden" name="url" value="<?php echo h($_POST["url"]); ?>">
    <input type="hidden" name="gender" value="<?php echo h($_POST["gender"]); ?>">
    <input type="hidden" name="age" value="<?php echo h($_POST["age"]); ?>">
    <input type="hidden" name="contact" value="<?php echo h($_POST["contact"]); ?>">
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

    <?php if(!empty($errors) && !empty($_POST["btn_confirm"])) : ?>
        <?php echo "<ul>"; ?>
            <?php
            foreach($errors as $error){
                echo "<li>". $error . "</li>";
            }
            ?>
        <?php echo "</ul>" ;?>
    <?php endif; ?>

    <div class="container">
    <div class="row">
    <div class="colmd-6">
        <form method="POST" action="input.php">
            <div class="form-group">
                <label for="your_name">氏名</label>
                <input type="text" class="form-control" id="your_name" name="your_name" 
                    value="<?php if(!empty($_POST["your_name"])){echo h($_POST["your_name"]);} ?>" 
                    required>
            </div>

            <div class="form-group">
            <label for="email">メールアドレス</label>
                <input type="email" class="form-control" id="email" name="email" 
                value="<?php if(!empty($_POST["email"])){echo h($_POST["email"]); }?>"
                required>
            </div>

            <div class="form-group">
            <label for="url">ホームページ</label>
                <input type="url" class="form-control" id="url" name="url" 
                value="<?php if(!empty($_POST["url"])){echo h($_POST["url"]); }?>">
            </div>

            <label for="gender">性別</label>
            <div class="form-check form-check-inline">
                <input type="radio"  class="form-check-input" id="gender1" name="gender" value="0" 
                <?php  if(isset($_POST["gender"]) && $_POST["gender"] === "0" )
                    { echo "checked"; }?>>
                <label class="form-check-label">男性</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="gender2" name="gender" value="1" 
                <?php if(isset($_POST["gender"]) && $_POST["gender"] === "1" )
                    { echo "checked"; } ?> >
                        <label class="form-check-label">女性</label>
            </div>

            <div class="form-group">
            <label for="age">年齢</label>
                <select class="form-control" id="age" name="age">
                    <option value=""
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "" )
                    { echo "selected"; }?> >選択してください</option>
                    <option value="1" 
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "1" )
                    { echo "selected"; }?>>~19歳</option>
                    <option value="2"
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "2" )
                    { echo "selected"; }?>>20歳~29歳</option>
                    <option value="3"
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "3" )
                    { echo "selected"; }?>>30歳~39歳</option>
                    <option value="4"
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "4" )
                    { echo "selected"; }?>>40歳~49歳</option>
                    <option value="5"
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "5" )
                    { echo "selected"; }?>>50歳~59歳</option>
                    <option value="6"
                    <?php  if(isset($_POST["age"]) && $_POST["age"] === "6" )
                    { echo "selected"; }?>>60歳~</option>
                </select>
            </div>

            <div class="form-group">
            <label for="contact">お問合せ内容</label>
                <textarea class="form-control" id="contact" row="3"  name="contact"><?php if(!empty($_POST["contact"])){echo h($_POST["contact"]); }?></textarea>
            
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="coution" name="caution" value="1">
                <label class="form-check-label" for="caution">注意事項のチェックする</label>
            </div>

            <input type="submit" class="btn btn-info" name="btn_confirm" value="確認する">
            <input type="hidden" name="csrf" value="<?php echo $token; ?>">
        </form>
    </div> <!--colmd-6-->
    </div> <!--row-->
    </div> <!--container-->
<?php endif; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>