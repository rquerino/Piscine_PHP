const router = require('express').Router();
const path = require('path');
const fs = require('fs'); //readFileSync
const bodyParser = require('body-parser'); // Use .headers

router.use(bodyParser.raw());

// Requests are from /ex06/...
// https error 401: Unauthorized
let _401 = `<html><body>That area is accessible for members only</body></html>`; // Error message
// Refuse function
function refuse(res) {
	res.set('WWW-Authenticate', 'Basic realm="Member area"');
	return res.status(401).end(_401);
}

function guard(req, res, next) {
	if (!('authorization') in req.headers) {
		return refuse(res);
	}
	//gets the password if it exists, otherwise null
	const b64auth = req.headers.authorization.split(' ')[1] || '';
	// Formats login and password (decrypted form base64)
	const [login, password] = Buffer.from(b64auth, 'base64').toString().split(':');
	if (login != 'zaz' || password != 'Ilovemylittleponey') {
		return refuse(res);
	}
	next(); //router.get
}

// Gets the image source, for that 
function get_image_source() {
	// Defines the full file path
	let f = path.join(__dirname, '../img/42.png');
	// Reads the file
	let content = fs.readFileSync(f);
	//Encrypt in base64 the variable content(image file)
	return `data:image/png;base64,${Buffer.from(content).toString('base64')}`;
}

// The next as parameter in the function guard means that this will only be executed
// if there's no erros of authentication.
router.get('/', guard, (_req, res) => {
	res.send(`<html><body>Hello Zaz<br /><img src='${get_image_source()}'></body></html>`);
});

module.exports = router;
