<!-- // The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed -->
<link rel="stylesheet" href="box/css/bootstrap-rtl.css">
<link type="text/css" href="box/css/font-awesome.min.css" rel="stylesheet" />
<link type="text/css" href="box/css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div>
<a style="margin-top:30px; margin-right:50px;" class="btn btn-danger" href="/pubg">خانه</a>
</div>
<!-- -------------------------------------------------------- -->
<br><br><br><br><br>
  <div class="container" style="margin-right: -100px;">
	<div class="row">
        <?php  foreach( $result as $row ): ?>
<!-- -------------------------------------------------------- -->
		<div class="col-lg-6 col-md-10 col-sm-12 col-xs-10 col-lg-push-2 col-md-push-1">
			<!-- start product box -->
			<div class="product">
				<!-- start back arrow -->
				<div class="header">
					<div class="back"></div>
				</div>
				<!-- end back arrow -->
				<!-- start box -->
				<div class="main">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
							<!-- start right side -->
							<div class="right">
								<a href="detail.php?url=<?=$row["id"]; ?>"><img src="uploads/<?= $row['img'] ?>" alt="Card image cap"></a>
							</div>
							<!-- end right side -->
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
							<!-- start left side -->
							<div class="left">
								<p><?= $row["name"]; ?></p>
							
							</div>
							<!-- end left side -->
						</div>
					</div>
				</div>
				<div class="footer col-lg-12 col-xs-12 p-0">
					<div class="left col-lg-6 col-xs-6">
						<p>
							<span style="color:#c96334;" id="price"><?=$row['price']?> تومان</span>
						</p>
					</div>
					<div class="right col-lg-6 col-xs-6">
          <a class="btn btn-primary" type="submit" href="detail.php?url=<?= $row["id"]; ?>" >خرید</a>        
					</div>
				</div>
			</div>
		</div><?php endforeach; ?>
	</div> 
</div>
