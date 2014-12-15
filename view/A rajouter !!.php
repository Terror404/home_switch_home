Code postal: 
            <?php
                while ($resHzip=$askHzip->fetch())
                    {
                        echo $resHzip['zip'];
                    }
            ?><br/>
        Adresse :
            <?php
                while ($resHaddress=$askHaddress->fetch())
                    {
                        echo $resHaddress['address'];
                    }
            ?>

        <h3>Informations sur le logement</h3>
        Type : 
            <?php 
                while ($resHtype=$askHtype->fetch())
                    {
                        echo $resHtype['type'];
                    }
            ?><br/>
        Capacité :
            <?php 
                while($resHcap=$askHcap->fetch())
                    {
                        echo $resHcap['capacity'];
                    }
            ?><br/>
        Nombre de chambre : 
            <?php
                while($resHnb=$askHnb->fetch())
                    {
                        echo $resHnb[''];
                    }
            ?><br/>
        Aménagements : 
            <?php
                while($resHfac=$askHfac->fetch())
                    {
                        echo $resHfac['facilities'];
                    }
            ?>
        </div><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

