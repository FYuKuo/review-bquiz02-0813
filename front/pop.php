<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table class="aut w-100">
        <tr>
            <th style="width: 30%;">標題</th>
            <th>內容</th>
            <th style="width: 30%;">人氣</th>
        </tr>
        <?php
        $num = $News->math('COUNT', 'id', ['sh' => 1]);
        $limit = 5;
        $pages = ceil($num / $limit);
        $page = ($_GET['page']) ?? 1;
        if ($page <= 0 || $page > $pages) {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        $limitSql = " Limit $start,$limit";
        $rows = $News->all(['sh' => 1], " ORDER BY `good` DESC" . $limitSql);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td class="clo myhover" style="position: relative;">
                    <?= $row['title'] ?>
                    <div id="alerr">
                        <h3><?= $row['title'] ?></h3>
                        <pre id="ssaa"><?= $row['text'] ?></pre>
                    </div>
                </td>
                <td>
                    <?= mb_substr($row['text'], 0, 20) ?>...
                </td>
                <td>
                    <span class="goodSum"><?= $row['good'] ?></span>個人說讚<div class="good"></div>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if (empty($Log->find(['news_id' => $row['id'], 'user' => $_SESSION['user']]))) {
                    ?>
                            - <span class="myLike" onclick="addGood(<?= $row['id'] ?>,<?= $row['good'] + 1 ?>,'add')">讚</span>
                        <?php
                        } else {
                        ?>
                            - <span class="myLike" onclick="addGood(<?= $row['id'] ?>,<?= $row['good'] - 1 ?>,'re')">收回讚</span>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="page">
        <?php
        if ($page > 1) {
        ?>
            <a href="?do=pop&page=<?= $page - 1 ?>">&lt;</a>
        <?php
        }

        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=pop&page=<?= $i ?>" class="<?= ($page == $i) ? 'nowPage' : '' ?>"><?= $i ?></a>
        <?php
        }
        if ($page < $pages) {
        ?>
            <a href="?do=pop&page=<?= $page + 1 ?>">&gt;</a>
        <?php
        }
        ?>
    </div>
</fieldset>

<script>
    function addGood(id, good, type) {

        $.post('./api/add_good.php', {
            id,
            good,
            type
        }, () => {

            location.reload();

        })
    }


    $('.myhover').hover(function(){
        
        $(this).children().toggle();

    })
</script>