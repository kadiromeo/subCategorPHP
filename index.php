<?php
require_once 'lib/db.php';
require_once 'lib/function.php';
$category_list=$db->query("SELECT * FROM category", PDO::FETCH_OBJ)->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="custom.css">
	<title>Kategori/Alt Kategori İşlemleri</title>
</head>
<body>
	<div class="container"> 
		<h3 class="text-center">Kategori/Alt Kategori İşlemleri</h3>
		<div class="row">
			<div class="col-md-6 bg-light"> 
				<h4 class="text-center">Kategori Ekle</h4>
				<hr>
				<form action="lib/category_db.php" method="post">
					<div class="form-group">
						<label>Kategori Adı</label>
						<input type="text" name="title" class="form-control">
					</div>

					<div class="form-group">
						<label>Varsa üst kategori</label>
						<select name="parent_id" class="form-control">
							<option selected value="0">Yok</option>
							<?php foreach ($category_list as $category) {?>

								<option selected value="<?php echo $category->id; ?>"><?php echo $category->title ?></option>
							<?php }	?>
						</select>
					</div>

					<br>
					<button class="btn btn-info btn-sm" name="cat_ekle">Ekle</button>
					<button class="btn btn-danger btn-sm">İptal</button>
				</form>
			</div>

			<div class="col-md-6 bg-light">
				
				<h4 class="text-center">Kategori Hiyerarşisi</h4>
				<hr>
				<?php drawElements(buildTree($category_list)); ?>
				
			</div>
		</div>	

	</div>
</body>
</html>