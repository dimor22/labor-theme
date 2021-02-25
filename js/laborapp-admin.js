(function($, _) {
  $(document).ready(function() {

    let errors = [];
    let totalPointsAssigned = 0;
    let remainingPoints = 0;
    let validate = true;

    // Daily point calculation

    numeral.defaultFormat('0,0');

    const getPoints = function(percent) {
      const points = numeral( $('#js-project-points').attr('data-points') * (percent/100));
      return points;
    }

    $('#percentage-completed').on('keyup blur', function() {
      $(this).removeClass('error-field');
      //reset errors array
      errors = [];
      const input = $(this).val();

      if ( input <= ( 100 - $("#js-project-percent").attr('data-project-percent') ) ) {
        $('#total-points-today').text(getPoints(input).format());

        // set global variables
        teamPoints = getPoints(input).format();
        teamPointsNoFormat = getPoints(input).value();
        $('#js-form-team-points').val(teamPointsNoFormat);
      } else {
        $(this).val("");
        $('#total-points-today').text(0);
      }

    });

    $('#foreman-daily-form').on('keyup blur', '.daily-points input', function() {

      totalPointsAssigned = 0;

      // Get all Assigned points
      $('.daily-points input').each( function(index, value){

        let points = $(value).val() == '' ? 0 : $(value).val();
        totalPointsAssigned += parseFloat( points );
      });

      // Update DOM data atts
      $('[data-team-points-assigned]').attr('data-team-points-assigned', totalPointsAssigned);
      $('[data-team-points-assigned]').text(totalPointsAssigned);

      // Get total team points earned
      teamPoints = $('[data-team-points-earned]').attr('data-team-points-earned');

      // Get active slide points assigned
      let activeSlidePointsAssigned = $('.swiper-slide.swiper-slide-active').find('.daily-points input').val();

      // Validate
      if ( totalPointsAssigned > teamPoints ) {
        $('[data-team-points-remaining]').addClass('error');
        errors.push({text: 'Too many points assigned.'});
      } else if ( activeSlidePointsAssigned == 0 || activeSlidePointsAssigned === '') {
        $('[data-team-points-remaining]').addClass('error');
        errors.push({text: 'Please assign some points.'});
      } else {
        $('[data-team-points-remaining]').removeClass('error');
        errors = [];
      }

      remainingPoints = teamPoints - totalPointsAssigned;

      $('[data-team-points-remaining]').attr('data-team-points-remaining', remainingPoints);
      $('[data-team-points-remaining]').text(remainingPoints);


    });

    function resetPointsSystem() {
      totalPointsAssigned = 0;
      $('[data-team-points-assigned]').attr('data-team-points-assigned', 0);
      $('[data-team-points-assigned]').text(0);

      $('[data-team-points-remaining]').attr('data-team-points-remaining', teamPoints);
      $('[data-team-points-remaining]').text(teamPoints);

    }

    function generateWorkerPage(user, position, total){

      let template = `<div class="swiper-slide ffp-slide">
          <div class="card">
          <div class="header-single-worker">
          <img src="${user.image[0].src}" srcset="${user.image[0].srcset}"/>
          <div class="worker-pagination-count">
          <em>Worker <strong>${++position}</strong>/${total}</em>
      <p class="wftd-name">${user.name} - User id ${user.id}</p>
          </div>
          </div>
          <div class="card">
          <div class="row daily-points">
          <label for="daily-points${position}">Points earned</label>
          <input type="tel" name="user_field_${position}[daily-points]" id="daily-points${position}" data-user-points-earned="" value="0"/>
          <table class="points-table mt-1"><tr><td>Team points earned today</td><td><strong data-team-points-earned="${teamPoints}">${teamPoints}</strong></td></tr>
          <tr><td>Team points asigned</td><td><strong data-team-points-assigned="0">0</strong></td></tr>
          <tr><td>Points remaining to be assigned</td><td><strong data-team-points-remaining="${teamPoints}">${teamPoints}</strong></td></tr></table>
          </div>
          </div>
          <div class="card time-row">
          <div>
          <input type="hidden" name="user_field_${position}[user-id]" value="${user.id}">
          <label for="start-time${position}">Start</label>
          <input type="time" id="start-time${position}" name="user_field_${position}[start-time]" class="time-field" value="06:00">
          </div>

          <div>
          <label for="break-time${position}">Break</label>
          <input type="time" id="break-time${position}" name="user_field_${position}[break-time]" class="time-field" value="09:00">
          </div>

          <div>
          <label for="lunch-time${position}">Lunch</label>
          <input type="time" id="lunch-time${position}" name="user_field_${position}[lunch-time]" class="time-field" value="11:30">
          </div>

          <div>
          <label for="finish-time${position}">Finish</label>
          <input type="time" id="finish-time${position}" name="user_field_${position}[finish-time]" class="time-field" value="14:30">
          </div>


          </div>
          <div class="card">
          <h3 class="">Behavior</h3>
          <section class="radio-box">
          <h5>Safety</h5>
          <ul class="js-behavior-list">
          <li>
          <input class="user-safety-field" type="radio" name="user_field_${position}[safety]" id="safety-1${position}" value="1">
          <label class="" for="safety-1${position}">1</label>
          </li>
          <li>
          <input class="user-safety-field" type="radio" name="user_field_${position}[safety]" id="safety-2${position}" value="2">
          <label class="" for="safety-2${position}">2</label>
          </li>
          <li>
          <input class="user-safety-field" type="radio" name="user_field_${position}[safety]" id="safety-3${position}" value="3">
          <label class="" for="safety-3${position}">3</label>
          </li>
          <li>
          <input class="user-safety-field" type="radio" name="user_field_${position}[safety]" id="safety-4${position}" value="4">
          <label class="" for="safety-4${position}">4</label>
          </li>
          <li>
          <input class="user-safety-field" type="radio" name="user_field_${position}[safety]" id="safety-5${position}" value="5">
          <label class="" for="safety-5${position}">5</label>
          </li>
          </ul>
          <textarea name="user_field_${position}[safety-notes]" id="behavior-note-safety-${position}" class="behavior-note" cols="30" rows="5" placeholder="Please elaborate this rating."></textarea>
          </section>
          <section class="radio-box">
          <h5>Quality</h5>
          <ul class="js-behavior-list">
          <li class="">
          <input class="user-quality-field" type="radio" name="user_field_${position}[quality]" id="quality-1${position}" value="1">
          <label class="" for="quality-1${position}">1</label>
          </li>
          <li class="">
          <input class="user-quality-field" type="radio" name="user_field_${position}[quality]" id="quality-2${position}" value="2">
          <label class="" for="quality-2${position}">2</label>
          </li>
          <li class="">
          <input class="user-quality-field" type="radio" name="user_field_${position}[quality]" id="quality-3${position}" value="3">
          <label class="" for="quality-3${position}">3</label>
          </li>
          <li class="">
          <input class="user-quality-field" type="radio" name="user_field_${position}[quality]" id="quality-4${position}" value="4">
          <label class="" for="quality-4${position}">4</label>
          </li>
          <li class="">
          <input class="user-quality-field" type="radio" name="user_field_${position}[quality]" id="quality-5${position}" value="5">
          <label class="" for="quality-5${position}">5</label>
          </li>
          </ul>
          <textarea name="user_field_${position}[quality-notes]" id="behavior-note-quality-${position}" class="behavior-note" cols="30" rows="5" placeholder="Please elaborate this rating."></textarea>
          </section>
          <section class="radio-box">
          <h5>Leadership</h5>
          <ul class="js-behavior-list">
          <li class="">
          <input class="user-leadership-field" type="radio" name="user_field_${position}[leadership]" id="leadership-1${position}" value="1">
          <label class="" for="leadership-1${position}">1</label>
          </li>
          <li>
          <input class="user-leadership-field" type="radio" name="user_field_${position}[leadership]" id="leadership-2${position}" value="2">
          <label class="" for="leadership-2${position}">2</label>
          </li>
          <li>
          <input class="user-leadership-field" type="radio" name="user_field_${position}[leadership]" id="leadership-3${position}" value="3">
          <label class="" for="leadership-3${position}">3</label>
          </li>
          <li>
          <input class="user-leadership-field" type="radio" name="user_field_${position}[leadership]" id="leadership-4${position}" value="4">
          <label class="" for="leadership-4${position}">4</label>
          </li>
          <li>
          <input class="user-leadership-field" type="radio" name="user_field_${position}[leadership]" id="leadership-5${position}" value="5">
          <label class="" for="leadership-5${position}">5</label>
          </li>
          </ul>
          <textarea name="user_field_${position}[leadership-notes]" id="behavior-note-leadership-${position}" class="behavior-note" cols="30" rows="5" placeholder="Please elaborate this rating."></textarea>
          </section>
          <section class="radio-box">
          <h5>Trust</h5>
          <ul class="col js-behavior-list">
          <li>
          <input class="user-trust-field" type="radio" name="user_field_${position}[trust]" id="trust-1${position}" value="1">
          <label class="" for="trust-1${position}">1</label>
          </li>
          <li>
          <input class="user-trust-field" type="radio" name="user_field_${position}[trust]" id="trust-2${position}" value="2">
          <label class="" for="trust-2${position}">2</label>
          </li>
          <li>
          <input class="user-trust-field" type="radio" name="user_field_${position}[trust]" id="trust-3${position}" value="3">
          <label class="" for="trust-3${position}">3</label>
          </li>
          <li>
          <input class="user-trust-field" type="radio" name="user_field_${position}[trust]" id="trust-4${position}" value="4">
          <label class="" for="trust-4${position}">4</label>
          </li>
          <li>
          <input class="user-trust-field" type="radio" name="user_field_${position}[trust]" id="trust-5${position}" value="5">
          <label class="" for="trust-5${position}">5</label>
          </li>
          </ul>
          <textarea name="user_field_${position}[trust-notes]" id="behavior-note-trust-${position}" class="behavior-note" cols="30" rows="5" placeholder="Please elaborate this rating."></textarea>
          </section>
          </div>
          </div>`;
      return template;
    }

    function generateWorkerCard(user){
      var template = `<li data-user-id="${user.ID}" data-user-name="${user.user_firstname} ${user.user_lastname}">
                          <div>${user.user_avatar}</div>
                          <p class="wftd-name">${user.user_firstname}</p>
                          <span>&#43;</span>
                      </li>`;

      return template;
    }

    function resetUserSlides() {
      /**
       * RESET ALL USER SLIDES BEFORE CREATING THEM
       */
      const totalSlides = _.size(swiper.slides);
      const slidesBeforeUsers = 5;
      const userSlidesStartAt = 2;

      if (totalSlides > slidesBeforeUsers ) {
        // remove all user slides
        const userSlides = totalSlides - slidesBeforeUsers;
        for( let i=0; i < userSlides; i++ ) {
          let index = userSlidesStartAt + i;
          swiper.removeSlide(index);
        }
      }
    }

    function isRadioSelected( className ){
      if ( $('.swiper-slide.swiper-slide-active').find(className + ':checked').length > 0 ) {
        return true;
      }
      return false;
    }

    function isNoteAdded( className ) {
      const $checkBox = $('.swiper-slide.swiper-slide-active').find(className + ':checked');
      let safetyVal = $checkBox.val();
      if ( safetyVal == '1' || safetyVal == '5') {
        let noteVal = $checkBox.parents('.js-behavior-list').siblings('textarea').val();
        if ( noteVal == '' ) {
          return false;
        }
      }
      return true;
    }

    function isCheckedAndNoteAdded( fieldName ){
      let className = '.user-' + fieldName + '-field';
      let isChecked = isRadioSelected( className );
      let addedNote = isNoteAdded( className );
      if ( validate && ! isChecked ){
        stopShowError( 'Please check ' + fieldName.toUpperCase() +' Rating.' );
      }
      if ( validate && ! addedNote ) {
        stopShowError( 'Please add a note in ' + fieldName.toUpperCase() +' Section.' );
      }
    }

    //initialize swiper when document ready
    let projectTeamId = '';
    let teamPoints = 0;
    let teamPointsNoFormat = 0;

    let swiper = new Swiper('.swiper-container', {
      allowTouchMove: false,
      simulateTouch: false,
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar'
      },
      on: {
        init: function() {
          console.log('current index is: ' + this.activeIndex);
          console.log('total slides: ' + _.size(this.slides));

          function getProjectInfo() {
            let projectPoints = $('#project-input').children("option:selected").data('project-points');
            let projectPercent = $('#project-input').children("option:selected").data('project-percent');
            projectTeamId = $('#project-input').children("option:selected").data('team-id');
            $('#js-form-team-id').val(projectTeamId);

            let points = numeral(projectPoints);
            $('#js-project-points').text(points.format());
            $('#js-project-points').attr('data-points', projectPoints);
            $('#js-project-percent').width(projectPercent + '%');
            $('#js-project-percent').text(projectPercent + '%');
            $('#js-project-percent').attr('data-project-percent', projectPercent);

            let dailyMax = 100 - projectPercent;

            $('#percentage-completed').attr("placeholder", "less or equal to "+ dailyMax +"%");
          }

          function getProjectTasks() {
            let projectSelectedId = $('#project-input').children("option:selected").val();
            console.log('id before ajax: ' + projectSelectedId);
            let tasksSection = $('#js-tasks-completed-today-section');

            $.ajax({
              url : labor_form_ajax.ajax_url,
              type : 'post',
              data : {
                action : 'get_project_tasks',
                payload : projectSelectedId
              },
              success : function( tasks ) {

                let taskTemplate = '';

                if ( tasks.length > 0 ) {
                  tasks.forEach( function (task){

                    taskTemplate += `<div class="tasks-completed-foreman-form-row">
                                            <div class="tasks-completed-foreman-form-row__name">${task.taskList.name}</div>
                                            <div class="tasks-completed-foreman-form-row__total">${task.taskList.total}</div>
                                            <div class="tasks-completed-foreman-form-row__ttd">${task.taskList.ttd}</div>
                                            <div class="tasks-completed-foreman-form-row__today">
                                                <input type="tel"
                                                       id="task_ttd_${task.taskList.name.replace(/\s/g, '-').toLowerCase()}"
                                                       name="task_ttd_${task.taskList.name.replace(/\s/g, '-').toLowerCase()}">
                                            </div>
                                        </div>`;
                  });
                  tasksSection.html(taskTemplate);
                } else {
                  tasksSection.html('<p>No tasks have been assigned to this project yet.</p>');
                }
              }
            });

          }

          getProjectInfo();

          getProjectTasks();
          
          $('#project-input').change( function() {
            getProjectInfo();
            getProjectTasks();
          });
          
        },
        slideChange: function() {
          console.log('total slides: ' + _.size(this.slides));


        },
        slideNextTransitionStart: function() {



          // Hide Next button at the end
          if ( swiper.isEnd ){
            $('.next').hide();
            $('.show-last-slide').show();
          }

          // show errors
          console.log(errors);
        },
        slidePrevTransitionEnd: function() {

          if ( swiper.isBeginning ) {
            // Delete slide 2 (Users) when slider is back in slide 1
            $('.worker-of-the-day').html('<strong>Loading team members...</strong>');

            // Reset user slides
            resetUserSlides();

            // reset selected workers array
            selectedWorkers = [];
            console.log(swiper.slides);

            // reset total points assigned
            resetPointsSystem();
          }
        }
      }
    });

    /**
     * NEXT BUTTON
     */
    $('.controls .next').click(function() {

      // Reset validation
      validate = true;

      // VALIDATE ASSIGNED POINTS > 0
      if (validate && $('.swiper-slide.swiper-slide-active').find('.daily-points').length > 0 ){

        let activeSlidePointsValue = $('.swiper-slide.swiper-slide-active').find('.daily-points input').val();
        if ( activeSlidePointsValue == 0 || activeSlidePointsValue === '' ) {
          stopShowError( 'Please assign some points.' )
        }
      }

      // VALIDATE POINTS EARNED
      if ( validate && $('.swiper-slide.swiper-slide-active').find('[data-team-points-remaining]').html() < 0 ) {
          stopShowError( 'Too many points earned assigned.' )
      }

      // VALIDATE BEHAVIOR IS CHECKED
      if ( validate && $('.swiper-slide.swiper-slide-active').find('.daily-points').length > 0 ){

        // Safety
        isCheckedAndNoteAdded('safety');

        // Quality
        isCheckedAndNoteAdded('quality');

        // Leadership
        isCheckedAndNoteAdded('leadership');

        // Trust
        isCheckedAndNoteAdded('trust');
      }

      // STEP 1. Check percentage is filled
      if ( validate && swiper.activeIndex === 0 && $('#percentage-completed').val() === '' ) {
        $('#percentage-completed').addClass('error-field');
        stopShowError( 'Project percentage is empty' );
      }

      // STEP 2. Get Team members
      if ( validate && swiper.activeIndex === 0) {
        $.ajax({
          url : labor_form_ajax.ajax_url,
          type : 'post',
          data : {
            action : 'get_team_members',
            payload : projectTeamId
          },
          success : function( workers ) {

            console.log('Returning Team members!!!!');

            console.log(workers);

            var workersHtml = '';

            _.forEach(workers, function(worker) {
              workersHtml += generateWorkerCard(worker);
            })

            $('.worker-of-the-day').html(workersHtml);

          },
          fail: function () {
            //$('.search-container ul').html('Ocurrio un problema en la busqueda. Intentelo mas tarde.');
            form_submitted_modal_fail();
            stopShowError( 'Team members ajax failed' );
          },
          statusCode: {
            500: function() {
              //alert( "page not found" );
              form_submitted_modal_fail();
            }
          }
        });
      }

      // STEP 3. Check that users where selected
      if ( validate && swiper.activeIndex === 1) {

        resetUserSlides();

        if ( _.size(selectedWorkers) == 0 ) {
          stopShowError( 'No users were selected' );
        } else {
          _.each( selectedWorkers, function(value, key) {
            swiper.addSlide(key + 2, generateWorkerPage(value, key, _.size(selectedWorkers)))
          });
        }
      }

      // VALIDATE BEFORE GOING TO NEXT SLIDE
      if ( validate ) {
        swiper.slideNext();
      }
    });

    function stopShowError( message ){
        form_error_message(message);
        validate = false;
    }

    /**
     * PREV BUTTON
     */
    $('.controls .prev').click(function() {
      swiper.slidePrev();
      console.log('current index is: ' + swiper.activeIndex);


      if ( ! swiper.isEnd ){
        $('.next').show();
        $('.show-last-slide').hide();
      }
    });

    /**
     * USER SELECTION
     */
    var selectedWorkers = [];

    $('.worker-of-the-day').on('click', 'li', function() {
      errors = [];
      $('#js-workers-error-message').css('visibility', 'hidden');
      let user = $(this);
      user.toggleClass('selected');
      var userId = user.data('user-id');
      var userName = user.data('user-name');
      var userImg = user.find('img');

      // check that the user has been selected previously if it has, remove it
      if ( _.findIndex(selectedWorkers, function(worker) { return worker.id === userId }) > -1 ) {
        let arrayKeyRemove =_.findKey(selectedWorkers, function(o) {
          return o.id === userId;
        })
        _.pullAt(selectedWorkers, arrayKeyRemove);
      } else {
        //selectedWorkers.push({id: userId, name: userName, image: userImg});
        addSelectedUser( user );
      }
      //console.log(selectedWorkers);

    });

    function addSelectedUser( user ){
      var userId = user.data('user-id');
      var userName = user.data('user-name');
      var userImg = user.find('img');

      selectedWorkers.push({id: userId, name: userName, image: userImg});
    }


    /**
     * SELECT ALL USERS
     */
    $('#js-select-all-workers').click(function () {
      let userElements = $('.worker-of-the-day li');
      let btnState = $(this).attr('data-state');

      if ( btnState === 'not-pressed') {
        userElements.addClass('selected');

        // Reset array
        selectedWorkers = [];

        // Add them to the array "selectedWorkers"
        $.each( userElements, function (key, user) {
          addSelectedUser( $(user) );
        })

        // Update button state
        $(this).attr('data-state', 'pressed');

        // Update button text
        $(this).text('Deselect All');
      }

      if ( btnState === 'pressed' ) {
        userElements.removeClass('selected');

        // Remove them from the array "selectedWorkers"
        selectedWorkers = [];

        // Update button state
        $(this).attr('data-state', 'not-pressed');

        // Update button text
        $(this).text('Select All');
      }

      console.log(selectedWorkers);
    });


    /**
     * SUBMIT FORM
     */

    // $('.submit-btn').click(function(e) {
    //   e.preventDefault();
    //
    //   console.log('form prevented');
    //
    //   // RETURN EARLY IF SUBMITTED BEFORE THE LAST SLIDE
    //   if ( !swiper.isEnd ) { return; }
    //
    //   let form = $(this).closest('form').serializeArray();
    //
    //   console.log(form);
    //
    //   $.ajax({
    //     url : labor_form_ajax.ajax_url,
    //     type : 'post',
    //     data : {
    //       action : 'foreman_daily_form',
    //       payload : form
    //     },
    //     success : function( response ) {
    //
    //
    //       console.log('Foreman Daily Form Submited from Ajax!!!!');
    //
    //       console.log(response);
    //
    //       form_submitted_modal_success();
    //
    //     },
    //     fail: function () {
    //       //$('.search-container ul').html('Ocurrio un problema en la busqueda. Intentelo mas tarde.');
    //       form_submitted_modal_fail();
    //
    //     },
    //     statusCode: {
    //       500: function() {
    //         //alert( "page not found" );
    //         form_submitted_modal_fail();
    //       }
    //     }
    //   });
    // });

    // validate form fields
    $('#foreman-daily-form').on('submit', function (e) {
      e.preventDefault();

      // RETURN EARLY IF SUBMITTED BEFORE THE LAST SLIDE
      if ( !swiper.isEnd ) { return; }

      let fields = $(this).serializeArray();
      console.log(fields);

      // find out how many users are being submitted
      // required label name "user_field_x[user-id]"
      // other user related label names use same name convention "user_field_x[safety]", etc
      let userPrefixes = [];
      _.forEach(fields, function (field) {
        if ( field.name.indexOf("user-id") > 0 ) {
          userPrefixes.push( _.truncate(field.name, { 'length' : 14,'separator' : '[', 'omission' : ''}) );
        }
      });
      console.log({'user prefixes' : userPrefixes});

      // create empty radio button field names for validation
      let ratings = ['quality', 'leadership', 'trust', 'safety'];
      let radioFieldNames = [];

      _.forEach(userPrefixes, function (prefix) {
        let editedNames = [];
        editedNames = _.map(ratings, function (ratingName) {
          return `${prefix}[${ratingName}]`;
        });
        radioFieldNames = _.concat(radioFieldNames, editedNames);
      });
      console.log({'radio field names' : radioFieldNames});

      // Adds empty radio buttons to fields array
      _.forEach(radioFieldNames, function (rating) {
        _.filter(fields, ['name', rating]).length === 0 ? fields.push({name: rating, value: ''}) : '';
      });

      // display all inputs
      console.log({'all fields':fields});

      // validate inputs
      let errors = [];
      $(fields).each(function (index, element) {
        if (element.value === '') {
          errors.push({ele: element.name, message: 'is empty'});
        }
      });

      // display erros
      // if (errors.length > 0) {
      //   console.log({'Empty fields':errors});
      //   return false;
      // }

      // submit form
      console.log('form validated and submitting');
      $.ajax({
        url : labor_form_ajax.ajax_url,
        type : 'post',
        data : {
          action : 'foreman_daily_form',
          payload : {'formData': fields, 'users' : userPrefixes}
        },
        success : function( response ) {

          console.log('Foreman Daily Form Submited from Ajax!!!!');

          console.log(response);

          form_submitted_modal_success();

        },
        fail: function () {
          //$('.search-container ul').html('Ocurrio un problema en la busqueda. Intentelo mas tarde.');
          form_submitted_modal_fail();

        },
        statusCode: {
          500: function() {
            //alert( "page not found" );
            form_submitted_modal_fail();
          }
        }
      });
    });

    function form_submitted_modal_success() {
      Swal.fire({
        title: 'Thank You!',
        text: 'Form Submitted Successfuly',
        icon: 'success',
        confirmButtonText: 'Got it',
        onAfterClose: function() {
          window.location.href = labor_form_ajax.admin_url;
        }
      })
    }

    function form_submitted_modal_fail() {
      Swal.fire({
        title: 'Sorry',
        text: 'Something bad happened. Please try again in a few minutes',
        icon: 'error',
        confirmButtonText: 'Got it',
        onAfterClose: function() {
          errors = [];
        }
      })
    }

    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      },
      onAfterClose: function() {
        errors = [];
      }
    })

    function form_error_message(message) {

      Toast.fire({
        icon: 'error',
        title: message
      })

    }

    /**
     * ADD CUSTOM HTML IN ADMIN SIDEBAR - ( SMALL LOGO )
     */
    if ( $(window).width() > 783) {
      $('#adminmenu').before('<div class="small-logo"></div>');
    }

    /**
     * USER SKILLS CHART
     */
    // User Skill Chart
    let userSkillChartEle = $('#user-skills-chart');
    if ( userSkillChartEle.length > 0 ) {

      const options = userSkillChartEle.data('options');

      let newLabels = [];
      let newValues = [];

      _.each(options, function (value, key) {
        newLabels.push(key);
        newValues.push(value);
      })
      let userSkillChart = new Chart(userSkillChartEle, {
        // The type of chart we want to create
        type: 'radar',
        // The data for our dataset
        data: {
          labels: newLabels,
          datasets: [
            {
              label: 'Skill',
              data: newValues,
              borderColor: 'orange',
              backgroundColor: 'rgb(242, 171, 47,0.5)',
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          scale: {
            ticks: {
              min: 0,
              max: 6,
              stepSize: 1
            }
          }
        }
      });
      userSkillChart.canvas.parentNode.style.height = '360px';
      userSkillChart.canvas.parentNode.style.width = '360px';
    }

    /**
     * USER PERFORMANCE GAUGE
     */
    let userPerformanceEle = $('#user-performance-gauge');
    if ( userPerformanceEle.length > 0 ) {
      let userPerformanceValue = userPerformanceEle.data('value');
      if (
          ( ! _.isNumber(userPerformanceValue) )
          || ( userPerformanceValue < 0 )
      ) {
        userPerformanceValue = 0;
      }
      console.log('valvue ' + userPerformanceValue);
      let userPerformanceGauge = new RadialGauge({
        renderTo: 'user-performance-gauge',
        width: 300,
        height: 300,
        units: "Avarege Points " + userPerformanceValue,
        minValue: 0,
        startAngle: 90,
        ticksAngle: 180,
        valueBox: false,
        maxValue: 140,
        majorTicks: [
          "0",
          "20",
          "40",
          "60",
          "80",
          "100",
          "120",
          "140"
        ],
        minorTicks: 2,
        strokeTicks: true,
        highlights: [
          {"from": 100, "to": 140, "color": "green"},
          {"from": 40, "to": 100, "color": "yellow"},
          {"from": 0, "to": 40, "color": "red"}
        ],
        colorPlate: "#fff",
        borderShadowWidth: 0,
        borders: false,
        needleType: "arrow",
        needleWidth: 2,
        needleCircleSize: 7,
        needleCircleOuter: true,
        needleCircleInner: false,
        animationDuration: 1500,
        animationRule: "linear",
        animation: true,
        value: userPerformanceValue
      }).draw();
    }

    /**
     * USER BEHAVIOR CHARTS
     */
    if ( $('.profile-behavior-card').length > 0 ) {
      var userBehaviourChartData = $('.profile-behavior-card').data('behavior-data');
    }

    let userBehaviorSafetyChartEle = $('#user-behavior-chart-safety');
    if ( userBehaviorSafetyChartEle.length > 0 ) {

      let userBehaviorSafetyChart = new Chart(userBehaviorSafetyChartEle, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
          labels: userBehaviourChartData.safety.labels,
          datasets: [
            {
              label: 'Safety',
              data: userBehaviourChartData.safety.values,
              borderColor: 'rgb(237, 163, 59,1)', // orange
              backgroundColor: 'rgb(0,0,0,0)',
            }
          ]
        }
      });
    }

    let userBehaviorQualityChartEle = $('#user-behavior-chart-quality');
    if ( userBehaviorQualityChartEle.length > 0 ) {

      let userBehaviorQualityChart = new Chart(userBehaviorQualityChartEle, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
          labels: userBehaviourChartData.quality.labels,
          datasets: [
            {
              label: 'Quality',
              data: userBehaviourChartData.quality.values,
              borderColor: 'rgb(77, 237, 59,1)',
              backgroundColor: 'rgb(0,0,0,0)', // green
            }
          ]
        }
      });
    }

    let userBehaviorLeadershipChartEle = $('#user-behavior-chart-leadership');
    if ( userBehaviorLeadershipChartEle.length > 0 ) {

      let userBehaviorLeadershipChart = new Chart(userBehaviorLeadershipChartEle, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
          labels: userBehaviourChartData.leadership.labels,
          datasets: [
            {
              label: 'Leadership',
              data: userBehaviourChartData.leadership.values,
              borderColor: 'rgb(59, 172, 237,1)', // blue
              backgroundColor: 'rgb(0,0,0,0)',
            }
          ]
        }
      });
    }

    let userBehaviorTrustChartEle = $('#user-behavior-chart-trust');
    if ( userBehaviorTrustChartEle.length > 0 ) {

      let userBehaviorTrustChart = new Chart(userBehaviorTrustChartEle, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
          labels: userBehaviourChartData.trust.labels,
          datasets: [
            {
              label: 'Trust',
              data: userBehaviourChartData.trust.values,
              borderColor: 'rgb(59, 65, 237,1)', // dark blue
              backgroundColor: 'rgb(0,0,0,0)',
            }
          ]
        }
      });
    }


    /**
     * DASHBOARD CHARTS
     */

    // PROJECT PROGRESS
    let dashboardProjectChartEle = $('#dashboard-project-progress-chart');
    if ( dashboardProjectChartEle.length > 0 ) {
      let data = dashboardProjectChartEle.data('chart-data');
      let dashboardProjectChart = new Chart(dashboardProjectChartEle, {
        type: 'horizontalBar',
        data: {
          labels: data.labels,
          datasets: [{
            label: 'Projects',
            data: data.values,
            backgroundColor:
              'rgba(52, 235, 195, .5)',
            borderColor: 'rgba(52, 235, 195, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        },
        defaults:{
          global: {
            elements: {
              rectangle: {

              }
            }
          }
        }
      });
    }
    
    // TEAM PERFORMANCE
    let dashboardTEamChartEle = $('#dashboard-team-performance-chart');
    if ( dashboardTEamChartEle.length > 0 ) {
      let data = dashboardTEamChartEle.data('chart-data');
      let dashboardTEamChart = new Chart(dashboardTEamChartEle, {
        type: 'bar',
        data: {
          labels: data.labels,
          datasets: [{
            label: 'Average Points Per Team',
            data: data.values,
            backgroundColor:
                'rgba(235, 146, 52, .5)',
            borderColor: 'rgba(235, 146, 52, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        },
        defaults:{
          global: {
            elements: {
              rectangle: {

              }
            }
          }
        }
      });
    }

    /**
     * METABOX CHARTS
     */
    
    // PROJECT PROGRESS
    let metaBoxProjectChartEle = $('#meta-box-project-progress-chart');
    if ( metaBoxProjectChartEle.length > 0 ) {
      let data = metaBoxProjectChartEle.data('chart-data');
      let metaBoxProjectChart = new Chart(metaBoxProjectChartEle, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
          labels: data.labels,
          datasets: [
            {
              label: 'Progress',
              data: data.values,
              borderColor: 'rgb(59, 65, 237,1)', // dark blue
              backgroundColor: 'rgb(0,0,0,0)',
            }
          ]
        }
      });
    }




    /**
     * ADD NOTES TO BEHAVIOUR SECTION
     */
    $(document).on('change', '.js-behavior-list input', function () {
      if ( $(this).val() == '1' || $(this).val() == '5' ) {
        $(this).parents('.js-behavior-list').siblings('textarea').show();
        $(this).parents('.js-behavior-list').siblings('textarea').addClass('animated zoomIn')
      } else {
        $(this).parents('.js-behavior-list').siblings('textarea').toggleClass('animated zoomIn').hide();
      }

    })


  });
})(jQuery, lodash)

