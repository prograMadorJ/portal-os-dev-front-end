var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    minify_js = require('gulp-uglify'),
    browserify = require('gulp-browserify'),
    image = require('gulp-image');

var src_dir = 'resources/assets/Portal_OS';
var dest_dir = 'public/portal-os';

gulp.task('img-minify', function () {
    gulp.src(dest_dir + '/temp/*')
        .pipe(image())
        .on('error', swallowError)
        .pipe(gulp.dest(dest_dir + '/img'));
});
gulp.task('sass', function () {
    return gulp.src(src_dir + '/sass/pages/*.scss')
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError)) // Converts Sass to CSS with gulp-sass
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest(dest_dir + '/css/pages'))
});
gulp.task('js', function () {
    // Single entry point to browserify
    gulp.src([
        src_dir + '/js/*.js'
    ])
        .pipe(minify_js())
        // .pipe(browserify())
        .pipe(gulp.dest(dest_dir + '/js/'));
    gulp.src([
        src_dir + '/js/pages/*.js'
    ])
        .pipe(minify_js())
        // .pipe(browserify())
        .pipe(gulp.dest(dest_dir + '/js/pages'));
    gulp.src([
        src_dir + '/js/lib/*.js'
    ])
        .pipe(minify_js())
        // .pipe(browserify())
        .pipe(gulp.dest(dest_dir + '/js/lib'));
    gulp.src([
        src_dir + '/js/lib/modules/*.js'
    ])
        .pipe(minify_js())
        // .pipe(browserify())
        .pipe(gulp.dest(dest_dir + '/js/lib'));
});
gulp.task('dev', function () {
    gulp.src(src_dir + 'sass/pages/*.scss')
        .pipe(sass())
        .on('error', swallowError)
        .pipe(gulp.dest(dest_dir + '/css/pages'));
    gulp.src([
        src_dir + '/js/pages/*.js'
    ])
        .pipe(browserify({
            insertGlobals: true,
            debug: true
        }))
        .on('error', swallowError)
        .pipe(gulp.dest(dest_dir + '/js/pages'))
});
gulp.task('dev-w', ['sass', 'js'], function () {
    return gulp.watch([
        src_dir + '/sass/*/*.scss',
        src_dir + '/sass/*.scss',
        src_dir + '/js/*/*.js',
        src_dir + '/js/*.js'
    ], ['sass', 'js']);
});

function swallowError(error) {
    // If you want details of the error in the console
    console.log(error.toString());
    this.emit('end')
}
