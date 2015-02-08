var gulp = require('gulp');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
    gulp.src('public/assets/less/main.less')
        .pipe(less())
        .pipe(autoprefixer('last 10 version'))
        .pipe(gulp.dest('public/assets/css'))
});

gulp.task('watch', function(){
    gulp.watch('public/assets/less/**/*.less', ['css']);
});

gulp.task('default', ['watch']);