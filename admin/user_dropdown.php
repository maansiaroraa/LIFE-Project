<?php require_once('../includes/database-functions.php'); ?>
<?php $users = getUsers(); ?>
  
<!DOCTYPE html>
<html lang="en">
    <body>

    <!-- dropdown to select registered users, data from the database -->
        <div class="form-group row col-md-4">
            <label class='text-sm text-white'>Registed Users:</label>
            <div>
                <select class="form-control" name="Category" id = "email">
                <option value="">Select User To View Data</option>
                    <?php foreach ($users as $row):?>
                        <option value="<?php echo $row["email"];
                            // The value we usually set is the primary key
                        ?>">
                            <?php echo $row["email"];?>
                        </option>
                        <?php endforeach ?>
                </select>
            </div>    
        </div>
    </body>
</html>