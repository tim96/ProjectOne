var gulp = require('gulp');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
var uglifycss = require('gulp-uglifycss');
var less = require('gulp-less');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var env = process.env.type;

gulp.task('js', function () {
    return gulp.src([
            // 'bower_components/jquery/dist/jquery.min.js',
            'bower_components/jquery-modern/dist/jquery.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js'])
        .pipe(concat('app.js'))
        // .pipe(gulpif(env === 'prod', uglify()))
        .pipe(uglify())
        // .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js'));
});

gulp.task('chart.js', function () {
    return gulp.src([
        'bower_components/Chart.js/dist/Chart.min.js'
    ])
        .pipe(concat('chart.js'))
        // .pipe(gulpif(env === 'prod', uglify()))
        .pipe(uglify())
        // .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js'));
});

gulp.task('symfony-collection.js', function () {
    return gulp.src([
        'bower_components/symfony-collection/jquery.collection.js'
    ])
        .pipe(concat('symfony-collection.min.js'))
        // .pipe(gulpif(env === 'prod', uglify()))
        .pipe(uglify())
        // .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('web/js'));
});

gulp.task('css', function () {
    return gulp.src([
            'bower_components/bootstrap/dist/css/bootstrap.css',
            'bower_components/font-awesome/css/font-awesome.min.css',
            'bower_components/highlight/src/styles/github.css'])
        .pipe(gulpif(/[.]less/, less()))
        .pipe(concat('styles.css'))
        // .pipe(gulpif(env === 'prod', uglifycss()))
        // .pipe(sourcemaps.write('./'))
        .pipe(uglifycss())
        .pipe(gulp.dest('web/css'));
});

gulp.task('custom_css', function () {
    return gulp.src([
        'src/Tim/FrontendBundle/Resources/public/css/iconeffects.css',
        'src/Tim/FrontendBundle/Resources/public/css/style.css',
        'src/Tim/FrontendBundle/Resources/public/css/swipebox.css',
        'src/Tim/FrontendBundle/Resources/public/css/animate.css',
        'src/Tim/FrontendBundle/Resources/public/css/owl.carousel.css'
    ])
        .pipe(gulpif(/[.]less/, less()))
        .pipe(concat('custom_styles.css'))
        // .pipe(gulpif(env === 'prod', uglifycss()))
        // .pipe(sourcemaps.write('./'))
        .pipe(uglifycss())
        .pipe(gulp.dest('web/css'));
});

gulp.task('fonts', function() {
    return gulp.src(['bower_components/bootstrap/dist/fonts/**/*.*',
        'bower_components/font-awesome/fonts/*.{otf,eot,ttf,woff,woff2,eof,svg}'])
        // 'bower_components/font-awesome/fonts/*.*'])
        // .pipe(flatten())
        .pipe(gulp.dest('web/fonts'));
});

//define executable tasks when running "gulp" command
gulp.task('default', ['js', 'css', 'custom_css', 'fonts', 'chart.js', 'symfony-collection.js']);