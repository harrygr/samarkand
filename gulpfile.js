var gulp = require('gulp');

var less = require('gulp-less');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

gulp.task('default', ['less', 'scripts']);

// Compile Our Less
gulp.task('less', function() {
	return gulp.src('assets/less/app.less')
	.pipe(less())
	.pipe(minifyCSS())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('./assets/css'))
	.pipe(notify('LESS Compiled'));
});

var scripts = [
'assets/js/vendor/jquery.fancybox.js',
'assets/js/vendor/jquery.zoom.min.js',
'assets/js/plugins/bootstrap/transition.js',
'assets/js/plugins/bootstrap/alert.js',
'assets/js/plugins/bootstrap/button.js',
'assets/js/plugins/bootstrap/carousel.js',
'assets/js/plugins/bootstrap/collapse.js',
'assets/js/plugins/bootstrap/dropdown.js',
'assets/js/plugins/bootstrap/modal.js',
'assets/js/plugins/bootstrap/tooltip.js',
'assets/js/plugins/bootstrap/popover.js',
'assets/js/plugins/bootstrap/scrollspy.js',
'assets/js/plugins/bootstrap/tab.js',
'assets/js/plugins/bootstrap/affix.js',
'assets/js/_main.js',
];

gulp.task('scripts', function(){
	return gulp.src(scripts)
	.pipe(concat('all.js'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(uglify())
	.pipe(gulp.dest('./assets/js'))
	.pipe(notify('Scripts compiled!'));
});