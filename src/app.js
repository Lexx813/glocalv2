const express = require('express'),
 passport = require('passport'),
 mongoose = require('mongoose'),
 bodyParser = require('body-parser'),
 nodemailer = require('nodemailer'),
 User = require('./models/user'),
 LocalStrategy = require('passport-local'),
 passportLocalMongoose = require('passport-local-mongoose');

mongoose.Promise = global.Promise;
mongoose.connect('mongodb://localhost/glocal')

const app = express();
app.set("view engine", "ejs");
app.use(bodyParser.urlencoded({extended: true}));
app.use(require('express-session')({secret: 'i hate this place', resave: false, saveUninitialized: false}));
app.use(passport.initialize());
app.use(passport.session());

passport.serializeUser(User.serializeUser());
passport.deserializeUser(User.deserializeUser());

var path = require('path')
app.use(express.static(path.join(__dirname, 'public')));

//ROUTES var indexRoutes = require("./routes/index") blog
app.get('/blogadmin', function (req, res) {
 res.render('blogadmin');
});
//CONTACT
app.post('/contact', function (req, res) {
 res.render('contact');
});
//LANDING
app.get('/', function (req, res) {
 res.render('landing');
});
//HOME
app.get("/home", function (req, res) {
 res.render('home');
})
//PAYMENTS
app.get("/payments", function (req, res) {
 res.render("payments");
})
//============== AUTH ROUTES ============== SHOW SIGN UP FORM
app.get('/register', function (req, res) {
 res.render('register');
});

app.post('/register', function (req, res) {
 req.body.username
 req.body.password
 User.register(new User({username: req.body.username}), req.body.password, function (err, user) {
  if (err) {
   console.log(err);
   return res.render('register');
  }
  passport.authenticate('local')(req, res, function () {
   res.redirect('/payments');
  });
 });
});

const PORT = process.env.PORT || 5000;
app.listen(PORT);
console.log('SERVER STARTED');