module.exports = function( grunt ) {

  require( 'jit-grunt' )( grunt );

  grunt.initConfig( {

    pkg: grunt.file.readJSON( 'package.json' ),

    copy: {
      dist: {
        files: [
          {
            expand: true,
            src: [
              '**',
              '!**/node_modules/**',
              '!Gruntfile.js',
              '!package.json'
            ],
            dest: 'dist/'
          }
        ]
      }
    }

  } );

  grunt.registerTask( 'dist', 'copy:dist' );

};