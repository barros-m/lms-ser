//const http = require('http');
var express = require('express');
//const hostname = '0.0.0.0';
//const port = 80;
var app = express();
var path = require('path');

app.get('/', function(req, res) {
  res.sendFile(path.join(__dirname + '/index.html'));
});

// const server = http.createServer((req, res) => {
//   res.statusCode = 200;
//   res.setHeader('Content-Type', 'text/plain');
//   res.
//   res.end('Hello World\n');
// });

// server.listen(port, hostname, () => {
//   console.log(`Server running at http://${hostname}:${port}/`);
// });

app.listen(80, '0.0.0.0', 511);

//loads and initialize the SDK of facebook
(function (d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) { return; }
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*
  Things to do:

  -payment method
  -redirect user if connected to course page 
  -start developing the course page

*/
var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};

function logIn() {
  FB.login(function (response) {
      if (response.status == "connected") {
          person.userID = response.authResponse.userID;
          person.accessToken = response.authResponse.accessToken;

          FB.api('/me?fields=id,name,email,picture.type(large)', function (userData) {
              person.name = userData.name;
              person.email = userData.email;
              person.picture = userData.picture.data.url;
              console.log(person.name, ": haha : ", person.email);
             
          });
          console.log("Redirecting...");
          window.location.href = ("/course.html");
      }
  }, {scope: 'public_profile, email'})
}

window.fbAsyncInit = function () {
  FB.init({
      appId: '1686727554790401',
      cookie: true,
      xfbml: true,
      version: 'v3.1'
  });

  FB.AppEvents.logPageView();

};


function makeAccount() {
  window.location.href = ("http://facebook.com");// redirect top facebook page to make account
}

function request(){
  console.log("No idea, how..."); 
}

