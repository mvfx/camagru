<?php

$


<div class="form">


    <form action="/user/join" method="POST">

            <div class="row">REGISTRATION</div>


            <br/>
            <div class="row">LOGIN</div>
            <div class="row">
                <input type="text" name="login" value="<?= ($data['login']) ? $data['login'] : '';?>" />
            </div>

            <br/>
            <div class="row">EMAIL</div>
            <div class="row">
                <input type="text" name="email" value="" />
            </div>

            <br/>
            <div class="row">PASSWORD</div>
            <div class="row">
                <input type="password" name="password" value="" />
            </div>

            <br/>
            <div class="row">REPEAT PASSWORD</div>
            <div class="row">
                <input type="password" name="repeat_password" value="" />
            </div>


            <br/>
            <div class="row">
                <input type="submit" name="submit" value="JOIN" />
            </div>
        </form>

</div>