<div style="margin: 5px 0;">
    目前位置：首頁 > 分類網誌 > <span class="changeTile">健康新知</span>
</div>
<div class="aut just-c d-flex">
    <fieldset style="width: 15%;">
        <legend>分類網誌</legend>
    
        <p class="listP" onclick="changeText('健康新知') ,getNews(1)">健康新知</p>
        <p class="listP" onclick="changeText('菸害防制') ,getNews(2)">菸害防制</p>
        <p class="listP" onclick="changeText('癌症防治') ,getNews(3)">癌症防治</p>
        <p class="listP" onclick="changeText('慢性病防治') ,getNews(4)">慢性病防治</p>
    </fieldset>
    
    <fieldset style="width: 60%;" class="newsList">
        <legend class="changeTile2">文章列表</legend>

    </fieldset>

</div>


<script>

    function changeText(text){

        $('.changeTile').text(text);
    }

    getNews(1);

    function getNews(type){
        $('.newsList').children('.list_item').remove();
        $('.newsList').children('.newsText').remove();

        $.get('./api/get_news.php',{type},(res)=>{
            res = JSON.parse(res);

            // console.log(res);

            let textList = '';

            res.forEach((element,key) => {
                textList += `<div class="list_item" onclick="showNews(${element.id})">${element.title}</div>`;
            });

            $('.newsList').append(textList);
            $('.changeTile2').text('文章管理');
            
        })
    }

    function showNews(id){
        $('.newsList').children('.list_item').remove();
        $('.newsList').children('.newsText').remove();

        $.get('./api/show_news.php',{id},(res)=>{
            res = JSON.parse(res);

            let text = `<div class="newsText"">${res.text}</div>`;

            $('.newsList').append(text);

            $('.changeTile2').text(res.title);
            
        })
    }
</script>