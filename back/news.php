<fieldset>
    <legend>最新文章管理</legend>

    <form action="./api/edit_news.php" method="post">
        <table class="ct w-100">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $num = $News->math('COUNT', 'id');
            $limit = 3;
            $pages = ceil($num / $limit);
            $page = ($_GET['page']) ?? 1;
            if ($page <= 0 || $page > $pages) {
                $page = 1;
            }
            $start = ($page - 1) * $limit;
            $limitSql = " Limit $start,$limit";
            $rows = $News->all($limitSql);
            $i = 0;
            foreach ($rows as $key => $row) {
                $i++
            ?>
                <tr>
                    <td class="clo" style="width: 5%;"><?= $start + $i ?></td>
                    <td style="width: 75%;"><?= $row['title'] ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                </tr>
            <?php
            }
            ?>

            <tr>
                <td colspan="4"><input type="submit" value="確定修改"></td>
            </tr>
        </table>
    </form>

    <div class="page ct">
        <?php
        if ($page > 1) {
        ?>
            <a href="?do=news&page=<?= $page - 1 ?>">&lt;</a>
        <?php
        }

        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <a href="?do=news&page=<?= $i ?>" class="<?= ($page == $i) ? 'nowPage' : '' ?>"><?= $i ?></a>
        <?php
        }
        if ($page < $pages) {
        ?>
            <a href="?do=news&page=<?= $page + 1 ?>">&gt;</a>
        <?php
        }
        ?>
    </div>
</fieldset>