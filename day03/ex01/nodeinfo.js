const router = require('express').Router();

// Requests from /ex01/...
router.get('/', (req, res) => {
	res.send(process.versions);
});

module.exports = router;