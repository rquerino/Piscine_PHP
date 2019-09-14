// The router package inside express uses the information above to handle requisitions
module.exports = (app) => {
	const routes = [
		{ url: '/ex01', path: './ex01/nodeinfo.js' },
		{ url: '/ex02', path: './ex02/print_get.js' },
		{ url: '/ex03', path: './ex03/cookie_crisp.js' },
		{ url: '/ex05', path: './ex05/read_img.js' },
		{ url: '/ex06', path: './ex06/members_only.js' },
	];

	for (const route of routes) {
		app.use(route.url, require(route.path));
	}
};