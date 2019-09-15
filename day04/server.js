const express = require('express');
const app = express();
const router = require('./router.js');
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
/*
const mongoose = require('mongoose');
mongoose.connect (process.env.MONGODB, {useNewUrlParser: true, useUnifiedTopology: true})
    .then(() => console.log("Mongoose connected."))
    .catch(err => console.log('DB connection error ', err));
*/

app.use(bodyParser.urlencoded({ extended: false}));
app.use(bodyParser.json());
app.use(cookieParser());

router(app);

app.listen(process.env.port || 3000, function() {
    console.log(`Server listening on port ${this.address().port}`);
});
