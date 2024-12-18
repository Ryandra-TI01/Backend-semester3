const express = require("express");
const router = require('./routes/api.js')


// membuat object  express
const app = express();

app.use(express.json())
app.use(express.urlencoded())

app.use(router)


app.listen(3000, () => {
    console.log("server running on port localhost:3000")
})