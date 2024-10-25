const mix = require("laravel-mix");
const fs = require("fs-extra");
const path = require("path");
const cliColor = require("cli-color");
const emojic = require("emojic");
const wpPot = require("wp-pot");
const archiver = require("archiver");
const min = mix.inProduction() ? ".min" : "";

const package_path = path.resolve(__dirname);
const package_slug = path.basename(path.resolve(package_path));
const temDirectory = package_path + '/build';

require('@tinypixelco/laravel-mix-wp-blocks');

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery.
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

// mix.setPublicPath('./assets/dist');

// JS Compile assets.
// mix.js('src/scripts/app.js', 'assets/js')
// 	.js('src/scripts/admin.js', 'assets/js');
//
// mix.sass('src/sass/admin.scss', 'assets/dist/admin.min.css')
// 	.sass('src/sass/rtl.scss', 'build/temp')
// .sass('src/sass/rtl.scss', 'build/temp')


mix.sass('src/sass/style.scss', `assets/css/style${min}.css`)
	.sass('src/sass/admin.scss', `assets/css/admin${min}.css`)
	.sass('src/sass/rtl.scss', 'build/temp/')
	.sourceMaps(true, 'source-map')
	.options( {
		terser: {
			extractComments: false
		},
		processCssUrls: false
	} )

	.postCss('assets/css/style.css', 'build/temp/style.css', [
		require('rtlcss'),
	])
	.combine([
		'build/temp/style.css',
		'build/temp/rtl.css'
	], `assets/css-rtl/style${min}.css`)


if (mix.inProduction()) {
	let languages = path.resolve("languages");
	fs.ensureDir(languages, function (err) {
		if (err) return console.error(err); // if file or folder does not exist
		wpPot({
			package: "Foodymat Theme",
			bugReport: "",
			src: "**/*.php",
			domain: "foodymat",
			destFile: "languages/foodymat.pot",
		});
	});
}

// Make package
if (process.env.npm_config_package) {
	mix.then(function () {
		const copyTo = path.resolve(`${temDirectory}/${package_slug}`);
		// Select All file then paste on list
		let includes = [
			"assets",
			"inc",
			"languages",
			"page-templates",
			"plugin-bundle",
			"vendor",
			"views",
			"404.php",
			"archive.php",
			"archive-rt-project.php",
			"archive-rt-service.php",
			"archive-rt-team.php",
			"author.php",
			"comments.php",
			"footer.php",
			"functions.php",
			"header.php",
			"index.php",
			"page.php",
			"readme.txt",
			"screenshot.png",
			"search.php",
			"searchform.php",
			"sidebar.php",
			"single.php",
			"single-rt-project.php",
			"single-rt-service.php",
			"single-rt-team.php",
			"style-editor.css",
			"style.css",
			"wpml-config.xml",
		];
		fs.ensureDir(copyTo, function (err) {
			if (err) return console.error(err);
			includes.map((include) => {
				fs.copy(
					`${package_path}/${include}`,
					`${copyTo}/${include}`,
					function (err) {
						if (err) return console.error(err);
						console.log(
							cliColor.white(`=> ${emojic.smiley}  ${include} copied...`)
						);
					}
				);
			});
			console.log(
				cliColor.white(`=> ${emojic.whiteCheckMark}  Build directory created`)
			);
		});
	});

	return;
}

if (process.env.npm_config_zip) {
	async function getVersion() {
		let data;
		try {
			data = await fs.readFile(package_path + `/style.css`, "utf-8");
		} catch (err) {
			console.error(err);
		}
		const lines = data.split(/\r?\n/);
		let version = "";
		for (let i = 0; i < lines.length; i++) {
			if (lines[i].includes("* Version:") || lines[i].includes("Version:")) {
				version = lines[i]
					.replace("Version:", "")
					.trim();
				break;
			}
		}
		return version;
	}

	const version_get = getVersion();
	version_get.then(function (version) {
		const destinationPath = `${temDirectory}/${package_slug}.${version}.zip`;
		const output = fs.createWriteStream(destinationPath);
		const archive = archiver("zip", {zlib: {level: 9}});
		output.on("close", function () {
			console.log(archive.pointer() + " total bytes");
			console.log(
				"Archive has been finalized and the output file descriptor has closed."
			);
			fs.removeSync(`${temDirectory}/${package_slug}`);
		});
		output.on("end", function () {
			console.log("Data has been drained");
		});
		archive.on("error", function (err) {
			throw err;
		});

		archive.pipe(output);
		archive.directory(`${temDirectory}/${package_slug}`, package_slug);
		archive.finalize();
	});
}
