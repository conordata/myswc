<?php

include_once '../modals/Fhistoric.php';

include_once '../modals/Historic.php';
 

if(isset($_GET['idTrash'],$_GET['level'],$_GET['weight']) && !empty($_GET['idTrash'])&& !empty($_GET['level'])&& Fhistoric::checkIfTrashExist($_GET['idTrash']))
{
    // Gets values sent from the trast bin and put it in new instance of Historic Clas
    $historic=new Historic(null,$_GET['idTrash'],$_GET['level'],$_GET['weight'],null,null,null); 

    $hist=Fhistoric::getOneHistoricOfTrash($_GET['idTrash']);

    // Update values in the database
    if(Fhistoric::checkIfHistoricTrashIsSave($_GET['idTrash']) && $hist['dateEmpty']==null)
    {
        if (($_GET['level'])>80) {  // Level threshold

            if($hist['dateFull']==null) {
                $historic->setDateFull(date('Y-m-d H:i:s'));
                
            }

            else {
                $historic->setDateFull($hist['dateFull']);
            }
            // Call function to update value in the database
            Fhistoric::updateHistoric($historic);
        } 
        else {

            Fhistoric::updateHistoric($historic);
        }     
    }
    // insert new value in the database
    else
    {   // Call function to insert new record in the database
        var_dump(Fhistoric::addNewHistoric($historic));
    }

}

else
{
    echo var_dump($_GET);
}
