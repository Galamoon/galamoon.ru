'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const livereload = require('gulp-livereload');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src('./src/scss/*.scss')
        .pipe(sourcemaps.init({
            largeFile: true
        }))
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('assets.bundle.css'))
        .pipe(sourcemaps.write('./', {
            sourceMappingURLPrefix: '/local/js/galamoon/assets/dist'
        }))
        .pipe(gulp.dest('./dist/'));
});

gulp.task('style', function () {
    return gulp.src('./src/css/*.css')
        .pipe(sourcemaps.init({
            largeFile: true
        }))
        .pipe(concat('vendor.bundle.css'))
        .pipe(sourcemaps.write('./', {
            sourceMappingURLPrefix: '/local/js/galamoon/assets/dist'
        }))
        .pipe(gulp.dest('./dist/'));
});

gulp.task('vendor:script', function () {
    return gulp.src('./src/js/vendor/*.js')
        .pipe(sourcemaps.init({
            largeFile: true
        }))
        .pipe(concat('vendor.bundle.js'))
        .pipe(sourcemaps.write('./', {
            sourceMappingURLPrefix: '/local/js/galamoon/assets/dist'
        }))
        .pipe(gulp.dest('./dist/'));
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./src/scss/**/*.scss', gulp.series('sass')).on('change', livereload.changed);
});

gulp.task('build', gulp.series('sass', 'style', 'vendor:script'));