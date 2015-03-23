var express = require('express');
var http = require('http');
var app = express();
var server = http.createServer(app);

var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended: false });

var config = [
    {
    name : "host1",
    hostname : "nessus-ntp.lab.com",
    port : 1241,
    username : "toto"
    },

    {
    name : "host2",
    hostname : "nessus-xml.lab.com",
    port : 3384,
    username : "admin"
    }
];

app.post('/add', urlencodedParser, function (req, res) {
  if (!req.body) return res.sendStatus(400)
  if(req.body.user == 'user' && req.body.password == 'password') {
        
         var newConfig = {
         name : req.body.name,
         hostname : req.body.hostname,
         port : req.body.port,
         username : req.body.username
       }; 
 
     config.push(newConfig);
       
    res.send(JSON.stringify(config));
    }
});

app.post('/delete', urlencodedParser, function (req, res) {
  if (!req.body) return res.sendStatus(400)
  if(req.body.user == 'user' && req.body.password == 'password') {

    var index = config.indexOf(config.name == req.body.name);
    config.splice(index, 1);
 
       
    res.send(JSON.stringify(config));
    }
});

server.listen(3000);
console.log('Express server started on port %s', server.address().port);