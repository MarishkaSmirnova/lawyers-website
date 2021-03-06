const gulp = require( 'gulp' );
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');

gulp.task('sass-compile',function(){
    return gulp.src('dev/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('dev/styles'));
});

gulp.task('watch',function(){
    gulp.watch('dev/scss/**/*.scss', gulp.series('sass-compile'))
});
