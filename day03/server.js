const express = require('express');
const app = express();
const path = require('path');
const cookieParser = require('cookie-parser'); //Cookie package for ex03
const router = require('./router.js'); //Handles all the exercises

//Let the user access the html page for ex04
// http://localhost:3000/ex04/raw_text.html
app.use('/ex04/', express.static(path.join(__dirname, 'ex04')));
app.use(cookieParser());
router(app);

//Using port 3000
app.listen(3000), () => {
    console.log("Server listening on port 3000.");
}