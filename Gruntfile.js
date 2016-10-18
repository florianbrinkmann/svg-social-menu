module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),


	svgstore: {
		options: {
			prefix: 'svg_social_menu_icon-', // This will prefix each ID
			svg: {
				version: '1.1',
				xmlns:   'http://www.w3.org/2000/svg'
			},
			symbol: {
				viewBox: '0 0 16 16'
			},
		},
		default : {
			files: {
				'svg/social-media-icons.svg': ['svg/single/*.svg'],
			},
		},
	}
	});

	// Load the plugin that provides the "svgstore" task.
	grunt.loadNpmTasks('grunt-svgstore');

	// Default task(s).
	grunt.registerTask('default', ['svgstore']);

};