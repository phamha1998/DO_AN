<?php
function showErrors ($errors, $name){
    if($errors->has($name)){
                        echo'<div class="alert alert-danger alert-dismissible" role="alert">';
                        echo'<button type="button" class="close" data-dismiss="alert">&times;</button>';
                        echo'<strong>'.$errors->first($name).'</strong>';
                        echo'</div>';
    }
}