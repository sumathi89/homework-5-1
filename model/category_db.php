<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories_guitar1
                  ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories_guitar1
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}

function add_category($name){
global $db;
$query = 'INSERT INTO categories_guitar1(categoryName) VALUES (:name)';
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->execute();
$statement->closeCursor();
}

function delete_category($category_id){
// Delete the category from the database
if ($category_id != false)
{
$query = 'DELETE FROM categories_guitar1  WHERE categoryID = :category_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$success = $statement->execute();
$statement->closeCursor();    
}
}

?>
