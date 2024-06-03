<?php

function data_list(){
    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=mgarden', 'root', '');

    // Get all data from the products table
    $sql = 'Select * from cottages c join rooms r on c.id=r.CottageID ORDER BY id ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    // Loop through the results and add them to the table 
    foreach ($results as $row) {
    ?>
        <?php 
            if ($row['type'] == 'ROOM'){
                echo '<div class="col-md-6 col-lg-4 filtr-item" data-category="1">';
            }else if ($row['type'] == 'NIPA'){
                echo '<div class="col-md-6 col-lg-4 filtr-item" data-category="2">';
            }else{
                echo '<div class="col-md-6 col-lg-4 filtr-item" data-category="all">';
            }
        ?>
        
            <div class="card border-dark">
                <div class="card-header bg-dark text-light">
                    <h5 class="m-0"><?php echo $row['name']; ?></h5>
                </div><img class="img-fluid card-img w-100 d-block rounded-0" src="<?php echo '../'.$row['picture']; ?>" />
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg class="bi bi-check-lg" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                </svg></span><span>Price Day <strong><?php echo '₱'.number_format($row['priceDay'], 2, '.', ','); ?></strong></span></li>
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg class="bi bi-check-lg" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                </svg></span><span>Price Night <strong><?php echo '₱'.number_format($row['priceNight'], 2, '.', ','); ?></strong></span></li>
                                <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon-primary-light bs-icon me-2"><svg class="bi bi-check-lg" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"></path>
                                </svg></span><span>Price Package <strong><?php echo '₱'.number_format($row['pricePackage'], 2, '.', ','); ?></strong></span></li>
                                </svg></span><span>Room Capacity <strong><?php echo ($row['RoomCapacity'] == 0) ? 10 : $row['RoomCapacity']; ?></strong></span></li>

                    </ul>
                </div>
                <div class="d-flex card-footer">
                    <button class="btn btn-dark btn-sm" type="button" data-bs-target="#add" data-bs-toggle="modal" data-id="<?php echo $row['id']?>">
                    <i class="fa fa-eye"></i> Reserve</button>
                </div>
            </div>
        </div> 

    <?php
    }
}

?>

