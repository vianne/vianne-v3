module.exports = function(grunt) {

  // JSファイル圧縮用のパス指定
  var jsPath = 'lib/js/';

  grunt.initConfig({
    compass: {                  // Task
      dist: {                   // Target
        options: {              // Target options
          config: 'config/config.rb',
          environment: 'development'
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
            jsPath + 'DD_belatedPNG_0.0.8a-min.js', // IE6で24bitPNGを有効に
            jsPath + 'jquery.scrollTo-min.js', // スムーズスクロール用
            jsPath + 'localscroll.js',  // スムーズスクロール用（scrollToとセット）
            jsPath + 'if.useragent.js', // UA判別
            //jsPath + 'jquery.cookie.js', // cookie用
            jsPath + 'common.js'
          ]
        }
      }
    },
    kss: {
      options: {
        template: 'lib/kss-template',
        includeType: 'css',
        includePath: 'www/assets/css/site.css'
      },
      dist: {
        files: {
          'docs/': ['lib/scss/']
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
      kss: {
        files: ['www/assets/css/*.css'],
        tasks: ['kss']
      },
      options: {
        livereload: true //livereloadを有効にします。
      }
    }
  });

  grunt.loadNpmTasks('assemble');
  grunt.loadNpmTasks('grunt-kss');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-compass');

  grunt.registerTask('default', ['connect', 'watch']);
};