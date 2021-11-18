const express = require("express");

let app = express();

let myLogger = function (req, res, next) {
    console.log('LOGGED')
    next()
}

app.use(myLogger)

app.get('/', (req, res) => {
    res.send("anc");
})

app.listen(3000, () => {
    console.log("123456789")
})