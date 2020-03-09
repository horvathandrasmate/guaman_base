<?php

?>

<link rel="stylesheet" href="<?php echo css_url('welcome.css') ?>">
<div class="center">
    <h1>
        Welcome to <i><b><?php echo $this->config->item("project_name")?></b></i>

    </h1>
    <div class="bottom-center">
        <a class="btn btn-primary " href="<?php echo base_url('account/login')?>" >
            LOGIN
        </a>
    </div>
</div>
