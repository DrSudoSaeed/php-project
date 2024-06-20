<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
$host = "localhost";
$db_name = "pubgmobile";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

/*
 * For our create operation
 * As the request type will be post, so it will directly execute this
 */
if ($_POST) {
    try {
        // insert query
        $query = "INSERT INTO accounts SET name=:name, formacc=:formacc, price=:price, created=:created";

        // prepare query for execution
        $stmt = $con->prepare($query);

        // posted values
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $formacc = htmlspecialchars(strip_tags($_POST['formacc']));
        $price = htmlspecialchars(strip_tags($_POST['price']));

        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':formacc', $formacc);
        $stmt->bindParam(':price', $price);

        // specify when this record was inserted to the database
        $created = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        // Execute the query
        if ($stmt->execute()) {
            $data['status'] = "Success";
            $data['message'] = "Record Successfully Inserted";
            echo json_encode($data);
        } else {
            $data['status'] = "Failed";
            $data['message'] = "Unable to insert data";
            echo json_encode($data);
        }

    } // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
/*
 * For our read operation
 */
if ($_GET) {
    if (isset($_GET['get_data'])) {
        // select all data
        $query = "SELECT id, name, formacc, price FROM accounts ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();

        // this is how to get number of rows echoed
        $num = $stmt->rowCount();

        // link to create record form
        //check if more than 0 record found
        if ($num > 0) {
            // data from database will be here
            $result = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            $data['status'] = "Success";
            $data['message'] = $result;
            echo json_encode($data);
            
        } // if no records found
        else {
            $data['status'] = "Failed";
            $data['message'] = "No Data Found.";
            echo json_encode("<td>".$data."</td>");
        }
    }
}
/*
 * For our update operation
 *
 * Here we can use POST operation but the standard approach for update command is to use PUT method.
 *
 * And we are already using POST for the create operation so, for the proper execution of this code we are using separate HTTP method for all operation
 *
 */
/*
 * In php there is no $_PUT and $_DELETE method, we need to check the request type
 */
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    try {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE accounts SET name=:name, formacc=:formacc, price=:price WHERE id = :id";

        // prepare query for excecution
        $stmt = $con->prepare($query);

        $_PUT = json_decode(file_get_contents("php://input"),true);
        // posted values
        $name = htmlspecialchars(strip_tags($_PUT['name']));
        $formacc = htmlspecialchars(strip_tags($_PUT['formacc']));
        $price = htmlspecialchars(strip_tags($_PUT['price']));

        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':formacc', $formacc);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);

        // Execute the query
        if ($stmt->execute()) {
            $data['status'] = "Success";
            $data['message'] = "Updated Successfully";
            echo json_encode($data);
        } else {
            $data['status'] = "Failed";
            $data['message'] = "Not Updated";
            echo json_encode($data);
        }
    } // show errors
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
/*
 * For our delete operation
 */
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    try {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
        // delete query
        $query = "DELETE FROM accounts WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->bindParam(1, $id);

        if ($stmt->execute()) {
            $data['status'] = "Success";
            $data['message'] = "Deleted Successfully";
            echo json_encode($data);
        } else {
            $data['status'] = "Failed";
            $data['message'] = "Not Deleted";
            echo json_encode($data);
        }
    } // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}