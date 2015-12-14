var mysql = require("mysql");

module.exports =  {
    blank: function(){ return {} },
    get: function(id, persons_id, ret){                 
        var conn = GetConnection();
        var sql = 'SELECT * FROM Meals WHERE persons_id=' + persons_id;
        if(id){
          sql += " AND foods_id = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = GetConnection();
        conn.query("DELETE FROM Meals WHERE meals_id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, persons_id, ret){   
        var sql;
        var conn = GetConnection();
        //  TODO Sanitize
        if (row.id) 
        {
				  sql = " Update Meals M"
							+ " Set 'mealname'=?, 'calories'=?, 'persons_id'=" + persons_id
						  + " WHERE M.meals_id=? ";
			  }
			  else
			  {
				  sql = "INSERT INTO Meals " //error in my sql
				      + " (mealname, calories, created_at, persons_id) "
						  + "VALUES (?, ?, now(), " + persons_id + ")";	
			  }

        conn.query(sql, [row.foodname, row.calories, row.persons_id, row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId; 
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.Name) errors.Name = "is required"; 
      
      return errors.length ? errors : false;
    }
};  
    function GetConnection(){
            var conn = mysql.createConnection({
              host: "localhost",
              user: "huili47",
              password: " ",
              database: "c9"
            });
        return conn;
    }