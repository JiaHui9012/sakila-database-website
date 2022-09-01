
<!DOCTYPE html>

<html>
	<head>
		<title>Sakila Database</title>
		<style>
			h1 {
				margin-left: 250px;
				font-size: 50px;
				margin-bottom: 5px;
			}
            
            h2 {
                margin-left: 250px;
                font-size: 35px;
			}

			h3 {
                margin-bottom: 5px;
				font-size: 20px;
			}
			
			table{
				margin-left: 250px;
				margin-bottom: 50px;
			}
			
			th{
				background-color: grey;
				color: white;
			}

			tr:nth-child(even){
				background-color: #f2f2f2;
			}
            
			.sidebar {
				padding: 0px 8px;
				height: 100%;
				width: 190px;
				position: fixed;
				z-index: 1;
				top: 0;
				left: 0;
				background-color: grey;
				overflow-x: hidden;
				overflow-y: hidden;
				padding-top: 20px;
			}

			.sidebar a.title {
				padding: 6px 10px 6px 30px;
				text-decoration: none;
				font-size: 23px;
				color: rgb(252, 252, 252);
				display: block;
			}

			.sidebar a:hover {
				color: black;
  				background-color: white;
			}

			.selection{
				margin-left: 250px;
			}

			.alert{
				margin-left: 250px;
				padding-bottom: 20px;
				font-weight: bold;
				font-size: 27px;
				color:rgb(167, 0, 0);
			}

			div.insert{
				margin-left: 250px;
				padding-bottom: 20px;
				
			}
			
			.in-group{
				padding-bottom: 10px;
			}

			button{
				border: none;
				border-radius: 5px;
    			background: #ddd;
				padding: 5px 20px 5px 20px;
			}

			a{
				text-decoration: none;
				color: black;
			}

		</style>
	</head>
	<body>
        <h1>Sakila Database</h1>
        <h2>Film_Text</h2>
		<nav>
			<div class="sidebar">
				<a href="index.php" class="title">HOME</a>
				<a href="actor.php" class="title">actor</a>
				<a href="address.php" class="title">address</a>
				<a href="category.php" class="title">category</a>
				<a href="city.php" class="title">city</a>
				<a href="country.php" class="title">country</a>
				<a href="customer.php" class="title">customer</a>
				<a href="film.php" class="title">film</a>
				<a href="film_actor.php" class="title">film_actor</a>
				<a href="film_category.php" class="title">film_category</a>
				<a href="film_text.php" class="title">film_text</a>
				<a href="inventory.php" class="title">inventory</a>
				<a href="language.php" class="title">language</a>
				<a href="payment.php" class="title">payment</a>
				<a href="rental.php" class="title">rental</a>
				<a href="staff.php" class="title">staff</a>
				<a href="store.php" class="title">store</a>
			</div>
        </nav>

		<?php require_once 'film_textprocess.php';	?>

		<div class="selection">
		<form action="" method="POST">
			<h3>Select the fields</h3>
			<input type="checkbox" name="select[]" value="film_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("film_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>film_id</label>
            <input type="checkbox" name="select[]" value="title" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("title",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>title</label>
			<input type="checkbox" name="select[]" value="description" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("description",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>description</label>
			<button type="submit" class="select-submit" name="select-button">Select</button>
		</form>
		</div>

		<div class="insert">
		<form action="film_textprocess.php" method="POST">
			<h3>Enter Information</h3>
			<input type="hidden" name="film_id" value="<?php echo $film_id; ?>">
			<div class="in-group">
				<label>film_id</label><br/>
				<input type="number" name="film_id" class="in-input" value="<?php echo $film_id; ?>" placeholder="Enter film id" required>
			</div>
            <div class="in-group">
				<label>title</label><br/>
				<input type="text" name="title" class="in-input" value="<?php echo $title; ?>" placeholder="Enter title" required>
			</div>
            <div class="in-group">
				<label>description</label><br/>
				<input type="text" name="description" class="description" value="<?php echo $description; ?>" placeholder="Enter description" style="width: 300px;">
			</div>
            <div>
			<?php
			if ($update == true):
			?>
				<button type="submit" class="insert-submit" name="update">Update</button>
			<?php else: ?>
				<button type="submit" class="insert-submit" name="insert">Insert</button>
			<?php endif; ?>
			</div>
		</form>
		</div>
		
		<?php
			if (isset($_SESSION['message'])){
		?>
			<div class="alert">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
			</div>
		<?php
			}
		?>

        <form>
			<?php
			$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM film_text") or die($mysqli->error);
			
			if (isset($_POST['select-button'])){
			?>
				<table align="left" border="1px" style="width: 80%; line-height: 40px;">
					<tr>
						<?php if (!empty($_POST['select'])&&in_array("film_id",$_POST['select'])){ ?>
							<th>film_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">film_id</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("title",$_POST['select'])){ ?>
							<th>title</th>
						<?php }
						else{ ?>
							<th style="display:none;">title</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("description",$_POST['select'])){ ?>
							<th>description</th>
						<?php }
						else{ ?>
							<th style="display:none;">description</th>
						<?php } ?>
						<th>Action</th>
					</tr>
					<?php while ($rows = $result -> fetch_assoc()){ ?>
						<tr align="center">
							<?php if (!empty($_POST['select'])&&in_array("film_id",$_POST['select'])){ ?>
								<td><?php echo $rows['film_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['film_id']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("title",$_POST['select'])){ ?>
								<td><?php echo $rows['title']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['title']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("description",$_POST['select'])){ ?>
								<td><?php echo $rows['description']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['description']; ?></td>
							<?php } ?>
							<td><button type="submit" name="update"><a href="film_text.php?update=<?php echo $rows['film_id']; ?>">Update</a></button>
								<button type="submit" name="delete"><a href="film_textprocess.php?delete=<?php echo $rows['film_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
							</td>
						</tr>
					<?php } ?>
				</table>	
			<?php		
			}
			else{
			?>
				<table align="left" border="1px" style="width: 80%; line-height: 40px;">
					<tr>
                        <th>film_id</th>
						<th>title</th>
                        <th>description</th>
						<th>Action</th>
					</tr>
				<?php while ($rows = $result -> fetch_assoc()){ ?>
					<tr align="center">
						<td><?php echo $rows['film_id']; ?></td>
                        <td><?php echo $rows['title']; ?></td>
                        <td><?php echo $rows['description']; ?></td>
						<td><button type="submit" name="update"><a href="film_text.php?update=<?php echo $rows['film_id']; ?>">Update</a></button>
							<button type="submit" name="delete"><a href="film_textprocess.php?delete=<?php echo $rows['film_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
						</td>
					</tr>
				<?php } ?>
				</table>
			<?php } ?>
        </form>
	</body>
</html>