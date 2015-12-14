var express = require('express');
    var app = express();
    var bodyParser = require('body-parser');
    var session = require('express-session');    
    
    var person = require("./Model/Person");
    var meal = require("./Model/Meal");
    var exercise = require("./Model/Exercise");
    var unirest = require('unirest');    
    var Twit = require('twit');     //Homework: Setup the apps.facebook and the apps.twitter (developers.twitter.com/apps) (developers.facebook.com/apps)
    
    var twit = new Twit({
    consumer_key:         'pzBa1VAGBDIWAo0qNx42Ca6ya'
  , consumer_secret:      'bEaMvRySKuXCyIMlC8psStX0V0HYMTllx7E1jCyB9N9EnrQ7WE'
  , access_token:         '627899589-7hmxp1grQgmH82UlihDwxZB6OiDL3Sh31L9mvtSE'
  , access_token_secret:  'u92nZCbfJlPsula9NbZzY6hy6ucAnOYlkRHmBI55gYMIc'
})    
    app.use(express.static(__dirname + '/public'));
    app.use(bodyParser.urlencoded({ extended: false }));
    app.use(bodyParser.json());
    app.use(session({ secret: 'OK' }));



//==================================================================
app.get("/person", function(req, res)  //res=response the returned information req=what the user typed in to the browser, ip address
{
  if (!req.session.user || req.session.user.typeid != 'Admin')  
  {
    res.status(302).send("Error. You do not have permission to access the page");
    return; 
  }
  person.get(null, function(err, rows)
  {
    if (err)
    {
        //500 is an error 200 is ok
        res.status(500).send(err);
    }
    else
    {
        res.send(rows);
    }
  })
})
.get("/person/:id", function(req, res)
{
  person.get(req.params.id, function(rows)
  {
    res.send(rows[0]);
  })
})
.post("/person", function(req, res){
  var errors = person.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  person.save(req.body, function(err, row){
      if(err)
      {
        res.status(500).send(err);
        return;
      }
    res.send(row);
  })
})
.delete("/person/:id", function(req, res){   
  
  person.delete(req.params.id, function(err, rows){  //model
      if(err)
      {
        res.status(500).send(err);
      }
      else
      {
        res.send(req.params.id);
      }
  })
});
//==================================================================
app.get("/meal", function(req, res)  
{
  food.get(null, req.session.user.persons_id, function(err, rows)  
  {
    if (err)
    {
        //500 is an error 200 is ok
        res.status(500).send(err);
    }
    else
    {
        res.send(rows);
    }
  })
})
.get("/meal/:id", function(req, res)
{
  food.get(req.params.id, req.session.user.persons_id, function(rows)
  {
    res.send(rows[0]);
  })
})
.post("/meal", function(req, res){
  var errors = meal.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  meal.save(req.body, req.session.user.persons_id, function(err, row){    
      if(err)
      {
        res.status(500).send(err);
        return;
      }
    res.send(row);
  })
})
.delete("/meal/:id", function(req, res){   
  
  meal.delete(req.params.id, function(err, rows){  
      if(err)
      {
        res.status(500).send(err);
      }
      else
      {
        res.send(req.params.id);
      }
  })
});

//==================================================================
app.get("/exercise", function(req, res){
  exercise.get(null, req.session.user.persons_id, function(err, rows)
  {
    if (err)
    {
        res.status(500).send(err);
    }
    else
    {
        res.send(rows);
    }
  })
})
.get("/exercise/:id", function(req, res){
  exercise.get(req.params.id, req.session.user.persons_id, function(err, rows)
  {
    res.send(rows[0]);
  })
})
.post("/exercise", function(req, res){
  var errors = exercise.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  
  twit.post('statuses/update', { status: 'App test'}, function(err, data, response) {
      console.log(data)
    })
  
  exercise.save(req.body, req.session.user.persons_id, function(err, row){
      if(err)
      {
        res.status(500).send(err);
        return;
      }
    res.send(row);
  })
})
.delete("/exercise/:id", function(req, res){
  exercise.delete(req.params.id, function(err, rows){
      if(err){
        res.status(500).send(err);
      }else{
        res.send(req.params.id);
      }
  })
})

.get("/user/", function(req, res){
    unirest.get("https://graph.facebook.com/me?access_token=" + req.params.access_token + "&fields=id,name,email")
    .end(function (result) {
        res.send(result.body);
    });
})

//========================================================================
app.get("/friend", function(req, res) 
{
  friend.get(null,  req.session.user.persons_id, function(err, rows)
  {
    if (err)
    {
        //500 is an error 200 is ok
        res.status(500).send(err);
    }
    else
    {
        res.send(rows);
    }
  })
})
.get("/friend/:id", function(req, res)
{
  friend.get(req.params.id, req.session.user.persons_id, function(rows)
  {
    res.send(rows[0]);
  })
})
.post("/friend", function(req, res){
  var errors = friend.validate(req.body);
  if(errors){
    res.status(500).send(errors);
    return;
  }
  friend.save(req.body,  req.session.user.persons_id, function(err, row){
      if(err)
      {
        res.status(500).send(err);
        return;
      }
    res.send(row);
  })
})
.delete("/friend/:id", function(req, res){  
  
  friend.delete(req.params.id, function(err, rows){  //model
      if(err)
      {
        res.status(500).send(err);
      }
      else
      {
        res.send(req.params.id);
      }
  })
})

.post("/login", function(req, res){
    unirest.get("https://graph.facebook.com/me?access_token=" + req.body.access_token + "&fields=id,name,email,location") 
    .end(function (result) {
        var fbUser = req.session.fbUser = JSON.parse(result.body);
        fbUser.access_token = req.body.access_token;
        person.get(fbUser.id, function(err, rows) {
            if(rows && rows.length){                          
                req.session.user = rows[0];
            }else{                                         
                person.save({ firstname: fbUser.name, lastname: fbUser.name, fbid: fbUser.id}, function(err, row) {
                    req.session.user = row;
                })
            }
            res.send(result.body);
        }, 'facebook'); 
        
    });
})
.post("/logout", function(req, res)   
{
    req.session = null;
    window.location.reload(true)
    res.send("Logged Out");
}

)

.get("/fbUser", function(req, res){
    res.send(req.session.fbUser);
})
.get("/user", function(req, res){
    res.send(req.session.user);
});



app.listen(process.env.PORT);



