var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    browserify = require('gulp-browserify');
    image = require('gulp-image');

gulp.task('img-minify', function () {
    gulp.src('public/temp/*')
        .pipe(image())
        .on('error', swallowError)
        .pipe(gulp.dest('public/img'));
});
gulp.task('sass', function(){
    return gulp.src('resources/assets/sass/pages/*.scss')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError)) // Converts Sass to CSS with gulp-sass
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('public/css/pages'))
});
gulp.task('js', function() {
    // Single entry point to browserify
    gulp.src([
        'resources/assets/js/pages/*.js'
    ])
    // .pipe(browserify())
        .pipe(gulp.dest('public/js/pages'))
});
gulp.task('dev', function(){
    gulp.src('resources/assets/sass/pages/*.scss')
        .pipe(sass())
        .on('error', swallowError)
        .pipe(gulp.dest('public/css/pages'));
    gulp.src([
        'resources/assets/js/pages/*.js'
    ])
        .pipe(browserify({
            insertGlobals : true,
            debug : true
        }))
        .on('error', swallowError)
        .pipe(gulp.dest('public/js/pages'))
});
gulp.task('dev-w',['sass','js'], function(){
    return gulp.watch([
        'resources/assets/sass/*/*.scss',
        'resources/assets/sass/*.scss',
        'resources/assets/js/*/*.js',
        'resources/assets/js/*.js'
    ], ['sass','js']);
});
function swallowError (error) {
    // If you want details of the error in the console
    console.log(error.toString());
    this.emit('end')
}