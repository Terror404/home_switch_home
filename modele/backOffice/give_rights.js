
function direct()
{
var accessLvl=getElementById('selectAccessLvl').attribute('value');
        document.write(accessLvl);
        document.getElementById('accessUserButton').setAttribute('action','\'../controler/back_office.php?page=rights&confirm=\'+accessLvl');
        }
        
 