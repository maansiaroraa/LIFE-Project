<head> <script src="../plugins/js/chart.js"></script></head>
<?php
    require_once('../includes/database-functions.php');

    function getServicesData($email, $service) {
        if(empty($email))
            return prepareExecuteAndFetchAll('select user_service.service_id, service.name ,COUNT(*) as count FROM user_service INNER JOIN service ON user_service.service_id=service.service_id GROUP BY user_service.service_id');
    
        return prepareExecuteAndFetchAll(
            'select user_service.email, user_service.date_performed, user_service.duration_minutes FROM user_service INNER JOIN 
            service ON user_service.service_id=service.service_id WHERE user_service.email=:email AND service.name = :service ',
             ['email' => $email, 'service' => $service]);
            
    }
    // Extract and trim the email variable from the URL.
    $x = trim(isset($_GET['service']) ? $_GET['service'] : '');
    $a = trim(isset($_GET['email']) ? $_GET['email'] : '');
    // If email is empty then all users are returned.
    //echo 'email' ,$a;
    //echo 'service' ,$x;
    //$y = getAllServices($x);
    $b = getServicesData($a, $x);
    //echo print_r($b)
?>

<script>

var data = <?php echo json_encode($b); ?>;
var email = <?php echo json_encode($a); ?>;

if (email == ''){
var faculties = [...new Set(data.map(v => v['name']))];
console.log(faculties)
var count = [...new Set(data.map(v => v['count']))];
/*var count = faculties.map(name => {
    var value = data.find(v => v['name']  === name);
    var count = value['count']
    return count
})*/
console.log(count)
function toNumber(value) {
         return Number(value);
      }
var nums = count.map(toNumber);
console.log(nums)


var canvas = document.getElementById('canvas');

new Chart(canvas, {
  type: 'bar',
  data: {
    labels: faculties,
    datasets: [{
        label: 'Frequency of a service used by registered users',
        data: nums,
        borderWidth: 1,
        backgroundColor: '#352727',
      }]
  },
  options: {
    scales: {
      yAxes: [{
      	ticks: { min: 0 }
      }]
    }
  }
});
}else{
var faculties = [...new Array(data.map(v => v['date_performed']))];
console.log(faculties)
// this will get distinct category and sort
var arr = [...new Array(data.map(v => v['duration_minutes']))];
console.log(arr)

function toNumber(value) {
         return Number(value);
      }

var nums = arr[0].map(toNumber);
console.log(nums)

var canvas = document.getElementById('canvas');

new Chart(canvas, {
  type: 'bar',
  data: {
    labels: faculties[0],
    datasets: [{
        label: 'Duration (in minutes)',
        data: nums,
        borderWidth: 1,
        backgroundColor: '#352727',
      }]
  },
  options: {
    scales: {
      
    }
  }
});
}


</script>


<?php if(count($b) === 0) { ?>
  <p class="alert alert-white" style = "margin-top : 20px; margin-bottom:300px">Please fill in the user AND full activity name you want to see the statistics graph for (eg write Yoga instead of Yog).</p>   
  <?php } else { ?>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-body p-3">
        <?php if($a == '') { ?>
        <h5 class="font-weight-bolder">General Statistics for different services </h5>
        <?php } else{ ?>
        <h5 class="font-weight-bolder">Graphical representation of logged activity</h5>
        <?php } ?>
          <div class="chart">
        <div>
          <canvas id="canvas" ></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
        
<?php } ?>
