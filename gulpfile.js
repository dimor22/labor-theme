var gulp        = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sass        = require('gulp-sass');



// process sass
gulp.task('sass', function () {
    return gulp.src('./sass/**/*.scss')
        .pipe(autoprefixer({cascade: false}))
        .pipe(sass())
        .pipe(gulp.dest('./css'));
});