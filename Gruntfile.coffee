module.exports = (grunt) ->

  # load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks)

  grunt.initConfig

    pkg: grunt.file.readJSON 'package.json'

    concat:
      min:
        files:
          'public/js/main.js': ['public/js/src/libs/*.js','public/js/src/*.js']

    compass:
      dist:
        options:
          config: 'public/style/config.rb'
          sassDir: 'public/style/sass'
          imagesDir: 'public/img'
          cssDir: 'public/style'
          environment: 'production'
          outputStyle: 'compressed'
          force: true

    imagemin:
      dynamic:
        files: [
          expand: true
          cwd: 'public/img/src'
          src: ['*.{png,jpg,gif}']
          dest: 'public/img/'
        ]

    browser_sync:
      files:
        src: 'public/style/screen.css'
      options:
          host: "localhost"
          watchTask: true

    watch:
      options:
        livereload: true
      scripts:
        files: ['public/js/src/*.js','public/js/src/libs/*.js']
        tasks: ['concat']
      styles:
        files: ['public/style/**/*.{sass,scss}','public/img/ui/*.png']
        tasks: ['compass']
      images:
        files: ['public/img/src/*.{png,jpg,gif}']
        tasks: ['imagemin']

  # Development task checks and concatenates JS, compiles SASS preserving comments and nesting, runs dev server, and starts watch
  grunt.registerTask 'default', ['compass', 'concat', 'imagemin', 'browser_sync', 'watch']
