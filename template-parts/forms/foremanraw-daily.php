<div class="" id="foreman-form-page">
	<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="POST" id="foreman-daily-form">

		<!-- Slider main container -->
		<div class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide ffp-slide">
					<div class="card">
						<h3 class="">Daily Point Assessment</h3>
						<div class="row">
							<label for="jobname">Select Job</label>
							<select name="project-id" id="project-input">
								<?php

                                $args = [
                                    'post_type'     => 'Projects',
                                    'post_status'   => 'publish',
                                    'numberposts'   => -1,
                                    'meta_key'      => 'labor_project_lead_foreman',
                                    'meta_value'    => get_current_user_id()
                                ];

                                /**
                                 * IF USER IS AN ADMIN SEE ALL PROJECTS
                                 */
                                if ( user_can( get_current_user_id(), 'delete_others_pages' ) ) {
                                    $args = [
                                        'post_type'     => 'Projects',
                                        'post_status'   => 'publish',
                                        'numberposts'   => -1
                                    ];
                                }

								$projects = new WP_Query( $args );

                                $first_project_tasks = [];



								// The Loop
								if ( $projects->have_posts() ) {

									while ( $projects->have_posts() ) {
										$projects->the_post();
                                        $team_obj = get_field('team');
                                        if ( get_field('project_completed') < 100 ) {
                                            printf('<option value="%d" data-project-points="%s" data-project-percent="%s" data-team-id="%d">%s</option>', get_the_ID(), get_field('project_points'), get_field('project_completed'), $team_obj->ID, get_the_title());
                                        }
									}
								}
								/* Restore original Post Data */
								wp_reset_postdata();

								?>
							</select>
						</div>
					</div>

					<div class="card">
						<h3 class="">Job total points <strong id="js-project-points" data-points="0"></strong></h3>
						<div class="progress-bar">
							<div id="js-project-percent" data-project-percent-start="" data-project-percent="">0%</div>
						</div>
						<div class="row">
							<label for="percentage-completed"><strong
                                        id="js-display-percent-completed-today">0</strong>% completed today</label>
							<input type="hidden"
							       id="percentage-completed"
							       name="percentage-completed"
                                    value="0">
						</div>
<!--						<div class="row">-->
<!--							<label>Total points today</label>-->
<!--							<div id="total-points-today" class="">0</div>-->
<!--						</div>-->
					</div>

                    <div class="card">
                            <h3 class="">Tasks Completed Today</h3>
                            <div class="tasks-completed-foreman-form-row tasks-completed-foreman-form-row--header">
                                <div class="tasks-completed-foreman-form-row__name">TASK NAME</div>
                                <div class="tasks-completed-foreman-form-row__total">TOTAL</div>
                                <div class="tasks-completed-foreman-form-row__ttd">TTD</div>
                                <div class="tasks-completed-foreman-form-row__today">TODAY</div>
                            </div>
                            <div id="js-tasks-completed-today-section"></div>
                            <label>Total points today: <strong id="js-tasks-completed-today-points">0</strong></label>
                    </div>
				</div><!-- end of slide 1 -->
				
				<div class="swiper-slide ffp-slide">
					<div class="card">
						<h3 class="">Select Workers</h3>
						<ul class="worker-of-the-day">
                            <strong>Loading team members...</strong>
                        </ul>
                        <button type="button" id="js-select-all-workers" class="labor-btn mt-1"
                                data-state="not-pressed">Select
                            All</button>
					</div>
				</div><!-- end of slide 2 -->

                <div class="swiper-slide ffp-slide">
                    <div class="card">

                    </div>
                </div>

				<div class="swiper-slide ffp-slide">
					<div class="card">
						<h3 class="">Some title here</h3>
						<div class="row">
							<label for="work-performed">Work performed</label>
							<textarea name="work-performed" id="work-performed" cols="30" rows="3" class=""></textarea>
						</div>


						<div class="row row-checkbox">
							<input type="checkbox" id="jha" value="" name="jha" class="">
							<label for="jha" class="">JHA for tomorrow</label>
						</div>

						<div class="row">
							<label for="hot-work-tomorrow">Hot work for tomorrow</label>
							<textarea name="hot-work-tomorrow" id="hot-work-tomorrow" cols="30" rows="3"
							          class=""></textarea>
						</div>

						<div class="row">
							<label for="inspections">Inspections needed</label>
							<textarea name="inspections" id="inspections" cols="30" rows="3" class=""></textarea>
						</div>
					</div>


				</div><!-- end of slide 3 -->

				<div class="swiper-slide ffp-slide">
					<div class="card">
						<h3 class="">Some title here</h3>

						<!-- Weather -->
						<h5>Weather</h5>

						<div class="row row-checkbox">
							<input type="checkbox" id="weather-sunny" value="" name="weather-sunny" class="">
							<label for="weather-sunny" class="">Sunny</label>
						</div>
						<div class="row row-checkbox">
							<input type="checkbox" id="weather-windy" value="" name="weather-windy" class="">
							<label for="weather-windy" class="">Windy</label>
						</div>
						<div class="row row-checkbox">
							<input type="checkbox" id="weather-snowy" value="" name="weather-snowy" class="">
							<label for="weather-snowy" class="">Snowy</label>
						</div>
						<div class="row row-checkbox">
							<input type="checkbox" id="weather-rainy" value="" name="weather-rainy" class="">
							<label for="weather-rainy" class="">Rainy</label>
						</div>

						<div class="row">
							<label for="equipment-used">Equipment used</label>
							<textarea name="equipment-used" id="equipment-used" cols="30" rows="3" class=""></textarea>
						</div>
					</div>
				</div><!-- end of slide 4 -->

				<div class="swiper-slide ffp-slide">
					<div class="card">
						<h3>Productivity</h3>
						<div class="row row-checkbox">
							<div class="form-check">
								<input type="checkbox" id="tekla" value="" name="tekla" class="">
								<label for="tekla" class="">Tekla Updated</label>
							</div>
						</div>

						<div class="row">
							<label for="other-conditions">Job empacks by other conditions</label>
							<textarea name="other-conditions" id="other-conditions" cols="30" rows="3"
                                      class=""></textarea>
						</div>

						<div class="row">
							<label for="tomorrows-plan">Tomorrow's Plan</label>
							<textarea name="tomorrows-plan" id="tomorrows-plan" cols="30" rows="3" class=""></textarea>
						</div>

						<!-- Skill Productivity Behaviour (SPB) -->

						<div class="row">
							<label for="productivity">What did you do with who?</label>
							<textarea name="productivity" id="productivity" cols="30" rows="3" class=""></textarea>
						</div>
					</div>
				</div><!-- end of slide 5 -->

			</div>

			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>

			<div class="controls">
				<button type="button" class="prev labor-btn">&#60; Prev</button>
				<button type="button" class="next labor-btn">Nex &#62;</button>
				<button type="submit" class="show-last-slide labor-btn submit-btn">Submit</button>
			</div>
		</div>
		<input type="hidden" name="action" value="foreman_daily_form">
        <input type="hidden" name="team-id" value="" id="js-form-team-id">
        <input type="hidden" name="team-points" value="" id="js-form-team-points">

	</form>
</div>