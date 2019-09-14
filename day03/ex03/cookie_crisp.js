const router = require('express').Router();

// Requests are from /ex03/...
router.get('/', (req, res) => {
    
    //The conditions above handle errors passed in the url (No action, No name, Set without value)
    // 400 is the https code for Bad Request .status(400)
    if (!('action' in req.query))
        return res.status(400).send('No action specified.');
    if (!('name' in req.query))
        return res.status(400).send('No name specified.');
    if (req.query.action == 'set' && !('value' in req.query))
        return res.status(400).send('No value specified.');
    //Using the cookie-parser package, creates, gets information and invalidate cookies
    switch (req.query.action) {
        case 'set':
            res.cookie(req.query.name, req.query.value);
            break;
        case 'get':
            if (req.query.name in req.cookies)
                res.send(req.cookies[req.query.name]);
            break;
        case 'del':
            res.cookie(req.query.name, "", { maxAge: -1 }); //Set the cookie value do null and expires it.
            break;
        default:
            return res.status(400).send('Invalid action.');
    }
    res.end();
});

module.exports = router;
