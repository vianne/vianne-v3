module.exports = function(grunt) {

  // JSファイル圧縮用のパス指定
  var jsPath = 'lib/js/';
  var wpThemePath = 'wordpress/wp-content/themes/vianne-v3/';

  grunt.initConfig({
    compass: {                  // Task
      dist: {                   // Target
        options: {              // Target options
          config: 'config/config.rb',
          environment: 'development'
        }
      },
      wordpress: {                    // Another target
        options: {
          sassDir: 'lib/scss/',
          cssDir: wpThemePath + 'css/',
          cacheDir: 'cache/'
        }
      }
    },
    assemble: {
      options: {
        layoutdir: 'src/layouts',
        data: ['src/data/**/*.{json, yml}'],
        partials: ['src/includes/**/*.hbs'],
        assets: 'www/assets',
        flatten: false
      },
      site: {
        expand: true,
        cwd: 'src/pages',
        src: ['**/*.hbs'],
        dest: 'www/'
      }
    },
    // JSファイル圧縮
    uglify: {
      min: {
        files: {
          'www/assets/js/common.min.js': [
            jsPath + 'jquery-1.10.2.min.js',
            jsPath + 'ga.js',
            //jsPath + 'DD_belatedPNG_0.0.8a-min.js', // IE6で24bitPNGを有効に
            jsPath + 'jquery.scrollTo-min.js', // スムーズスクロール用
            jsPath + 'localscroll.js',  // スムーズスクロール用（scrollToとセット）
            //jsPath + 'if.useragent.js', // UA判別
            //jsPath + 'jquery.cookie.js', // cookie用
            jsPath + 'common.js'
          ]
        }
      }
    },
    connect: {
      uses_defaults: {} //空のサブタスクを入れます。名前は何でもいいです。ここではuses_defaultsにしました。
    },
    watch: {
      compass: {
        files: ['lib/scss/*.scss'], // 変更を監視するファイルを指定
        tasks: ['compass'] // 変更されたらどのタスクを実行するか
      },
      assemble: {
        files: ['src/**/*.hbs'],
        tasks: ['assemble']
      },
      uglify: {
        files: ['lib/js/*.js'],
        tasks: 'uglify'
      },
      options: {
        livereload: true //livereloadを有効にします。
      }
    }
  });

  grunt.loadNpmTasks('assemble');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-compass');

  grunt.registerTask('default', ['connect', 'watch']);
};