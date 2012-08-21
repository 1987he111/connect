<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html401/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Explore Wines in a Region</title>
    </head>
    <body bgcolor="white">
        <?php
        require_once('db.php');

//      @ $db = new mysqli(DB_HOST, DB_USER, DB_PW, DB_NAME);
//
//        if (mysqli_connect_errno()) {
//            echo 'Error: Could not connect to database. Please try again later';
//            exit;
//        }
//        $query = "select * from wine";
//        $result = $db->query($query);
//
//        for ($i = 0; $i < $result->num_rows; $i++) {
//            $row = $result->fetch_assoc();
//            echo "<h1>" . $row['wine_name'] . "\t" . $row['wine_type'] . "\t" . $row['year'] . "\t" . $row['winery_id'] . "</h1>";
//        }
//        $result->free();
//        $db->close();
        
        
        // (1) Open the database connection
        $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
        mysql_select_db(DB_NAME, $connection);

        // (2) Run the query on the winestore through the connection
        $query = "SELECT * FROM wine";
        $result = mysql_query($query, $connection);

        // Start the HTML body, and output preformatted text
        echo "<pre>\n";

        // (3) While there are still rows in the result set
        while ($row = mysql_fetch_row($result)) {
            for ($i = 0; $i < mysql_num_fields($result); $i++) {
                echo $row[$i] . " ";
            }
            // Print a carriage return to neaten the output
            echo "\n";
        }

        // Finish the HTML document
        echo "</pre>";

        // (4) Close the database connection
        mysql_close($connection);
        ?>

        <!--        <form action="04.query_results.php" method="GET">
                    <br>Enter a region to browse :
                    <input type="text" name="regionName" value="All">
                    (type All to see all regions)
                    <br><input type="submit" value="Show wines">
                </form>-->
    </body>
</html>
