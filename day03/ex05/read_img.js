const router = require('express').Router();
const path = require('path');

// Requests are from /ex05/...
router.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'img', '42.png')); // ../img/42.png
});

module.exports = router;