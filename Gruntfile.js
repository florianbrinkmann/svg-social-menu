module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),

	svgmin: {
		dist: {
			files: [{
			expand: true,
			cwd: 'src/',
			src: ['*.svg'],
			dest: 'src/'
			}]
		},
		options: {
			plugins: [
				{ removeViewBox: false },
				{ removeUselessStrokeAndFill: false }
			]
		}
	},

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
				'svg/social-media-icons.svg': ['src/*.svg'],
			},
		},
	}

	});

	// Load plugins
	grunt.loadNpmTasks('grunt-svgmin');
	grunt.loadNpmTasks('grunt-svgstore');

	// Default task(s).
	grunt.registerTask('default', ['svgmin', 'svgstore']);

};