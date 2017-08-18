<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Misha Levitsky"/>
    <title>Michael Levitsky - Test</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="link">
    <input type="submit" name="submit" value="Парсер">
</form>
<div>
    <?php
    include_once('phpQuery.php');
    if ($_POST['submit']) {
        $doc = $_POST['link'];
        $site = file_get_contents($doc);
        $pq = phpQuery::newDocument($site);
        $res = $pq->find('.seo-text');
        $itemCheck = $res->stack();
        if (count($itemCheck) > 0) {
            foreach ($res as $elem) {
                $des = pq($elem)->text();
                $list = str_replace(array(" "), '', $des);
                $count = mb_strlen($list, 'utf-8');
                echo "<h3>Текст присутній!</h3>";
                echo "<h2>Об'єм символів без пробілів та без тегів:" . $count . "</h2>";
                echo $des;
            }
        } else {
            echo "<h2>Тексту немає</h2>";
        }
    }
    ?>
</div>
</body>
</html>




