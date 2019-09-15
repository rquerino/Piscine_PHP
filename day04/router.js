module.exports = (app) => {
	const routes = [
        { url: '/ex00', path: './ex00/index.js' },
		//{ url: '/ex01', path: './ex01/index.js' },
		//{ url: '/ex02', path: './ex02/index.js' },
		//{ url: '/ex03', path: './ex03/index.js' },
		//{ url: '/ex04', path: './ex04/index.js' },
	];

	for (const route of routes) {
		app.use(route.url, require(route.path));
	}
};
