<div class="sub_page">

    <div class="page">
        <ol class="inner flex">
            <li>
                <a href="/">HOME</a>
            </li>
            <li>
                <?
                if ($bo_table) {
                    echo $board[bo_subject];
                } else {
                    echo $page_title;
                }
                ?>
            </li>
        </ol>
    </div>
    <div class="inner flex">
        <article class="section">
            <h3>
                <?
                if ($bo_table) {
                    echo $board[bo_subject];
                } else {
                    echo $page_title;
                }
                ?>
            </h3>