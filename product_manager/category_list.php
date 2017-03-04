<?php include '../view/header.php'; ?>
<?php 
// Get all categories
$query = 'SELECT * FROM categories_guitar1 ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<main>

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>    
	 <?php foreach ($categories as $category) : ?>
	   <tr>
	   <td><?php echo $category['categoryName']; ?></td>
	   <td><form action="delete_category.php" method="post">
	   <input type="hidden" name="category_id"  value="<?php
	   echo $category['categoryID']; ?>">
	   <input type="submit" value="Delete">
	   </form></td>
	   </tr>
	 <?php endforeach; ?>
        <!-- add category rows here -->
    </table>

    <h2>Add Category</h2>
    <!-- add code for form here -->
<form action="add_category.php" method="post" id="add_category_form">
<label>Name:</label>
<input type="text" name="name"><br><br>
<label>&nbsp;</label>
<input type="submit" value="Add Category"><br>
</form>

    <p><a href="index.php?action=list_products">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>
