<?php
    require_once('../includes/database-functions.php');

    function getAllServices($service) {
        if(empty($service))
            return prepareExecuteAndFetchAll('select * from service');
    
        return prepareExecuteAndFetchAll(
            'select * from service where name like concat(\'%\', :service, \'%\')', ['service' => $service]);
    }
    // Extract and trim the email variable from the URL.
    $x = trim(isset($_GET['service']) ? $_GET['service'] : '');
    // If email is empty then all users are returned.
    $y = getAllServices($x);
?>

<?php if(count($y) === 0) { ?>
    <p class="alert alert-info">No email matches the search <strong>'<?php echo $x; ?>'</strong>.</p>
<?php } else { ?>
    <div class="row">
            <?php foreach($y as $user) { ?>
                
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                <div class="card-body p-3">
                            <div class="col-8">
                                <div class="numbers">
                                <img src= '../<?php echo $user['image_path'];?>'width="150" height="150">
                                </div>
                            </div>
                            <h5 class="font-weight-bolder"> <?php echo $user['name']; ?></h5>
                       
                        
                            </div>
                            </div>
                            </div>
               
            <?php } ?>
            
                  
                    </div>
<?php } ?>
