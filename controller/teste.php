<?php

if(unlink("../view/img/users/20230514_131336.jpg")){
    echo "arquivo deletado com sucesso";
}else{
    echo "não foi possível deletar o arquivo!";
}

?>