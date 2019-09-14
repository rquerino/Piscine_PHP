const router = require('express').Router();

// Requests from /ex02/...
router.get('/', (req, res) => {
    var text = "";
    for (const key in req.query) {
        //text += key + ": " + req.query[key] + "</br>";
        text += `${key}: ${req.query[key]}</br>`;
    }
	res.send(text);
});

module.exports = router;