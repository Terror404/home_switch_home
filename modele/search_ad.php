<?php $DB = new PDO("mysql:host=localhost;dbname=home_switch_home", "root", "");
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
$req='';
$reqBase='SELECT DISTINCT ad.title, ad.date_begin, ad.length, house.pictures, house.rating, user.id 
                                     FROM ad, house, house_area, area, ad_criteria, criteria, user , criteria_house , house_criteria_house 
                                     WHERE ad.id_house= house.id 
                                     AND house.id_user=user.id 
                                     AND house.id=house_area.id_house 
                                     AND area.id=house_area.id_area 
                                     AND ad.id=ad_criteria.id_ad 
                                     AND criteria.id=ad_criteria.id_criteria
                                     AND criteria_house.id=house_criteria_house.id_criteria_house
                                     AND house.id=house_criteria_house.id_house';
   
//creation of the query based on the existence of the criterias    
    
    
     
   //dates

    if (isset($_POST['dateBegin']) AND ($_POST['dateBegin']!='')) 
        {
        $dateBegin=$_POST['dateBegin'];
        $req=$req.' AND ad.date_begin>='.$dateBegin;
        }
    
    
    if (isset($_POST['adLength']) && ($_POST['adLength']!='')) 
        {
        $adLength=$_POST['adLength'];
        $req=$req.' AND ad.length='.$adLength;  
        }
    
    //area
      
        if (isset($_POST['area']) AND $_POST['area']!='') 
        {
            $req=$req.' AND area.name= \''.$_POST['area'].'\'';
           
        }
     
    
    //type of house
        
    if (isset($_POST['houseType']) && ($_POST['houseType']!='')) 
        {
        $houseType=$_POST['houseType'];
        $req=$req.' AND house.house_type=\''.$houseType.'\'';   
        }   
        
    //number of people
        
    if (isset($_POST['nbrPeople']) AND $_POST['nbrPeople'] != '') 
        {
        $nbrPeople=$_POST['nbrPeople'];
        $req=$req.' AND house.nbr_people='.$nbrPeople;
        }
   
    
    //number of rooms
    
    if (isset($_POST['nbrRooms']) AND $_POST['nbrRooms'] != '') 
        {
        $nbrRooms=$_POST['nbrRooms'];
        $req=$req.' AND house.nbr_room='.$nbrRooms;
        }
    
    
   
    
    //layouts
   
    $ask='';
    
    
    
        function fctLayout($name)
    {
        global $ask;
        
        global $reqBase;
                        
        if (isset($_POST[$name]) AND $_POST[$name] === 'on') 
        {
            $ask=$ask.' OR criteria_house.name=\''.$name.'\'';
            
        }
        
 
    }
    
    
    fctLayout('garden');
    echo $ask.'<br/><br/>';
    
    fctLayout('cour');
    
    fctLayout('uncoveredPool');
     
    fctLayout('coveredPool');
   
    fctLayout('garage');
    
    fctLayout('wifi');
    
    fctLayout('allowedSmoker');
    
    fctLayout('disabledAccess');
    
    
    
    
    //on prend en compte les critères animaux.
    
    if (isset($_POST['allowedAnimals']) AND $_POST['allowedAnimals']==='on')
        {
            $ask=$ask.' AND criteria.name=\'allowed_animals\'';
            
            if (isset($_POST['dog']) AND $_POST['dog']==='on')
            {
                $ask=$ask.' AND criteria.name=\'allowed_dog\{';    
            }
            if (isset($_POST['cat']) AND $_POST['cat']==='on')
            {
                $ask=$ask.' AND criteria.name=\'allowed_cat\'';    
            }
            if (isset($_POST['rats']) AND $_POST['rats']==='on')
            {
                $ask=$ask.' AND criteria.name=\'allowed_rats\'';    
            }
            if (isset($_POST['other']) AND $_POST['other']==='on')
            {
                $ask=$ask.' AND criteria.name=\'allowed_other\'';    
            }
            
        
        }
    elseif(isset($_POST['allowedAnimals']) AND $_POST['allowedAnimals']==='')
    {
        $ask=$ask.' AND criteria.name!=\'allowed_animals\'';
    }
    
    $askFinal=$reqBase.$req.$ask;
    echo $askFinal;
    
    //writing the query adding the result of the previous tests
    
   
    
    
    
    try{
        $askResearch = $DB->prepare($askFinal);
        
        $askResearch->execute();
    } catch (PDOException $e){
        $e->getMessage();
    }
    
    //test d'algorythme de recherche

    $viewPriority=$DB->prepare('CREATE VIEW viewPriority AS SELECT criteria_house.id');
    
    while($resData=$askResearch->fetch())
{
        $askPriority=$DB->prepare('SELECT COUNT ad_id.id FROM criteria_house WHERE ad_id.id='.$resData['id']);
        $askPriority->execute();
        
}

$viewSearch=$DB->prepare('CREATE VIEW viewSqlResearch AS SELECT DISTINCT ad.title, ad.date_begin, ad.length, house.pictures, house.rating, user.id 
                                     FROM ad, house, house_area, area, ad_criteria, criteria, user , criteria_house , house_criteria_house 
                                     WHERE ad.id_house= house.id 
                                     AND house.id_user=user.id 
                                     AND house.id=house_area.id_house 
                                     AND area.id=house_area.id_area 
                                     AND ad.id=ad_criteria.id_ad 
                                     AND criteria.id=ad_criteria.id_criteria
                                     AND criteria_house.id=house_criteria_house.id_criteria_house
                                     AND house.id=house_criteria_house.id_house'.$req.$ask);
    $viewSearch->execute;
    
    while($resData=$askResearch->fetch())
{
        $askPriority=$DB->prepare('SELECT COUNT(house_criteria_house.id_criteria_house) AS priority
                                     FROM house, criteria_house , house_criteria_house 
                                     WHERE criteria_house.id=house_criteria_house.id_criteria_house
                                     AND house.id=house_criteria_house.id_house
                                     AND house.id='.$resData['id']);
        $askPriority->execute();
        $resPriority=$askPriority->fetch();
        $priority=$resPriority['priority'];
        $setPriority=$DB->prepare('UPDATE ad SET priority='.$priority.' WHERE ad.id='.$resData['id']);
        
        $setViewSearch=$DB->prepare('INSERT INTO viewSqlSearch');
}
        
        
        
        
        
    
    
    
    
    
    
    

?>
