<?php
    //postデータを受け取る
    $ken = $_POST['request'];

    //受け取ったデータが空でなければ
    if (!empty($ken)) {

        //pdoインスタンス生成
        $pdo = new PDO ('mysql:host=127.0.0.1;dbname=sample;charset=utf8', 'root', '');
        //SQL文作成
        $sql = "select city from test where prefecture = '".$ken."'";
        //SQL実行
        $results = $pdo->query($sql);
        //出力ごにょごにょ


        echo '<table class="list_table">';
        echo "<tr>";
        echo "<th>市町村</th>";
        echo "</tr>";
        //データベースより取得したデータを一行ずつ表示する
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>".$result['city']."</td>";
            echo "</tr>";
        }
        echo "</table>";

        $sql = "insert into test (prefecture, city) values ('奈良', '奈良市')";
        $res = $pdo->query($sql);
        $pdo = null;

    //空だったら
    } else {
        echo '<p id="tekito">エラー：都道府県を選択して下さい。</p>';
    }

?>
