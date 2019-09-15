const router = require('express').Router();
const pug = require('pug');
const path = require('path');
const crypto = require('crypto');

var sessions = {};

router.get('/', (req, res) => {

    var login = req.query.login || '';
    var passwd = req.query.passwd || '';
    var submit = req.query.submit || false;

    if (login && passwd && submit == "OK") {
        // crypto random to create a random ID if it doesn't exist
        var sessId = crypto.randomBytes(20).toString('hex');

        res.cookie('sess', sessId, {
            maxAge: 900000, httpOnly: true
        });

        sessions[sessId] = {
            login, passwd
        };

    } else if (req.cookies.sess && req.cookies.sess in sessions) {
        login = sessions[req.cookies.sess].login;
        passwd = sessions[req.cookies.sess].passwd;
    }

    var filePath = path.join(__dirname, 'index.pug');
    var locals = { login, passwd };

    res.send(
        pug.compileFile(filePath)(locals)
    );
});

module.exports = router;
