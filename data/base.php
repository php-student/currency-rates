Базовая валюта:
        <ul class="nav nav-pills">
            <?php
            foreach($currenses as $c){
                $a = '';
                $a = $c==$baseCurrency ? 'active' : '';
                ?>
                <li role="presentation" class="<?=$a?>" >
                    <a href="/?baseCurrency=<?=$c?>">
                        <span class="glyphicon glyphicon-<?=strtolower($c)?>" aria-hidden="true"></span>
                    </a>
                </li>
                <?php
            }
            ?>
</ul>