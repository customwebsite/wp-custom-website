module.exports = function(grunt) {
	// require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks
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
	  },
	  sass: {
        options: {
            sourceMap: true
        },
        dist: {
            files: {
                'style.css': 'sass/style.scss'
            }
        }
      }
	});

	grunt.loadNpmTasks('grunt-pot');
	grunt.loadNpmTasks('grunt-sass');
	grunt.registerTask('default', ['pot', 'sass']);
};
