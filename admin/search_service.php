<?php require_once('../includes/database-functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script>
        // functionality for search bar
        // Send AJAX request to the server and update the page.
        function searchServices() {
            const service = $("#input").val();
            const email = $("#email").val();
            $.get("search/search-services.php", { service }).done(function (data) {
                // Update the document with the returned HTML.
                $("#output1").html(data);
            });
            $.get("search/search-data.php", { service, email }).done(function (data1) {
                // Update the document with the returned HTML.
                $("#output2").html(data1);
            });
        }

        $(document).ready(function () {
            // Load the initial page data.
            searchServices();

            // Perform AJAX request and update the page when the form is submitted.
            $("#search").submit(function (e) {
                // Prevent the form from submitting.
                e.preventDefault();

                // Send AJAX request.
                searchServices();
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <form id="search">

        <!-- adding the dropdown to choose registered user-->
        <?php require_once('user_dropdown.php'); ?>
        <!-- search for icons -->
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="input" class="control-label text-sm text-white">Search Service:</label>
                    <input id="input" class="form-control" placeholder="Search type of service for selected user" />
                </div>
            </div>
            <!-- submit button -->
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Search" />
            </div>
        </form>

        <div id="output1"></div>
        <div id="output2"></div>
    </div>
</body>
</html>
