module.exports = function(grunt) {
	grunt.initConfig({
	  pkg: grunt.file.readJSON("package.json"),
	  pot: {
		options: {
		  text_domain:'customwebsite',
		  language:'PHP',
		  dest:'languages/',
		  keywords: ['gettext', '__']
		},
		files: {
		  src:  [ '**/*.php' ], //Parse all php files
		  expand: true
		}
	  }
	});

	grunt.loadNpmTasks('grunt-pot');
	// grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.registerTask('default', 'pot');
};
