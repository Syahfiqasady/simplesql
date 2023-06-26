<?php 
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "shopdb";  
 
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
// Check connection 
if ($conn->connect_error) {    
    die("Connection failed: " . $conn->connect_error); 
}  


//SELECT Statement 
$sql = "SELECT ProductID, ProductName, ProductPrice FROM product"; $result = $conn->query($sql); 
 
//check if there are any result from the above query 
if ($result->num_rows > 0) {     
    //while loop to display data    
    while($row = $result->fetch_assoc()) {          
        echo "id: " . $row["ProductID"]. " Name: " . $row["ProductName"]. " Price: " . $row["ProductPrice"]."<br>";   
    } 
} 
else {    
    echo "0 results"; } 


 
//DELETE statement
$sql = "DELETE FROM product WHERE ProductID = '1234'"; 
 
if ($conn->query($sql) == TRUE) {     
    echo "Delete record successfully"; 
} 
else {     
    
    echo "Error: " . $sql . "<br>" . $conn->error; 
} 

//INSERT INTO Statement 
 
$sql = "INSERT INTO product(ProductID, ProductName, ProductPrice)  VALUES ('5566','Sugar','2.99')"; 
 
if ($conn->query($sql) == TRUE) {    
    echo "New record created successfully"; 
} 
else {    
    echo "Error: " . $sql . "<br>" . $conn->error; 
} 



//Display the outputs in a table form
$sql = "SELECT ProductID, ProductName, ProductPrice FROM product"; 

$result = $conn->query($sql); 
 
echo " <head> <style> table {   border-collapse: collapse; } 
 
table, th, td {   border: 1px solid black; } </style> </head> "; 

echo "
<table>      
    <tr>
    <th>Product ID</th><th>Product Name</th><th>Price</th></tr>";                      
while($row = $result->fetch_assoc()) {          
    echo"        
    <tr><td>".$row["ProductID"]."</td><td>".$row["ProductName"]."</td><td>".$row["ProductPrice"]."</td></tr>";    
}     

echo "</table>"."<br>";

$sql = "SELECT StaffID, StaffName FROM staff"; 

$result = $conn->query($sql); 
 
echo " <head> <style> table {   border-collapse: collapse; } 
 
table, th, td {   border: 1px solid black; } </style> </head> "; 

echo "
<table>      
    <tr>
    <th>Staff ID</th><th>Staff Name</th></tr>";                      
while($row = $result->fetch_assoc()) {          
    echo"        
    <tr><td>".$row["StaffID"]."</td><td>".$row["StaffName"]."</td></tr>";    
}     

echo "</table>"; 



?> 