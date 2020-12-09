<?php

include_once '../modals/Fhistoric.php';

include_once '../modals/Historic.php';

if(isset($_GET['idTrash'],$_GET['level'],$_GET['weight']) && !empty($_GET['idTrash'])&& !empty($_GET['level'])&& !empty($_GET['weight']) && Fhistoric::checkIfTrashExist($_GET['idTrash']))
{

    $historic=new Historic(null,$_GET['idTrash'],$_GET['level'],$_GET['weight'],null,null,null);

    $hist=Fhistoric::getOneHistoricOfTrash($_GET['idTrash']);


    if(Fhistoric::checkIfHistoricTrashIsSave($_GET['idTrash']) && $hist['dateEmpty']==null)
    {
        if (($_GET['level'])>80) {

            if($hist['dateFull']==null) {
                $historic->setDateFull(date('Y-m-d H:i:s'));
                
            }

            else {
                $historic->setDateFull($hist['dateFull']);
            }

            Fhistoric::updateHistoric($historic);
        } 
        else {

            Fhistoric::updateHistoric($historic);
        }     
    }

    else
    {
        var_dump(Fhistoric::addNewHistoric($historic));
    }

}

else
{
    echo var_dump($_GET);
}
