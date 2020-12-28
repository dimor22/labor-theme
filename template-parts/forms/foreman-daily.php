<div class="container-fluid mt-3" id="foreman-form-page">
	<form action="">

		<!-- Slider main container -->
		<div class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide">
					<h3 class="mb-3 mt-4 text-center">Daily Point Assessment</h3>

					<div class="form-group">
						<label for="jobname">Select Job</label>
						<select name="jobname" id="jobname" class="form-control">
							<option value="job 1">Job title 1</option>
							<option value="job 1">Job title 2</option>
							<option value="job 1">Job title 3</option>
							<option value="job 1">Job title 4</option>
						</select>
					</div>

					<h3 class="mb-3 mt-4 text-center">Job total points 15,000</h3>
					<div class="progress mb-5" style="height: 1.7rem">
						<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%"
						     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
						</div>
					</div>
					<div class="form-group row align-items-center">
						<div class="col-auto">
							<label for="percentage-completed">% completed today</label>
						</div>
						<div class="col">
							<input type="number"
							       id="percentage-completed"
							       name="percentage-completed"
							       class="form-control"
							       max="100"
							       min="0"
							       placeholder="less or equal to 75 %">
						</div>
					</div>

					<div class="form-group row align-items-center mb-5">
						<div class="col-auto">
							<label>Total points today</label>
						</div>
						<div class="col">
							<div id="total-points-today" class="alert alert-success mb-0">0</div>
						</div>
					</div>

					<!--<div class="row">-->
					<!--<div class="col-12 col-sm-6">-->
					<!--<div class="alert alert-warning">-->
					<!--<h4 class="text-center">Points Calculator</h4>-->
					<!--<table class="table">-->
					<!--<tbody>-->
					<!--<tr>-->
					<!--<td>Column</td>-->
					<!--<td>12</td>-->
					<!--</tr>-->
					<!--<tr>-->
					<!--<td>Beam</td>-->
					<!--<td>8</td>-->
					<!--</tr>-->
					<!--<tr>-->
					<!--<td>Joist</td>-->
					<!--<td>9</td>-->
					<!--</tr>-->
					<!--<tr>-->
					<!--<td>Deck per sq</td>-->
					<!--<td>90</td>-->
					<!--</tr>-->
					<!--<tr>-->
					<!--<td>Weld per in</td>-->
					<!--<td>25</td>-->
					<!--</tr>-->
					<!--<tr>-->
					<!--<td>Etc</td>-->
					<!--<td></td>-->
					<!--</tr>-->
					<!--</tbody>-->
					<!--</table>-->
					<!--</div>-->
					<!--</div>-->
					<!--</div>-->

					<!--<div class="row">-->
					<!--<div class="col-12 col-sm-6">-->
					<!--<ul class="list-unstyled mb-3 alert alert-warning">-->
					<!--<li>-->
					<!--5 consistently exceeds minimum expectations-->
					<!--</li>-->
					<!--<li>-->
					<!--4 occasionally exceeds minimum expectations-->
					<!--</li>-->
					<!--<li>-->
					<!--3 meets minimum expectations-->
					<!--</li>-->
					<!--<li>-->
					<!--2 occasionally does not meet minimum expectations-->
					<!--</li>-->
					<!--<li>-->
					<!--1 consistently does not meet minimum expectations-->
					<!--</li>-->
					<!--</ul>-->
					<!--</div>-->
					<!--<div class="col-12 col-sm-6">-->
					<!--<ul class="list-unstyled mb-3 alert alert-warning">-->
					<!--<li>-->
					<!--5 Exceptional / very good-->
					<!--</li>-->
					<!--<li>-->
					<!--4 good-->
					<!--</li>-->
					<!--<li>-->
					<!--3 okay-->
					<!--</li>-->
					<!--<li>-->
					<!--2 weak-->
					<!--</li>-->
					<!--<li>-->
					<!--1 bad-->
					<!--</li>-->
					<!--</ul>-->
					<!--</div>-->
					<!--</div>-->

				</div><!-- end of slide 6 -->
				<div class="swiper-slide">
					<h3 class="mb-3 mt-4 text-center">Select Workers</h3>
					<div class="form-group">
						<div class="worker-of-the-day">
							<ul>
								<li>
									<div><img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt=""></div>
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
								<li>
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt="">
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
								<li>
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt="">
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
								<li>
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt="">
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
								<li>
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt="">
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
								<li>
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt="">
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
							</ul>
						</div>
					</div>
				</div><!-- end of slide 1 -->

				<div class="swiper-slide">
					<div class="header-single-worker mt-4">
						<div class="worker-of-the-day">
							<ul>
								<li>
									<div><img src="<?php echo get_stylesheet_directory_uri();?>/images/Henderson.jpg" alt=""></div>
									<p class="wftd-name">
										John Doe
									</p>
									<span>&#43;</span>
								</li>
							</ul>
						</div>
						<div class="worker-pagination-count">
							<em>Worker <strong>1</strong>/5</em>
						</div>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="start-time">Start time</label>
							<input type="time" id="start-time" name="start-time" class="form-control mb-3" value="07:00">

							<label for="break-time">Break time</label>
							<input type="time" id="break-time" name="break-time" class="form-control" value="10:00">
						</div>

						<div class="col">
							<label for="lunch-time">Lunch time</label>
							<input type="time" id="lunch-time" name="lunch-time" class="form-control mb-3" value="13:00">

							<label for="finish-time">Finish time</label>
							<input type="time" id="finish-time" name="finish-time" class="form-control" value="17:00">
						</div>
					</div>
					<h3 class="mt-4 text-center mb-3">Behavior</h3>
					<div class="form-group row">
						<div class="col-3">
							Safety
						</div>
						<div class="col">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="safety" id="safety-1" value="option1">
								<label class="form-check-label" for="safety-1">1</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="safety" id="safety-2" value="option2">
								<label class="form-check-label" for="safety-2">2</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="safety" id="safety-3" value="option3">
								<label class="form-check-label" for="safety-3">3</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="safety" id="safety-4" value="option4">
								<label class="form-check-label" for="safety-4">4</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="safety" id="safety-5" value="option5">
								<label class="form-check-label" for="safety-5">5</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-3">
							Quality
						</div>
						<div class="col">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="quality" id="quality-1" value="option1">
								<label class="form-check-label" for="quality-1">1</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="quality" id="quality-2" value="option2">
								<label class="form-check-label" for="quality-2">2</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="quality" id="quality-3" value="option3">
								<label class="form-check-label" for="quality-3">3</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="quality" id="quality-4" value="option4">
								<label class="form-check-label" for="quality-4">4</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="quality" id="quality-5" value="option5">
								<label class="form-check-label" for="quality-5">5</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-3">
							Leadership
						</div>
						<div class="col">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="leadership" id="leadership-1" value="option1">
								<label class="form-check-label" for="leadership-1">1</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="leadership" id="leadership-2" value="option2">
								<label class="form-check-label" for="leadership-2">2</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="leadership" id="leadership-3" value="option3">
								<label class="form-check-label" for="leadership-3">3</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="leadership" id="leadership-4" value="option4">
								<label class="form-check-label" for="leadership-4">4</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="leadership" id="leadership-5" value="option5">
								<label class="form-check-label" for="leadership-5">5</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-3">
							Trust
						</div>
						<div class="col">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="trust" id="trust-1" value="option1">
								<label class="form-check-label" for="trust-1">1</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="trust" id="trust-2" value="option2">
								<label class="form-check-label" for="trust-2">2</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="trust" id="trust-3" value="option3">
								<label class="form-check-label" for="trust-3">3</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="trust" id="trust-4" value="option4">
								<label class="form-check-label" for="trust-4">4</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="trust" id="trust-5" value="option5">
								<label class="form-check-label" for="trust-5">5</label>
							</div>
						</div>
					</div>

				</div><!-- end of slide 2 -->

				<div class="swiper-slide">
					<h3 class="mb-3 mt-4 text-center">Some title here</h3>
					<div class="form-group">
						<label for="work-performed">Work performed</label>
						<textarea name="work-performed" id="work-performed" cols="30" rows="3" class="form-control"></textarea>
					</div>


					<div class="form-group row">
						<div class="col">
							<div class="form-check">
								<input type="checkbox" id="jha" value="" name="weather-sunny" class="form-check-input">
								<label for="jha" class="form-check-label">JHA for tomorrow</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="hot-work-tomorrow">Hot work for tomorrow</label>
						<textarea name="hot-work-tomorrow" id="hot-work-tomorrow" cols="30" rows="3"
						          class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="inspections">Inspections needed</label>
						<textarea name="inspections" id="inspections" cols="30" rows="3" class="form-control"></textarea>
					</div>

				</div><!-- end of slide 3 -->

				<div class="swiper-slide">
					<h3 class="mb-3 mt-4 text-center">Some title here</h3>
					<!-- Weather -->

					<div class="form-group row">
						<div class="col-auto mr-3">
							Weather
						</div>
						<div class="col">
							<div class="form-check">
								<input type="checkbox" id="weather-sunny" value="" name="weather-sunny" class="form-check-input">
								<label for="weather-sunny" class="form-check-label">Sunny</label>
							</div>
							<div class="form-check">
								<input type="checkbox" id="weather-windy" value="" name="weather-windy" class="form-check-input">
								<label for="weather-windy" class="form-check-label">Windy</label>
							</div>
							<div class="form-check">
								<input type="checkbox" id="weather-snowy" value="" name="weather-snowy" class="form-check-input">
								<label for="weather-snowy" class="form-check-label">Snowy</label>
							</div>
							<div class="form-check">
								<input type="checkbox" id="weather-rainy" value="" name="weather-rainy" class="form-check-input">
								<label for="weather-rainy" class="form-check-label">Rainy</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="equipment-used">Equipment used</label>
						<textarea name="equipment-used" id="equipment-used" cols="30" rows="3" class="form-control"></textarea>
					</div>
				</div>

				<div class="swiper-slide">

					<!-- Pictures Upload -->
					<h3 class="mt-4 text-center mb-3">Upload Images</h3>
					<div class="form-group">
						<label for="pictures">Pictures</label>
						<input type="file"
						       class="form-control-file btn btn-lg btn-success"
						       id="pictures">
					</div>

				</div><!-- end of slide 4 -->

				<div class="swiper-slide">
					<h3 class="mt-4 text-center mb-3">Productivity</h3>
					<div class="form-group">
						<div class="form-check">
							<input type="checkbox" id="tekla" value="" name="weather-sunny" class="form-check-input">
							<label for="tekla" class="form-check-label">Tekla Updated</label>
						</div>
					</div>

					<div class="form-group">
						<label for="other-conditions">Job empacks by other conditions</label>
						<textarea name="tomorrows-plan" id="other-conditions" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="tomorrows-plan">Tomorrow's Plan</label>
						<textarea name="tomorrows-plan" id="tomorrows-plan" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<!-- Skill Productivity Behaviour (SPB) -->

					<div class="form-group">
						<label for="productivity">What did you do with who?</label>
						<textarea name="productivity" id="productivity" cols="30" rows="3" class="form-control"></textarea>
					</div>

					<!--<div class="form-group row align-items-center">-->
					<!--<div class="col-auto">-->
					<!--<label for="team-total-points">Team Total Points</label>-->
					<!--</div>-->
					<!--<div class="col">-->
					<!--<input type="number" id="team-total-points" name="team-total-points" class="form-control">-->
					<!--</div>-->
					<!--</div>-->

					<!--<div class="form-group row align-items-center">-->
					<!--<div class="col-auto">-->
					<!--<label for="total-divided-team-memebers">Divided by # of team members</label>-->
					<!--</div>-->
					<!--<div class="col">-->
					<!--<input type="number" id="total-divided-team-memebers" name="total-divided-team-members"-->
					<!--class="form-control">-->
					<!--</div>-->
					<!--</div>-->

					<!--<div class="form-group row align-items-center">-->
					<!--<div class="col-auto">-->
					<!--<label for="forman-points-given">Forman points given</label>-->
					<!--</div>-->
					<!--<div class="col">-->
					<!--<input type="number" id="forman-points-given" name="forman-points-given" class="form-control">-->
					<!--</div>-->
					<!--</div>-->


				</div><!-- end of slide 5 -->

			</div>
			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>


			<div class="controls">
				<div class="prev">&#60; Prev</div>
				<div class="next">Nex &#62;</div>
				<button class="show-last-slide">Submit</button>
			</div>
		</div>




		<!--<div class="form-group">-->
		<!--<label for="behavior-observations">Forman behaviour observations id# or comment</label>-->
		<!--<textarea name="behavior-observations" id="behavior-observations" cols="30" rows="3"-->
		<!--class="form-control"></textarea>-->
		<!--</div>-->

		<!--<div class="form-group">-->
		<!--<label for="behavior-comments">Comments</label>-->
		<!--<textarea name="behavior-comments" id="behavior-comments" cols="30" rows="3"-->
		<!--class="form-control"></textarea>-->
		<!--</div>-->



	</form>
</div>