
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
        <h2>Film</h2>
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

		<?php require_once 'filmprocess.php';	?>

		<div class="selection">
		<form action="" method="POST">
			<h3>Select the fields</h3>
			<input type="checkbox" name="select[]" value="film_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("film_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>film_id</label>
            <input type="checkbox" name="select[]" value="title" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("title",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>title</label>
			<input type="checkbox" name="select[]" value="description" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("description",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>description</label>
            <input type="checkbox" name="select[]" value="release_year" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("release_year",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>release_year</label>
            <input type="checkbox" name="select[]" value="language_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("language_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>language_id</label>
            <input type="checkbox" name="select[]" value="original_language_id" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("original_language_id",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>original_language_id</label>
            <input type="checkbox" name="select[]" value="rental_duration" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("rental_duration",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>rental_duration</label>
            <input type="checkbox" name="select[]" value="rental_rate" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("rental_rate",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>rental_rate</label>
            <input type="checkbox" name="select[]" value="length" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("length",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>length</label>
            <input type="checkbox" name="select[]" value="replacement_cost" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("replacement_cost",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>replacement_cost</label>
            <input type="checkbox" name="select[]" value="rating" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("rating",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>rating</label>
            <input type="checkbox" name="select[]" value="special_features" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("special_features",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>special_features</label>
            <input type="checkbox" name="select[]" value="last_update" <?php echo (isset($_POST['select-button']))? ((!empty($_POST['select'])&&in_array("last_update",$_POST['select']))? "checked" : "") : "checked"; ?>>
			<label>last_update</label>
			<button type="submit" class="select-submit" name="select-button">Select</button>
		</form>
		</div>

		<div class="insert">
		<form action="filmprocess.php" method="POST">
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
            <div class="in-group">
				<label>release_year</label><br/>
				<input type="number" name="release_year" class="in-input" value="<?php echo $release_year; ?>" placeholder="Enter release_year" >
			</div>
            <div class="in-group">
				<label>language_id</label><br/>
				<input type="number" name="language_id" class="in-input" value="<?php echo $language_id; ?>" placeholder="Enter language_id" required>
			</div>
            <div class="in-group">
				<label>original_language_id</label><br/>
				<input type="number" name="original_language_id" class="in-input" value="<?php echo $original_language_id; ?>" placeholder="Enter original_language_id" >
			</div>
            <div class="in-group">
				<label>rental_duration</label><br/>
				<input type="number" name="rental_duration" class="in-input" value="<?php echo $rental_duration; ?>" placeholder="Enter rental_duration" >
			</div>
            <div class="in-group">
				<label>rental_rate</label><br/>
				<input type="number" name="rental_rate" class="in-input" value="<?php echo $rental_rate; ?>" placeholder="Enter rental_rate" >
			</div>
            <div class="in-group">
				<label>length</label><br/>
				<input type="number" name="length" class="in-input" value="<?php echo $length; ?>" placeholder="Enter length" >
			</div>
            <div class="in-group">
				<label>replacement_cost</label><br/>
				<input type="number" name="replacement_cost" class="in-input" value="<?php echo $replacement_cost; ?>" placeholder="Enter replacement_cost" >
			</div>
			<div class="in-group">
				<label>rating</label><br/>
				<input type="text" name="rating" class="in-input" value="<?php echo $rating; ?>" placeholder="Enter rating" >
			</div>
            <div class="in-group">
				<label>special_features</label><br/>
				<input type="text" name="special_features" class="in-input" value="<?php echo $special_features; ?>" placeholder="Enter special_features" >
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
			$result = $mysqli->query("SELECT * FROM film") or die($mysqli->error);
			
			if (isset($_POST['select-button'])){
			?>
				<table align="left" border="1px" style="width: 130%; line-height: 40px;">
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
						<?php }
						if (!empty($_POST['select'])&&in_array("release_year",$_POST['select'])){ ?>
							<th>release_year</th>
						<?php }
						else{ ?>
							<th style="display:none;">release_year</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("language_id",$_POST['select'])){ ?>
							<th>language_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">language_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("original_language_id",$_POST['select'])){ ?>
							<th>original_language_id</th>
						<?php }
						else{ ?>
							<th style="display:none;">original_language_id</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("rental_duration",$_POST['select'])){ ?>
							<th>rental_duration</th>
						<?php }
						else{ ?>
							<th style="display:none;">rental_duration</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("rental_rate",$_POST['select'])){ ?>
							<th>rental_rate</th>
						<?php }
						else{ ?>
							<th style="display:none;">rental_rate</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("length",$_POST['select'])){ ?>
							<th>length</th>
						<?php }
						else{ ?>
							<th style="display:none;">length</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("replacement_cost",$_POST['select'])){ ?>
							<th>replacement_cost</th>
						<?php }
						else{ ?>
							<th style="display:none;">replacement_cost</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("rating",$_POST['select'])){ ?>
							<th>rating</th>
						<?php }
						else{ ?>
							<th style="display:none;">rating</th>
                        <?php }
						if (!empty($_POST['select'])&&in_array("special_features",$_POST['select'])){ ?>
							<th>special_features</th>
						<?php }
						else{ ?>
							<th style="display:none;">special_features</th>
						<?php }
						if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
							<th>last_update</th>
						<?php }
						else{ ?>
							<th style="display:none;">last_update</th>
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
							<?php }
							if (!empty($_POST['select'])&&in_array("release_year",$_POST['select'])){ ?>
								<td><?php echo $rows['release_year']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['release_year']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("language_id",$_POST['select'])){ ?>
								<td><?php echo $rows['language_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['language_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("original_language_id",$_POST['select'])){ ?>
								<td><?php echo $rows['original_language_id']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['original_language_id']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("rental_duration",$_POST['select'])){ ?>
								<td><?php echo $rows['rental_duration']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['rental_duration']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("rental_rate",$_POST['select'])){ ?>
								<td><?php echo $rows['rental_rate']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['rental_rate']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("length",$_POST['select'])){ ?>
								<td><?php echo $rows['length']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['length']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("replacement_cost",$_POST['select'])){ ?>
								<td><?php echo $rows['replacement_cost']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['replacement_cost']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("rating",$_POST['select'])){ ?>
								<td><?php echo $rows['rating']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['rating']; ?></td>
                            <?php }
							if (!empty($_POST['select'])&&in_array("special_features",$_POST['select'])){ ?>
								<td><?php echo $rows['special_features']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['special_features']; ?></td>
							<?php }
							if (!empty($_POST['select'])&&in_array("last_update",$_POST['select'])){ ?>
								<td><?php echo $rows['last_update']; ?></td>
							<?php }
							else{ ?>
								<td style="display:none;"><?php echo $rows['last_update']; ?></td>
							<?php } ?>
							<td><button type="submit" name="update"><a href="film.php?update=<?php echo $rows['film_id']; ?>">Update</a></button>
								<button type="submit" name="delete"><a href="filmprocess.php?delete=<?php echo $rows['film_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
							</td>
						</tr>
					<?php } ?>
				</table>	
			<?php		
			}
			else{
			?>
				<table align="left" border="1px" style="width: 130%; line-height: 40px;">
					<tr>
                        <th>film_id</th>
						<th>title</th>
                        <th>description</th>
						<th>release_year</th>
						<th>language_id</th>
                        <th>original_language_id</th>
						<th>rental_duration</th>
						<th>rental_rate</th>
                        <th>length</th>
                        <th>replacement_cost</th>
                        <th>rating</th>
                        <th>special_features</th>
						<th>last_update</th>
						<th>Action</th>
					</tr>
				<?php while ($rows = $result -> fetch_assoc()){ ?>
					<tr align="center">
						<td><?php echo $rows['film_id']; ?></td>
                        <td><?php echo $rows['title']; ?></td>
                        <td><?php echo $rows['description']; ?></td>
						<td><?php echo $rows['release_year']; ?></td>
                        <td><?php echo $rows['language_id']; ?></td>
                        <td><?php echo $rows['original_language_id']; ?></td>
                        <td><?php echo $rows['rental_duration']; ?></td>
                        <td><?php echo $rows['rental_rate']; ?></td>
                        <td><?php echo $rows['length']; ?></td>
                        <td><?php echo $rows['replacement_cost']; ?></td>
                        <td><?php echo $rows['rating']; ?></td>
                        <td><?php echo $rows['special_features']; ?></td>
						<td><?php echo $rows['last_update']; ?></td>
						<td><button type="submit" name="update"><a href="film.php?update=<?php echo $rows['film_id']; ?>">Update</a></button>
							<button type="submit" name="delete"><a href="filmprocess.php?delete=<?php echo $rows['film_id']; ?>" onclick="return confirm('Are You Sure?');">Delete</a></button>
						</td>
					</tr>
				<?php } ?>
				</table>
			<?php } ?>
        </form>
	</body>
</html>