const express = require('express');
const app = express();
var path = require('path')


app.use(express.static(path.join(__dirname, 'public')));


app.get('/', function(req, res) {
 res.render('landing.ejs');
});


const PORT = process.env.PORT || 5000;
app.listen(PORT);
console.log('SERVER STARTED');