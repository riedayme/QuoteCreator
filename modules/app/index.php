<?php defined('BASEPATH') OR exit('no direct script access allowed');?>

<form method="POST" class="form-floating row">			

	<div class="col-md-5">


		<div class="alert alert-primary fade show" role="alert">
			<?php echo $webconfig['description']; ?>
		</div>

		<div class="form-floating mb-3">
			<textarea name="text" required="" class="form-control" placeholder="text" id="floatingtextarea" style="height: 200px"></textarea>
			<label for="floatingtextarea">Insert your quote</label>
		</div>

		<button type="submit" class="btn btn-primary mb-3">
			Create
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
				<path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
			</svg>
		</button>

		<?php if (isset($_SESSION['error'])): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
				</svg>
				<?php echo $_SESSION['error']['message']; ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php unset($_SESSION['error']); ?>
		<?php endif ?>

		<?php if ($_POST): ?>		
			<?php 
			include "modules/app/process.php";			
			?>	
			<a href="<?php echo $save ?>" download><img class='img-fluid' src='<?php echo $save ?>'/></a>
		<?php else: ?>
			<a href="./storage/quotes/demo.jpg" download><img class='img-fluid' src='./storage/quotes/demo.jpg'/></a>
		<?php endif ?>

	</div>

	<div class="col-md-7">

		<div class="accordion mb-5" id="accordionPanelsStayOpenExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingOne">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
						Overlay
					</button>
				</h2>
				<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
					<div class="accordion-body" style="max-height: 150px; overflow-y: auto;">

						<style>
							label > input.img{ 
								visibility: hidden; 
								position: absolute; 
							}
							label > input.img + img{ 
								cursor:pointer;
								border:2px solid transparent;
								max-width: 100%;
								max-height: 100%;
							}
							label > input.img + p {
								border:4px solid #ddd;
								padding:20px;
								font-size: 20px;
							}
							label > input.img:checked + img, label > input.img:checked + p{ 
								border:4px solid #2298f0;
							}
						</style>

						<div class="row">
							<?php 
							$files = glob('storage/quotes/overlay/*');
							$no = 1;
							foreach($files as $file) {
								$filename =  basename($file);
								?>
								<?php if ($no == 1): ?>                                 
									<div class="col-3">                       
										<label>
											<input class='img' checked="" type="radio" name="overlay" value="<?= $filename ?>" />
											<img src="<?= base_url().'storage/quotes/overlay/'.$filename ?>">
										</label>
									</div>
								<?php else: ?>
									<div class="col-3">                       
										<label>
											<input class='img' type="radio" name="overlay" value="<?= $filename ?>" />
											<img src="<?= base_url().'storage/quotes/overlay/'.$filename ?>">
										</label>
									</div>
								<?php endif ?>
								<?php
								$no++;
							}
							?>				
						</div>

					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingTwo">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
						Background
					</button>
				</h2>
				<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
					<div class="accordion-body">

						<div class="row">
							<div class="form-group">
								<input value="" require name="background" class="form-control" type="text">
								<div class="form-text">
									Insert URL or keyword using english language ex: star, sky, morning or empty for default background
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingThree">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
						Font Size
					</button>
				</h2>
				<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
					<div class="accordion-body">

						<div class="c-field u-mb-small u-p-medium">
							<label class="c-field__label" for="input13"><span id="fontsize"><?php echo (!empty($data_quote['quote_setting']) ? $data_quote['quote_setting']['font_size'] : '24') ?></span></label>
							<input id="range" min="0" max="100" value="<?php echo (!empty($data_quote['quote_setting']) ? $data_quote['quote_setting']['font_size'] : '24') ?>" type="range" name="size">
							<script type="text/javascript">
								var range = document.getElementById('range');
								var fontsize = document.getElementById('fontsize');
								range.addEventListener('input', function() {
									var size = range.value;
									fontsize.innerHTML = size;
								});
							</script>
						</div>

					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="panelsStayOpen-headingThree">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
						Font Type
					</button>
				</h2>
				<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
					<div class="accordion-body">


						<div class="row">
							<?php 
							$files = glob('storage/quotes/font/*');
							$no = 1;
							foreach($files as $file) {
								$filename =  basename($file);
								$filenoext =  pathinfo($filename, PATHINFO_FILENAME);
								?>
								<?php if (!empty($data_quote['quote_setting']) AND $data_quote['quote_setting']['font_type'] == $filename): ?>
									<div class="col-4">                       
										<style type="text/css">
											@font-face {
												font-family: <?= $filenoext ?>;
												src: url(<?= base_url().'storage/quotes/font/'.$filename ?>);
											}
										</style>
										<label style="width:100%">
											<input class='img' type="radio" name="font" value="<?= $filename ?>" checked=""/>
											<p class='u-mb-2' style="text-overflow: ellipsis; overflow: hidden;white-space: nowrap;text-align:center;font-family: <?= $filenoext ?>">
												<?php echo $filenoext; ?>
											</p>
										</label>
									</div>
								<?php else: ?>
									<?php if ($no == 1): ?>
										<div class="col-4">                       
											<style type="text/css">
												@font-face {
													font-family: <?= $filenoext ?>;
													src: url(<?= base_url().'storage/quotes/font/'.$filename ?>);
												}
											</style>
											<label style="width:100%">
												<input class='img' type="radio" name="font" value="<?= $filename ?>" checked=""/>
												<p class='u-mb-2' style="text-overflow: ellipsis; overflow: hidden;white-space: nowrap;text-align:center;font-family: <?= $filenoext ?>">
													<?php echo $filenoext; ?>
												</p>
											</label>
										</div>
									<?php else: ?>                                                    
										<div class="col-4">                       
											<style type="text/css">
												@font-face {
													font-family: <?= $filenoext ?>;
													src: url(<?= base_url().'storage/quotes/font/'.$filename ?>);
												}
											</style>
											<label style="width:100%">
												<input class='img' type="radio" name="font" value="<?= $filename ?>" />
												<p class='u-mb-2' style="text-overflow: ellipsis; overflow: hidden;white-space: nowrap;text-align:center;font-family: <?= $filenoext ?>">
													<?php echo $filenoext; ?>
												</p>
											</label>
										</div>                                                    
									<?php endif ?>                                                    
								<?php endif ?>
								<?php
								$no++;
							}
							?>

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</form>